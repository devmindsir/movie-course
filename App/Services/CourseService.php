<?php

namespace App\Services;

use App\Models\CourseCategories;
use App\Models\CourseIntro;
use App\Models\Course_Videos;
use App\Models\Courses;
use App\Models\Teachers;
use App\Exceptions\CourseNotFoundException;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class CourseService
{
    private Logger $logger;

    public function __construct()
    {
        $this->logger = new Logger('course_service');
        $this->logger->pushHandler(new StreamHandler(BASE_PATH . 'storage/log/errors.log', Logger::ERROR));
    }

    public function getCourseDetails(int $id, string $slug): array
    {
        $course = $this->getCourse($id, $slug);
        $courseIntro = $this->getCourseIntro($id);
        $courseVideos = $this->getCourseVideos($id);
        $courseCategory = $this->getCourseCategory($course->category_id, $id);
        $teacher = $this->getTeacher($course->teacher_id);
        $category = $this->getCategory($course->category_id);

        return [
            'course' => $course,
            'intro' => $courseIntro,
            'videos' => $courseVideos,
            'teacher' => $teacher,
            'category' => $category,
            'course_Categories' => $courseCategory,
        ];
    }

    private function getCourse(int $id, string $slug)
    {
        $course = (new Courses())->find($id);

        if (!$course || checkSlug($course->title) !== $slug) {
            $this->logger->error("Course not found: ID $id, Slug: $slug");
            throw new CourseNotFoundException($id, 'Course not found or slug mismatch');
        }
        return $course;
    }

    private function getCourseIntro(int $id)
    {
        $intro = (new CourseIntro())->getCourseIntro($id);

        if (!$intro) {
            $this->logger->error("Course intro not found: ID $id");
        }
        return $intro;
    }

    private function getCourseVideos(int $id)
    {
        $videos = (new Course_Videos())->getCourseVideos($id);

        if (!$videos) {
            $this->logger->error("Course videos not found: ID $id");
        }
        return $videos;
    }

    private function getCourseCategory(int $categoryId, int $courseId)
    {
        $category = (new Courses())->getCourseCategory($categoryId, $courseId);

        if (!$category) {
            $this->logger->error("Course category not found: Course ID $courseId, Category ID $categoryId");
        }
        return $category;
    }

    private function getTeacher(int $teacherId)
    {
        $teacher = (new Teachers())->find($teacherId);

        if (!$teacher) {
            $this->logger->error("Teacher not found: ID $teacherId");
        }
        return $teacher;
    }

    private function getCategory(int $categoryId)
    {
        $category = (new CourseCategories())->find($categoryId);

        if (!$category) {
            $this->logger->error("Category not found: ID $categoryId");
        }
        return $category;
    }
}
