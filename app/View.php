<?php

namespace App;

class View
{
    private string $template;
    private array $data;
    private string $title;

    public function __construct(string $template, array $data, string $title)
    {
        $this->template = $template;
        $this->data = $data;
        $this->title = $title;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}