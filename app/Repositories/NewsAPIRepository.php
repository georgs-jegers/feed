<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\News;

class NewsAPIRepository implements NewsFeedRepository
{
    private const API_URL = "https://newsapi.org/v2";

    public function getTopArticles(
        string $sources = null,
        string $country = null,
        string $category = null
    ): News
    {
        if (!is_null($sources)) {
            $payload['sources'] = $sources;
        } else {
            if (!is_null($country) && Helper::isValidCountry($country)) {
                $payload['country'] = $country;
            }
            if (!is_null($category) && Helper::isValidCategory($category)) {
                $payload['category'] = $category;
            }
        }

        $apikey = $_ENV['NEWSAPI_KEY'];
        $header = [
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$apikey}",
        ];

        $url = self::API_URL . "/top-headlines";
        $client = new \GuzzleHttp\Client(['timeout' => 30]);

        $response = $client->request('GET', $url, ['headers' => $header, 'query' => $payload]);

        $news = new News();

        if ($response->getStatusCode() !== 200) {
            return $news;
        }

        $response_body = json_decode($response->getBody());
        foreach ($response_body->articles as $article) {
            $news->add(new Article(
                (string)$article->title,
                (string)$article->author,
                (string)$article->source->name,
                (string)$article->description,
                (string)$article->url,
                (string)$article->urlToImage,
                (string)$article->publishedAt,
            ));
        }

        return $news;
    }
}
