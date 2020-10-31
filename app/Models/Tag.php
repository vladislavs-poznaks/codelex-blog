<?php

namespace App\Models;


class Tag
{
    private int $id;
    private string $name;
    private string $createdAt;

    public function __construct(int $id, string $name, string $createdAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = $createdAt;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }

}
