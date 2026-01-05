<?php
require __DIR__ . '/../welwood_core/bootstrap/autoload.php';

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/');
if ($uri === '') $uri = '/';

$route = $ROUTES[$method][$uri] ?? null;
if (!$route) {
  http_response_code(404);
  $title = 'Página não encontrada — WelWood';
  $description = 'A página procurada não existe ou foi movida.';
  $viewFile = CORE_PATH . '/resources/views/errors/404.php';
  include CORE_PATH . '/resources/views/layouts/main.php';
  exit;
}

$title = $route['title'] ?? 'WelWood';
$description = $route['description'] ?? '';
$viewFile = CORE_PATH . '/resources/views/' . ($route['view'] ?? 'errors/404') . '.php';

include CORE_PATH . '/resources/views/layouts/main.php';
