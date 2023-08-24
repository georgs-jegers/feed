<?php

use App\Models\Article;

test('Test article', function () {
    $article = new Article(
        "Title",
        "Author",
        "Source",
        "",
        "url",
        "urlToImage",
        "2022-07-25"
    );

    expect($article->getTitle())->toEqual("Title");
    expect($article->getAuthor())->toEqual("Author");
    expect($article->getPublisher())->toEqual("Source");
    expect($article->getDescription())->toEqual("");
    expect($article->getUrl())->toEqual("url");
    expect($article->getImageUrl())->toEqual("urlToImage");
    expect($article->getDate())->toEqual("2022-07-25");
});
