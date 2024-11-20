<?php

namespace App\Services;

use App\Models\Author;
use App\Models\Blog;
use App\Exceptions\AuthorNotFoundException;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class AuthorService
{
    private Logger $logger;

    public function __construct() {
        $this->logger = new Logger('author_service');
        $this->logger->pushHandler(new StreamHandler(BASE_PATH . 'storage/log/errors.log', Logger::ERROR));
    }

    public function getAuthorDetails(int $author_id, string $slug, int $page): array {
        $author = $this->getAuthor($author_id, $slug);
        $authorBlogs = $this->getAuthorBlogs($author_id, $page);
        return [
            'author' => $author,
            'blogs' => $authorBlogs['blogs'],
            'counts' => $authorBlogs['count'],
            'views' => $authorBlogs['views'],
            'pages' => $authorBlogs['pages'],
        ];
    }

    private function getAuthor(int $author_id, string $slug) {
        $author = (new Author())->find($author_id);

        if (!$author || checkSlug($author->family) !== $slug) {
            $this->logger->error("Author not found: ID $author_id, Slug: $slug");
            throw new AuthorNotFoundException($author_id, 'Author not found or slug mismatch');
        }
        return $author;
    }

    private function getAuthorBlogs(int $author_id, int $page): array {
        $blogInfo = (new Blog())->getAuthorBlog($author_id, $page);
        if (!$blogInfo) {
            $this->logger->error("Blog data incomplete for author ID $author_id, page $page");
            throw new AuthorNotFoundException($author_id, 'Incomplete blog data');
        }

        return [
            'blogs' => $blogInfo[0],
            'count' => $blogInfo[1],
            'views' => $blogInfo[2],
            'pages' => $blogInfo[3],
        ];
    }

}
