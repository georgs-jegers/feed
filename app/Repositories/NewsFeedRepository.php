<?php

namespace App\Repositories;

use App\Models\News;

interface NewsFeedRepository
{
    public function getTopArticles(?string $source, ?string $country, ?string $category): News;
}
