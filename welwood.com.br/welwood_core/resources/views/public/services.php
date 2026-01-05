<?php $app = config_arr('app'); $wa = preg_replace('/\D+/', '', $app['whatsapp'] ?? '55SEUNUMERO'); ?>

<section class="max-w-7xl mx-auto px-4 md:px-6 py-14">
  <header class="text-center max-w-2xl mx-auto">
    <h1 class="text-3xl md:text-4xl font-semibold">Serviços</h1>
    <p class="mt-3 text-olive-700">Marcenaria sob medida: soluções completas para cozinhas, dormitórios, salas, home office e espaços comerciais.</p>
  </header>

  <div id="lista" class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
   <?php
$servicos = [
  ['slug'=>'cozinhas-planejadas','icon'=>'home','title'=>'Cozinhas planejadas','desc'=>'Funcionalidade, ergonomia e acabamento premium'],
  ['slug'=>'closets-armarios','icon'=>'layers','title'=>'Closets & Armários','desc'=>'Aproveitamento máximo de espaço'],
  ['slug'=>'paineis-home','icon'=>'monitor','title'=>'Painéis & Home TV','desc'=>'Integração discreta de cabos e equipamentos'],
  ['slug'=>'home-office','icon'=>'briefcase','title'=>'Home Office','desc'=>'Estação de trabalho sob medida'],
  ['slug'=>'banheiros','icon'=>'droplet','title'=>'Banheiros','desc'=>'Armários e nichos sob medida'],
  ['slug'=>'comercial','icon'=>'shopping-bag','title'=>'Ambientes Comerciais','desc'=>'PDV, vitrines, estandes e mais'],
];
foreach($servicos as $s):
  $msg = urlencode("Olá! Tenho interesse em {$s['title']}. Pode ajudar?");
?>

      <article class="bg-white rounded-2xl p-6 border border-olive-100 hover:shadow-soft transition" data-aos="fade-up">
        <i data-lucide="<?= $s['icon'] ?>" class="w-6 h-6"></i>
        <h2 class="mt-3 font-semibold"><?= esc($s['title']) ?></h2>
        <p class="mt-1 text-sm text-olive-700"><?= esc($s['desc']) ?></p>
        <div class="mt-4 flex flex-wrap gap-3">
          <a href="/portfolio?tag=<?= esc($s['slug']) ?>" class="text-sm rounded-xl px-3 py-2 border border-olive-300 hover:border-olive-400">Ver portfólio</a>
          <a href="https://wa.me/<?= esc($wa) ?>?text=<?= $msg ?>" target="_blank" class="text-sm rounded-xl px-3 py-2 bg-olive-800 text-white hover:bg-olive-700">WhatsApp</a>
          <a href="/contato?assunto=orcamento&servico=<?= esc($s['slug']) ?>" class="text-sm rounded-xl px-3 py-2 border border-olive-300 hover:border-olive-400">Pedir orçamento</a>
        </div>
      </article>
    <?php endforeach; ?>
  </div>

  <div class="mt-12 bg-olive-50 rounded-2xl p-6 border border-olive-100 grid md:grid-cols-2 gap-6 items-center">
    <div>
      <h3 class="font-semibold text-lg">Materiais & acabamentos</h3>
      <p class="mt-2 text-sm text-olive-700">Trabalhamos com MDF de alto padrão, ferragens premium e pintura/laminação conforme o projeto. Catálogos disponíveis na visita técnica.</p>
    </div>
    <div class="flex gap-3 md:justify-end">
      <a href="https://wa.me/<?= esc($wa) ?>?text=<?= urlencode('Olá! Quero saber mais sobre materiais e acabamentos.') ?>" target="_blank" class="rounded-2xl px-5 py-3 bg-olive-800 text-white hover:bg-olive-700">Falar no WhatsApp</a>
      <a href="/agendamento" class="rounded-2xl px-5 py-3 border border-olive-300 hover:border-olive-400">Agendar visita</a>
    </div>
  </div>
</section>
