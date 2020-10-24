<?php

namespace App\Controllers;

use App\Models\Article;

class ArticlesController
{
    private array $articles;

    public function __construct()
    {
        $this->articles = [
            new Article('Title 1', 'content 1'),
            new Article('Title 2', 'content 2'),
            new Article('Title 3', 'content 3'),
        ];
    }

    public function index()
    {
        $articles = $this->articles;

        return require_once __DIR__  . '/../Views/ArticlesIndexView.php';
    }

    public function show(array $vars)
    {
        $id = (int) $vars['id'];
        $article = $this->articles[$id-1];

        return require_once __DIR__  . '/../Views/ArticlesShowView.php';
    }
}