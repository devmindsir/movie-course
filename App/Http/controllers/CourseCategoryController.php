<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Router;
use App\Services\CourseCategoryService;
use App\Exceptions\CategoryNotFoundException;

class CourseCategoryController extends Controller
{
    public function index(int $id, string $slug): void
    {
        $page = (int)($_GET['page'] ?? 1);

        try {
            $categoryDetails = (new CourseCategoryService())->getCategoryDetails($id, $slug, $page);

            $this->view('pages.course-category.index', $categoryDetails);
        } catch (CategoryNotFoundException $e) {
            (new Router())->abort(404, $e->getMessage());
        }
    }
}
