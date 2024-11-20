<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\BlogCategories;
use App\Exceptions\CategoryNotFoundException;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class BlogCategoryService
{
    private Logger $logger;

    public function __construct() {
        $this->logger = new Logger('blog_category_service');
        $this->logger->pushHandler(new StreamHandler(BASE_PATH . 'storage/log/errors.log', Logger::ERROR));
    }

    public function getCategoryDetails(int $idCategory, string $slug, int $page): array {
        $category = $this->getCategory($idCategory, $slug);
        $categoryBlogs = $this->getCategoryBlogs($idCategory, $page);

        return [
            'category' => $category,
            'blogs' => $categoryBlogs['blogs'],
            'counts' => $categoryBlogs['count'],
            'pages' => $categoryBlogs['pages'],
        ];
    }

    private function getCategory(int $idCategory, string $slug) {
        $category = (new BlogCategories())->find($idCategory);
        if (!$category || checkSlug($category->title) !== $slug) {
            $this->logger->error("Category not found: ID $idCategory, Slug: $slug");
            throw new CategoryNotFoundException($idCategory, 'Category not found or slug mismatch');
        }
        return $category;
    }

    private function getCategoryBlogs(int $idCategory, int $page): array {
        $blogInfo = (new Blog())->getCategoryBlog($idCategory, $page);

        if (!$blogInfo) {
            $this->logger->error("Blog data incomplete for category ID $idCategory, page $page");
            throw new CategoryNotFoundException($idCategory, 'Incomplete blog data');
        }

        return [
            'blogs' => $blogInfo[0],
            'count' => $blogInfo[1],
            'pages' => $blogInfo[2],
        ];
    }

}
