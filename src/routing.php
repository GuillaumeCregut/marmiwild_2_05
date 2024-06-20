<?php
require_once 'controllers/recipe-controller.php';

$urlPath= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if('/' === $urlPath) {
    browseRecipes();
} elseif ('/show' === $urlPath && isset($_GET['id'])) {
    showRecipe($_GET['id']);
} elseif ('/add' === $urlPath) {
    addRecipe();
} else {
    header('HTTP/1.1 404 Not Found');
}

/*
switch($urlPath) {
    case '/' : browseRecipes();
        break;
    case '/add': addRecipe();
        break;
    case '/show': showRecipe($_GET['id']);
        break;
    default : header('HTTP/1.1 404 Not Found');
}
    */