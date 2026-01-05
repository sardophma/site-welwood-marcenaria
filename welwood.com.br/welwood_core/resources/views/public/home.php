<?php $app = config_arr('app'); $wa = preg_replace('/\D+/', '', $app['whatsapp'] ?? '5521968661598'); ?>

<!-- HERO -->
<section class="relative overflow-hidden bg-white">
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-16 md:py-24 grid md:grid-cols-2 gap-10 items-center">
    <div data-aos="fade-right">
      <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs bg-gold-100 text-olive-900">
        <i data-lucide="star" class="w-3.5 h-3.5"></i> Qualidade Artesanal
      </span>
      <h1 class="mt-4 text-4xl md:text-5xl font-semibold leading-tight font-display">
        Marcenaria & móveis sob medida <span class="text-olive-700">para sua casa</span>
      </h1>
      <p class="mt-4 text-olive-700">Atendemos Rio de Janeiro, Niterói e São Gonçalo com projetos personalizados, materiais de alto padrão e acabamento impecável.</p>
      <div class="mt-6 flex flex-wrap gap-3">
        <a href="/portfolio" class="rounded-2xl px-5 py-3 bg-olive-800 text-white hover:bg-olive-700 shadow-soft">Ver portfólio</a>
        <a href="/servicos#lista" class="rounded-2xl px-5 py-3 border border-olive-300 hover:border-olive-400">Ver serviços</a>
        <a href="https://wa.me/<?= esc($wa) ?>?text=<?= urlencode('Olá! Gostaria de um orçamento para móveis sob medida.') ?>" target="_blank" class="rounded-2xl px-5 py-3 bg-gold-500 text-white hover:bg-gold-400">Pedir orçamento</a>
      </div>
    </div>
    <div data-aos="fade-left">
      <img src="/img/hero.jpg" alt="Móveis sob medida" class="rounded-2xl shadow-soft w-full h-auto object-cover" />
    </div>
  </div>
</section>

<!-- DIFERENCIAIS -->
<section class="bg-olive-50">
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-14">
    <h2 class="text-2xl md:text-3xl font-semibold text-center">Por que escolher a WelWood</h2>
    <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php
$items = [
  ['icon'=>'ruler','title'=>'Sob medida','text'=>'Projetos exclusivos para seu espaço'],
  ['icon'=>'check-circle','title'=>'Acabamento','text'=>'Padrão premium em cada detalhe'],
  ['icon'=>'calendar','title'=>'Prazo','text'=>'Entrega combinada e cumprida'],
  ['icon'=>'shield','title'=>'Garantia','text'=>'Atendimento e suporte pós-obra'],
];
foreach($items as $i):
?>
        <div class="rounded-2xl p-6 bg-olive-600 text-white hover:bg-olive-700 hover:shadow-soft transition" data-aos="fade-up">
  <i data-lucide="<?= $i['icon'] ?>" class="w-6 h-6 opacity-95"></i>
  <h3 class="mt-3 font-semibold"><?= esc($i['title']) ?></h3>
  <p class="mt-1 text-sm text-white/90"><?= esc($i['text']) ?></p>
</div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SERVIÇOS EM DESTAQUE -->
<section class="bg-white">
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-14">
    <div class="flex items-end justify-between">
      <h2 class="text-2xl md:text-3xl font-semibold">Serviços em destaque</h2>
      <a href="/servicos" class="text-olive-800 hover:underline">Ver todos</a>
    </div>
    <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
