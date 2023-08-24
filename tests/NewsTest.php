<?php

use App\Models\Article;
use App\Models\News;

test('Test article', function () {
    $news = new News();
    $news->add(new Article(
        "Hello World!",
        "",
        "BBC",
        "",
        "url",
        "urlToImage",
        "2022-07-25"
    ));
    $news->add(new Article(
        "Hello PHP",
        "Me",
        "Codelex",
        "Description",
        "url",
        "urlToImage",
        "2022-07-25"
    ));
    $news->add(new Article(
        "Beep",
        "Unknown",
        "Mars",
        "__/---|__",
        "url",
        "urlToImage",
        "2022-07-25"
    ));

    expect(count($news->getAll()))->toEqual(3);
});
