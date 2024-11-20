<?php

namespace App\Http\Controllers;

use App\Core\Controller;
use App\Core\Router;
use App\Exceptions\CategoryNotFoundException;
use App\Services\BlogCategoryService;

class BlogCategoryController extends Controller
{
    public function index(int $idCategory, string $slug): void {
        $page = $_GET['page'] ?? 1;
        try {
            $categoryDetails = (new BlogCategoryService())->getCategoryDetails($idCategory, $slug, (int)$page);
            $this->view('pages.blog-category.index', $categoryDetails);
        } catch (CategoryNotFoundException $e) {
            (new Router())->abort(404, $e->getMessage());

        }
    }
}
