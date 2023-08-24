<?php

namespace App\Services;

use App\Models\News;
use App\Repositories\NewsFeedRepository;

class NewsReportService
{
    private NewsFeedRepository $newsFeed;

    public function __construct(NewsFeedRepository $newsRepository)
    {
        $this->newsFeed = $newsRepository;
    }

    public function execute(string $source = null, string $country = null, string $category = null): News
    {
        return $this->newsFeed->getTopArticles($source, $country, $category);
    }
}
