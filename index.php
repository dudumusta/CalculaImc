<?php

require_once __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/database.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/app/templates');
$twig = new \Twig\Environment($loader, [
    'debug' => 'true'
]);


$url = $_SERVER['PATH_INFO'] ?? $_SERVER['REQUEST_URI'];
$arrUrl = explode('/', $url);
unset($arrUrl[0]);
$arquivo = $arrUrl[1]  ??  'index';

if (file_exists( __DIR__ . '\app\rotas\\' . $arquivo . '.php')) {
    include __DIR__ . '\app\rotas\\' . $arquivo . '.php';
} else {
    echo '404 Arquivo não encontrado!';
}




