<?php
$url=explode('/', $_SERVER['REQUEST_URI']);

if ($url[2] != 'user') {
    http_response_code(404);
    exit;
}

$id = $url[3] ?? null;