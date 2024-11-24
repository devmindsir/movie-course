<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\BlogCategories;
use App\Exceptions\CategoryNotFoundException;


class BlogCategoryService extends BaseService
{

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
        if (!$category) {
            $this->logger->error("Category not found: ID $idCategory");
            throw new CategoryNotFoundException($idCategory, 'Category not found ');
        }
        if (checkSlug($category->title) !== $slug){
            redirect("blog-category/index/$idCategory/".generateSlug($category->title),statusCode:301);
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
            'blogs' => $blogInfo['items'],
            'count' => $blogInfo['totalItems'],
            'pages' => $blogInfo['totalPages'],
        ];
    }

}
