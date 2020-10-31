<?php

namespace App\Controllers;

class CommentsController
{
    public function store($vars)
    {
        query()
            ->insert('comments')
            ->values([
                'article_id' => ':article_id',
                'name' => ':name',
                'content' => ':content'
            ])
            ->setParameters([
                'article_id' => (int) $vars['id'],
                'name' => $_POST['name'],
                'content' => $_POST['content'],
            ])
            ->execute();

        header('Location: /articles/' . $vars['id']);
    }

    public function destroy($vars)
    {
        query()
            ->delete('comments')
            ->where('id = :id')
            ->setParameter('id', $vars['commentId'])
            ->execute();

        header('Location: /articles/' . $vars['articleId']);
    }
}