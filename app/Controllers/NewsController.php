<?php

namespace App\Controllers;

use App\Services\NewsReportService;
use App\View;

class NewsController
{
    private NewsReportService $service;

    public function __construct(NewsReportService $service)
    {
        $this->service = $service;
    }

    public function get(): View
    {
        $source = 'techcrunch';

        $title = "Top ";
        if (isset($category)) {
            $title .= $category . " ";
        }
        $title .= "news from ";
        if (isset($country)) {
            $title .= Helper::getCountryNameFromCode($country);
        } elseif (isset($source)) {
            $title .= $source;
        } else {
            $title .= "Universe";
        }

        $news = $this->service->execute($source)->getAll();
        return new View(
            'index-news.html.twig',
            $news,
            $title
        );
    }
}
