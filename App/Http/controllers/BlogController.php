<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Router;
use App\Services\BlogService;
use App\Exceptions\BlogNotFoundException;

class BlogController extends Controller
{
    public function show(int $id, string $slug): void
    {
        try {
            $blogDetails = (new BlogService())->getBlogDetails($id, $slug);
            $this->view('pages.blog.show', $blogDetails);
        } catch (BlogNotFoundException $e) {
            (new Router())->abort(404, $e->getMessage());
        }
    }
}
