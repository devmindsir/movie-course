<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Services\IndexService;

class IndexController extends Controller
{
    public function index(): void
    {
        try {
            $indexData = (new IndexService())->getIndexData();

            $this->view('pages.index', $indexData);
        } catch (\Exception $e) {
            // مدیریت خطا و نمایش صفحه خطا
            $this->abort(500, $e->getMessage());
        }
    }
}
