<?php
require 'vendor/autoload.php';
use Printmelen\NftPortalApi\controllers\UserController;
header('Content-Type: application/json; charset=utf-8');
$url=explode('/', $_SERVER['REQUEST_URI']);
if ($url[2] != 'user') {
    http_response_code(404);
    exit;
}

$id = $url[3] ?? null;
$controller = new UserController();
$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);
echo $id;