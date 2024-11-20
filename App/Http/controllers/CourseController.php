<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Router;
use App\Services\CourseService;
use App\Exceptions\CourseNotFoundException;

class CourseController extends Controller
{
    public function show(int $id, string $slug): void
    {
        try {
            $courseDetails = (new CourseService())->getCourseDetails($id, $slug);
            $this->view('pages.course.show', $courseDetails);
        } catch (CourseNotFoundException $e) {
            (new Router())->abort(404, $e->getMessage());
        }
    }
}
