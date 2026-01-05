<?php
$app = config_arr('app');
$site_name = $app['site_name'] ?? 'WelWood';
$base_url  = $app['base_url'] ?? '';
$phone     = $app['phone'] ?? '+55 (21) 96866-1598';
$email     = $app['email'] ?? 'contato@welwood.com.br';
$wa_raw    = $app['whatsapp'] ?? '5521968661598';
$wa        = preg_replace('/\D+/', '', $wa_raw);
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= esc($title ?? 'WelWood') ?></title>
  <meta name="description" content="<?= esc($description ?? '') ?>" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600&display=swap" rel="stylesheet">

  <!-- Tailwind CDN (podemos trocar depois pelo CSS compilado em /assets/welwood.css) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            display: ['Poppins', 'ui-sans-serif', 'system-ui', 'sans-serif'],
          },
          colors: {
            olive: {
              50:'#f7f8f3',100:'#eef0e6',200:'#d7dcc2',300:'#b8c097',
              400:'#99a36f',500:'#7b8651',600:'#646b42',700:'#505535',
              800:'#3c4028',900:'#2c2f1e',950:'#1a1c12'
            },
            gold: {
              50:'#fff9e8',100:'#ffefc2',200:'#ffe190',300:'#ffd15a',
              400:'#ffc12f',500:'#f3ad12',600:'#cf8c0d',700:'#a36a0d',
              800:'#7a4e0f',900:'#5c3b0f',950:'#311f08'
            }
          },
          boxShadow: { 'soft': '0 6px 24px rgba(0,0,0,0.06)' },
          borderRadius: { '2xl': '1.25rem' }
        }
      }
    }
  </script>

  <!-- CSS final opcional -->
  <link rel="stylesheet" href="/assets/welwood.css?v=1">

  <!-- Ícones -->
  <script src="https://unpkg.com/lucide@latest"></script>
<!-- Favicon & App Icons -->
<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" type="image/png" sizes="32x32" href="/img/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/icons/favicon-16x16.png">
<link rel="apple-touch-icon" href="/img/icons/apple-touch-icon.png">
<link rel="manifest" href="/site.webmanifest">
<meta name="theme-color" content="#7b8651">

  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
</head>
<body class="bg-olive-50 text-olive-900 selection:bg-gold-200 selection:text-olive-900">
  <!-- Header / Navbar -->
  <header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-olive-100">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
      <div class="flex items-center justify-between h-16">
        <a href="/" class="flex items-center gap-3">
          <img src="/img/logo.svg" alt="<?= esc($site_name) ?>" class="h-8 w-auto" />
          <span class="font-semibold tracking-wide"><?= esc($site_name) ?></span>
        </a>

        <!-- Desktop nav -->
        <nav class="hidden md:flex items-center gap-6">
          <?php
            $links = [
              '/' => 'Home',
              '/servicos' => 'Serviços',
              '/nossa-historia' => 'Nossa História',
              '/portfolio' => 'Portfólio',
              '/agendamento' => 'Agendamento',
              '/contato' => 'Contato',
            ];
            $current = $_SERVER['REQUEST_URI'] ?? '/';
            $current = rtrim(parse_url($current, PHP_URL_PATH) ?: '/', '/');
            if ($current === '') $current = '/';
            foreach ($links as $href => $label):
              $active = ($current === $href);
          ?>
            <a href="<?= $href ?>" class="<?= $active ? 'text-olive-800 font-semibold' : 'hover:text-olive-600' ?>"><?= $label ?></a>
          <?php endforeach; ?>
          <a href="https://wa.me/<?= esc($wa) ?>" target="_blank"
             class="inline-flex items-center gap-2 rounded-2xl px-4 py-2 bg-olive-800 text-white hover:bg-olive-700 shadow-soft transition">
            <i data-lucide="phone-call" class="w-4 h-4"></i>
            WhatsApp
          </a>
        </nav>

        <!-- Mobile toggle -->
        <button id="menuBtn" aria-expanded="false" aria-controls="mobileMenu"
                class="md:hidden inline-flex items-center justify-center rounded-xl p-2 hover:bg-olive-100">
          <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
      </div>
    </div>
    <!-- Mobile overlay -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-olive-100">
      <div class="px-4 py-4 flex flex-col gap-2">
        <?php foreach ($links as $href => $label): ?>
          <a href="<?= $href ?>" class="py-2"><?= $label ?></a>
        <?php endforeach; ?>
        <a href="https://wa.me/<?= esc($wa) ?>" target="_blank"
           class="mt-2 inline-flex items-center gap-2 rounded-2xl px-4 py-2 bg-olive-800 text-white">
          <i data-lucide="phone-call" class="w-4 h-4"></i> WhatsApp
        </a>
      </div>
    </div>
  </header>

  <!-- Conteúdo -->
  <main>
    <?php include $viewFile; ?>
  </main>

  <!-- Footer -->
  <footer class="mt-16 border-t border-olive-100">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-10 grid md:grid-cols-3 gap-6">
      <div>
        <div class="flex items-center gap-3">
          <img src="/img/logo.svg" alt="<?= esc($site_name) ?>" class="h-8 w-auto" />
          <span class="font-semibold"><?= esc($site_name) ?></span>
        </div>
        <p class="mt-3 text-sm text-olive-700">Marcenaria & móveis sob medida — Rio de Janeiro, Niterói e São Gonçalo.</p>
      </div>
      <div>
        <h3 class="font-semibold mb-3">Atendimento</h3>
        <ul class="space-y-2 text-sm">
          <li><strong>Tel:</strong> <a href="tel:<?= esc(preg_replace('/\\D+/', '', $phone)) ?>" class="hover:text-olive-600"><?= esc($phone) ?></a></li>
          <li><strong>Email:</strong> <a href="mailto:<?= esc($email) ?>" class="hover:text-olive-600"><?= esc($email) ?></a></li>
          <li><strong>WhatsApp:</strong> <a href="https://wa.me/<?= esc($wa) ?>" class="hover:text-olive-600">Enviar mensagem</a></li>
        </ul>
      </div>
      <div>
        <h3 class="font-semibold mb-3">Legal</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="/politica-de-privacidade" class="hover:text-olive-600">Política de Privacidade</a></li>
          <li><a href="/termos-de-uso" class="hover:text-olive-600">Termos de Uso</a></li>
        </ul>
      </div>
    </div>
    <div class="text-center text-xs text-olive-600 pb-6">
      © <?= date('Y') ?> <?= esc($site_name) ?>. Todos os direitos reservados.
    </div>
  </footer>

  <script src="/assets/welwood.js?v=1"></script>
</body>
</html>
