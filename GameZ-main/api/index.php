<?php
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

$file = __DIR__ . '/..' . $path;

if ($path === '/' || $path === '') {
    require __DIR__ . '/../web1.php'; 
} elseif (file_exists($file) && !is_dir($file)) {
    require $file;
} elseif (file_exists($file . '.php')) {
    require $file . '.php';
} else {
    http_response_code(404);
    echo "404 Not Found";
}