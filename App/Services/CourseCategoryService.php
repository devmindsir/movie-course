<?php

namespace App\Services;

use App\Models\CourseCategories;
use App\Models\Courses;
use App\Exceptions\CategoryNotFoundException;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class CourseCategoryService
{
    private Logger $logger;

    public function __construct()
    {
        $this->logger = new Logger('course_category_service');
        $this->logger->pushHandler(new StreamHandler(BASE_PATH . 'storage/log/errors.log', Logger::ERROR));
    }

    public function getCategoryDetails(int $id, string $slug, int $page): array
    {

        $category = $this->getCategory($id, $slug);

        $categoryCourses = $this->getCategoryCourses($id, $page);

        return [
            'category' => $category,
            'courses' => $categoryCourses['courses'],
            'counts' => $categoryCourses['count'],
            'views' => $categoryCourses['views'],
            'pages' => $categoryCourses['pages'],
        ];
    }

    private function getCategory(int $id, string $slug)
    {
        $category = (new CourseCategories())->find($id);

        if (!$category || checkSlug($category->title) !== $slug) {
            $this->logger->error("Category not found: ID $id, Slug: $slug");
            throw new CategoryNotFoundException($id, 'Category not found or slug mismatch');
        }
        return $category;
    }

    private function getCategoryCourses(int $id, int $page): array
    {
        $categoryInfo = (new Courses())->getCategoryCourse($id, $page);

        if (!$categoryInfo) {
            $this->logger->error("No courses found for category ID $id, page $page");
            throw new CategoryNotFoundException($id, 'No courses found for this category');
        }

        return [
            'courses' => $categoryInfo[0],
            'count' => $categoryInfo[1],
            'views' => $categoryInfo[2],
            'pages' => $categoryInfo[3],
        ];
    }
}
