<?php


//!USE
use App\Http\controllers\IndexController;
use App\Http\controllers\CourseController;
use App\Http\controllers\ProductController;
use App\Http\controllers\TeacherController;
use App\Http\controllers\CourseCategoryController;
use App\Http\controllers\BlogController;
use App\Http\controllers\BlogCategoryController;
use App\Http\controllers\AuthorController;


//!ROOT
$router->get('/', [IndexController::class, 'index']);

//!Course
$router->get('/course/show/{id}/{slug}', [CourseController::class, 'show']);

//!Teacher
$router->get('/teacher/show/{id}/{slug}', [TeacherController::class, 'show']);

//!Course_Category
$router->get('/course-category/index/{id}/{slug}', [CourseCategoryController::class, 'index']);

//!BLOG
$router->get('/blog/show/{id}/{slug}', [BlogController::class, 'show']);

//!Blog-Category
$router->get('/blog-category/index/{id}/{slug}', [BlogCategoryController::class, 'index']);

//!Author
$router->get('/author/show/{id}/{slug}', [AuthorController::class, 'show']);

//!Product
$router->get('/product/show/{id}/{slug}', [ProductController::class, 'show']);
