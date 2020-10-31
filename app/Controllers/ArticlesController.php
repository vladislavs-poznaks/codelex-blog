<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Tag;

class ArticlesController
{
    public function index()
    {
        $articlesQuery = query()
            ->select('*')
            ->from('articles')
            ->orderBy('created_at', 'desc')
            ->execute()
            ->fetchAllAssociative();

        $articles = [];

        foreach ($articlesQuery as $article)
        {
            $articles[] = new Article(
                (int) $article['id'],
                $article['title'],
                $article['content'],
                $article['created_at']
            );
        }

        return require_once __DIR__  . '/../Views/ArticlesIndexView.php';
    }

    public function show(array $vars)
    {
        $articleQuery = query()
            ->select('*')
            ->from('articles')
            ->where('id = :id')
            ->setParameter('id', (int) $vars['id'])
            ->execute()
            ->fetchAssociative();

        $article = new Article(
            (int) $articleQuery['id'],
            $articleQuery['title'],
            $articleQuery['content'],
            $articleQuery['created_at'],
        );

        $comments = $article->comments();

        $tagsQuery = query()
            ->select('*')
            ->from('tags')
            ->where('id IN (SELECT tag_id FROM article_tag WHERE article_id = :articleId)')
            ->setParameter('articleId', $article->id())
            ->execute()
            ->fetchAllAssociative();

        $tags = [];

        foreach ($tagsQuery as $tagQuery) {

            $tags[] = new Tag(
                (int) $tagQuery['id'],
                $tagQuery['name'],
                $tagQuery['created_at'],
            );
        }

        $tagNames = [];

        foreach ($tags as $tag) {
            $tagNames[] = '#' . $tag->name();
        }

        return require_once __DIR__  . '/../Views/ArticlesShowView.php';
    }
}