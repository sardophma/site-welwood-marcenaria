<?php
define('CORE_PATH', realpath(__DIR__ . '/..'));
define('BASE_PATH', dirname(CORE_PATH));
define('PUBLIC_PATH', BASE_PATH . '/public_html');

// Carrega .env simples
$envFile = CORE_PATH . '/.env';
if (is_file($envFile)) {
  $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  foreach ($lines as $line) {
    if (trim($line) === '' || str_starts_with(trim($line), '#')) continue;
    [$k, $v] = array_pad(explode('=', $line, 2), 2, '');
    $k = trim($k);
    $v = trim($v);
    if ($k !== '' && getenv($k) === false) {
      putenv("$k=$v");
      $_ENV[$k] = $v;
    }
  }
}

date_default_timezone_set(getenv('APP_TIMEZONE') ?: 'America/Sao_Paulo');
if (session_status() === PHP_SESSION_NONE) session_start();

// Autoloader simples App\
spl_autoload_register(function($class){
  $prefix = 'App\\';
  $base = CORE_PATH . '/app/';
  if (strncmp($class, $prefix, strlen($prefix)) !== 0) return;
  $relative = str_replace('\\', '/', substr($class, strlen($prefix)));
  $file = $base . $relative . '.php';
  if (is_file($file)) require $file;
});

function config_arr($file){
  static $cache = [];
  if (!isset($cache[$file])) {
    $path = CORE_PATH . "/config/$file.php";
    $cache[$file] = is_file($path) ? require $path : [];
  }
  return $cache[$file];
}

function esc($v){ return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

// View renderer mínima (usa layouts/main.php)
function render_view($view, $vars = []){
  $viewFile = CORE_PATH . "/resources/views/{$view}.php";
  if (!is_file($viewFile)) {
    http_response_code(404);
    $viewFile = CORE_PATH . "/resources/views/errors/404.php";
    $vars['title'] = $vars['title'] ?? 'Página não encontrada — WelWood';
    $vars['description'] = $vars['description'] ?? 'A página procurada não existe ou foi movida.';
  }
  extract($vars);
  include CORE_PATH . "/resources/views/layouts/main.php";
}

$ROUTES = require CORE_PATH . '/routes/web.php';
