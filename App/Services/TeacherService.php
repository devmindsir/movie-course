<?php

namespace App\Services;

use App\Models\Courses;
use App\Models\Teachers;
use App\Exceptions\TeacherNotFoundException;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class TeacherService
{
    private Logger $logger;

    public function __construct()
    {
        $this->logger = new Logger('teacher_service');
        $this->logger->pushHandler(new StreamHandler(BASE_PATH . 'storage/log/errors.log', Logger::ERROR));
    }

    public function getTeacherDetails(int $teacher_id, string $slug, int $page = 1): array
    {
        $teacher = $this->getTeacher($teacher_id, $slug);
        $teacherCourses = $this->getTeacherCourses($teacher_id, $page);
        return [
            'teacher' => $teacher,
            'courses' => $teacherCourses['courses'],
            'counts' => $teacherCourses['count'],
            'views' => $teacherCourses['views'],
            'pages' => $teacherCourses['pages']
        ];
    }

    private function getTeacher(int $teacher_id, string $slug)
    {
        $teacher = (new Teachers())->find($teacher_id);
        if (!$teacher || checkSlug($teacher->family) !== $slug) {
            $this->logger->error("Teacher not found: ID $teacher_id, Slug: $slug");
            throw new TeacherNotFoundException($teacher_id, 'Teacher not found or slug mismatch');
        }

        return $teacher;
    }

    private function getTeacherCourses(int $teacher_id, int $page): array
    {
        $courseInfo = (new Courses())->getTeacherCourse($teacher_id, $page);
        if (!$courseInfo) {
            $this->logger->error("No courses found for teacher ID $teacher_id");
            throw new \Exception("No courses found for this teacher");
        }

        return [
            'courses' => $courseInfo[0],
            'count' => $courseInfo[1],
            'views' => $courseInfo[2],
            'pages' => $courseInfo[3]
        ];
    }
}
