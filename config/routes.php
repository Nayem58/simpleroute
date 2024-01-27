<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => CTRLS . '/index.php',
    '/about' => CTRLS . '/about/index.php',
    '/about/team' => CTRLS . '/about/team.php',
    '/contact' => CTRLS . '/contact.php',
];

// dd($routes['/']);

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require VIEWS . "/{$code}.php";

    die();
}

routeToController($uri, $routes);
