<?php

require_once 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$loader = new FilesystemLoader(__DIR__ . '/app/Views');
$twig = new Environment($loader);

$container = new DI\Container();


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', '\App\Controllers\NewsController@get');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo "404  Page not found!<br>";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        [$handler, $method] = explode('@', $handler);
        /**
         * @var App\View $response
         */
        $container->set(App\Repositories\NewsFeedRepository::class, DI\create(App\Repositories\NewsAPIRepository::class));
        $response = ($container->get($handler))->$method();
        echo $twig->render(
            $response->getTemplate(),
            [
                'news' => $response->getData(),
                'title' => $response->getTitle(),
            ]);

        break;
}
