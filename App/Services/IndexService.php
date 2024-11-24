<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Courses;
use App\Models\Products;
use App\Models\Options;
use Exception;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class IndexService extends BaseService
{


    public function getIndexData(): array
    {
        try {
            $options = Options::getOptions();
            $courses = $this->getCourses();
            $populars = $this->getPopularCourses();
            $products = $this->getProducts($options['limit']);
            $popularProducts = $this->getPopularProducts();
            $blogs = $this->getBlogs($options['limit']);

            return [
                'courses' => $courses,
                'populars' => $populars,
                'products' => $products,
                'popular_products' => $popularProducts,
                'blogs' => $blogs
            ];

        } catch (Exception $e) {
            $this->logger->error("Error fetching data for homepage: " . $e->getMessage());
            throw $e;
        }
    }

    private function getCourses()
    {
        $course = new Courses();
        return $course->courses();
    }

    private function getPopularCourses()
    {
        $course = new Courses();
        return $course->populars();
    }

    private function getProducts($limit)
    {
        $product = new Products();
        return $product->all($limit);
    }

    private function getPopularProducts()
    {
        $product = new Products();
        return $product->all(6, 'views');
    }

    private function getBlogs($limit)
    {
        $blog = new Blog();
        return $blog->all($limit, 'id');
    }
}
