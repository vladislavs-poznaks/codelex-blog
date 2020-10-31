<?php

namespace App\Models;

class Comment
{
    private int $id;
    private int $articleId;
    private string $name;
    private string $content;
    private string $created_at;

    public function __construct(
        int $id,
        int $articleId,
        string $name,
        string $content,
        string $createdAt
    ) {
        $this->id = $id;
        $this->articleId = $articleId;
        $this->name = $name;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function articleId(): int
    {
        return $this->articleId;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function content(): string
    {
        return $this->content;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }
}
