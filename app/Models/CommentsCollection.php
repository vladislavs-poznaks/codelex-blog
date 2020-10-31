<?php

namespace App\Models;

class CommentsCollection
{
    /**
     * @var Comment[]
     */
    private array $comments = [];

    public function __construct(int $articleId)
    {
        $commentsQuery = query()
            ->select('*')
            ->from('comments')
            ->where('article_id = :id')
            ->setParameter('id', $articleId)
            ->orderBy('created_at', 'desc')
            ->execute()
            ->fetchAllAssociative();

        foreach ($commentsQuery as $comment) {
            $this->add(new Comment(
                (int) $comment['id'],
                $comment['article_id'],
                $comment['name'],
                $comment['content'],
                $comment['created_at']
            ));
        }
    }

    public function all(): array
    {
        return $this->comments;
    }

    public function add(Comment $comment): void
    {
        $this->comments[] = $comment;
    }
}