$servicos = [
  ['icon'=>'home','title'=>'Cozinhas planejadas','desc'=>'Funcionalidade e acabamento premium'],
  ['icon'=>'layers','title'=>'Closets & armários','desc'=>'Aproveitamento máximo de espaço'],
  ['icon'=>'monitor','title'=>'Painéis & Home TV','desc'=>'Estética limpa e integração de cabos'],
];
foreach($servicos as $s):
?>

      <article class="bg-olive-50 rounded-2xl p-6 border border-olive-100 hover:shadow-soft transition" data-aos="fade-up">
        <i data-lucide="<?= $s['icon'] ?>" class="w-6 h-6"></i>
        <h3 class="mt-3 font-semibold"><?= esc($s['title']) ?></h3>
        <p class="mt-1 text-sm text-olive-700"><?= esc($s['desc']) ?></p>
        <div class="mt-4 flex gap-3">
          <a href="/servicos#lista" class="text-sm rounded-xl px-3 py-2 border border-olive-300 hover:border-olive-400">Ver detalhes</a>
          <a href="https://wa.me/<?= esc($wa) ?>?text=<?= urlencode('Olá! Tenho interesse em ' . $s['title'] . '.') ?>" target="_blank" class="text-sm rounded-xl px-3 py-2 bg-olive-800 text-white hover:bg-olive-700">WhatsApp</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- PROJETOS EM DESTAQUE -->
<section class="bg-olive-50">
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-14">
    <div class="flex items-end justify-between">
      <h2 class="text-2xl md:text-3xl font-semibold">Projetos em destaque</h2>
      <a href="/portfolio" class="text-olive-800 hover:underline">Abrir portfólio</a>
    </div>
    <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php for($i=1;$i<=3;$i++): ?>
        <a href="/portfolio" class="group block rounded-2xl overflow-hidden border border-olive-100 hover:shadow-soft transition" data-aos="zoom-in">
          <img src="/img/portfolio.jpg" alt="Projeto <?= $i ?>" class="w-full h-56 object-cover group-hover:scale-[1.02] transition" />
          <div class="p-4">
            <h3 class="font-semibold">Projeto <?= $i ?></h3>
            <p class="text-sm text-olive-700">Cozinha/Closet/Painel — Bairro Nobre</p>
          </div>
        </a>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- REGIÕES ATENDIDAS + CTA -->
<section class="bg-white">
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-14 grid md:grid-cols-2 gap-10 items-start">
    <div data-aos="fade-right">
      <h2 class="text-2xl md:text-3xl font-semibold">Regiões atendidas</h2>
      <p class="mt-3 text-olive-700">Rio de Janeiro, Niteroi, Ilha do Governador.</p>
      <ul class="mt-4 grid grid-cols-2 gap-2 text-sm text-olive-800">
        <li><i data-lucide="map-pin" class="inline w-3 h-3 mr-1"></i> Copacabana</li>
        <li><i data-lucide="map-pin" class="inline w-3 h-3 mr-1"></i> Botafogo</li>
        <li><i data-lucide="map-pin" class="inline w-3 h-3 mr-1"></i> Barra da Tijuca</li>
        <li><i data-lucide="map-pin" class="inline w-3 h-3 mr-1"></i> Recreio</li>
        <li><i data-lucide="map-pin" class="inline w-3 h-3 mr-1"></i> Jardim Guanabara</li>
        <li><i data-lucide="map-pin" class="inline w-3 h-3 mr-1"></i> Icaraí (Niterói)</li>
        <li><i data-lucide="map-pin" class="inline w-3 h-3 mr-1"></i> São Francisco</li>
        <li><i data-lucide="map-pin" class="inline w-3 h-3 mr-1"></i> Centro (RJ/Niterói)</li>
        <li class="font-medium text-olive-600">e demais localidades sob consulta</li>
      </ul>
    </div>
    <div data-aos="fade-left" class="bg-olive-50 rounded-2xl p-6 border border-olive-100">
      <h3 class="font-semibold text-lg">Vamos conversar sobre o seu projeto?</h3>
      <p class="mt-2 text-sm text-olive-700">Faça um orçamento sem compromisso ou agende uma visita.</p>
      <div class="mt-4 flex flex-wrap gap-3">
        <a href="https://wa.me/<?= esc($wa) ?>?text=<?= urlencode('Olá! Quero um orçamento para um projeto sob medida.') ?>" target="_blank" class="rounded-2xl px-5 py-3 bg-olive-800 text-white hover:bg-olive-700">WhatsApp</a>
        <a href="/agendamento" class="rounded-2xl px-5 py-3 border border-olive-300 hover:border-olive-400">Agendar visita</a>
      </div>
    </div>
  </div>
</section>


