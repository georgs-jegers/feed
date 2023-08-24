<?php

namespace App\Models;

class Article
{
    private string $title;
    private string $url;
    private string $author;
    private string $description;
    private string $imageUrl;
    private string $publisher;
    private string $date;


    public function __construct(
        string $title,
        string $author,
        string $publisher,
        string $description,
        string $url,
        string $imageUrl,
        string $date
    )
    {
        $this->title = $title;
        $this->url = $url;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
        $this->date = $date;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}