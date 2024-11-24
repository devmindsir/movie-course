<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Author;
use App\Models\BlogCategories;
use App\Models\Courses;
use App\Exceptions\BlogNotFoundException;

class BlogService extends BaseService
{



    public function getBlogDetails(int $id, string $slug): array
    {
        $blog = $this->getBlog($id, $slug);
        $author = $this->getAuthor($blog->author_id);
        $category = $this->getCategory($blog->category_id);
        $allCategories = $this->getAllCategories(6);
        $courses = $this->getCourses(6, 'id');

        return [
            'blog' => $blog,
            'author' => $author,
            'category' => $category,
            'all_categories' => $allCategories,
            'courses' => $courses,
        ];
    }

    private function getBlog(int $id, string $slug)
    {
        $blog = (new Blog())->find($id);
        if (!$blog || $slug !== checkSlug($blog->title)) {
            $this->logger->error("Blog not found: ID $id, Slug: $slug");
            throw new BlogNotFoundException($id, 'Blog not found or slug mismatch');
        }
        return $blog;
    }

    private function getAuthor(int $authorId)
    {
        $author = (new Author())->find($authorId);
        if (!$author) {
            $this->logger->error("Author not found: ID $authorId");
            throw new BlogNotFoundException($authorId, 'Author not found');
        }
        return $author;
    }

    private function getCategory(int $categoryId)
    {
        $category = (new BlogCategories())->find($categoryId);
        if (!$category) {
            $this->logger->error("Category not found: ID $categoryId");
            throw new BlogNotFoundException($categoryId, 'Category not found');
        }
        return $category;
    }

    private function getAllCategories(int $limit): array
    {
        return (new BlogCategories())->all($limit);
    }

    private function getCourses(int $limit, string $orderBy): array
    {
        return (new Courses())->all($limit, $orderBy);
    }
}
