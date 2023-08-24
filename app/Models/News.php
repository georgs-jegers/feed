<?php

namespace App\Models;

class News
{
    private array $articles = [];

    public function add(Article $article): void
    {
        $this->articles[] = $article;
    }

    public function getAll(): array
    {
        return $this->articles;
    }
}