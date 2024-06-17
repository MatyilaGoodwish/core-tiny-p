<?php

/*
.htaccess configuration on root dir

RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.+)$ index.php [QSA,L]
*/

$request = $_SERVER['REQUEST_URI'];
/**
 * @description { simple route provider } must define layouts/footer and header
 * @params { $path string }
 * @author Goodwish Matyila
 * @year 2024
 */
class RouteProvider { 
    public function render($path) { 
        require_once __DIR__ .'/layout/header.php';
        require_once __DIR__ .$path;
        require_once __DIR__ .'/layout/footer.php';
    }
}
//Init RouteProvider
$route = new RouteProvider();

switch ($request) {
    case '/' :
        $route->render('/views/landing.php');
        break;
    case '' :
        $route->render('/views/landing.php');
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}