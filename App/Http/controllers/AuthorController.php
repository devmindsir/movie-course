<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Router;
use App\Exceptions\AuthorNotFoundException;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    public function show(int $author_id, string $slug): void {
        $page = $_GET['page'] ?? 1;
        try {
            $authorDetails = (new AuthorService())->getAuthorDetails($author_id, $slug,(int)$page);
            $this->view('pages.author.show', $authorDetails);
        } catch (AuthorNotFoundException $e) {
            (new Router())->abort(404, $e->getMessage());
        }
    }
}
