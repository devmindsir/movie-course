<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Router;
use App\Exceptions\TeacherNotFoundException;
use App\Services\TeacherService;

class TeacherController extends Controller
{
    private TeacherService $teacherService;

    public function show(int $id, string $slug): void
    {
        $page = $_GET['page'] ?? 1;
        try {
            $teacherDetails = (new TeacherService())->getTeacherDetails($id, $slug,(int)$page);
            $this->view('pages.teachers.show', $teacherDetails);
        } catch (TeacherNotFoundException $e) {
            (new Router())->abort(404,$e->getMessage());
        }
    }
}
