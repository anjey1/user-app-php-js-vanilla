<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/views/login.php';
        break;
    case '/login' :
        require __DIR__ . '/views/login.php';
        break;
    case '/users' :
        require __DIR__ . '/views/users.php';
        break;
    case '/auth' :
        require __DIR__ . '/views/auth.php';
        break;
    case '/logout' :
        require __DIR__ . '/views/logout.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}