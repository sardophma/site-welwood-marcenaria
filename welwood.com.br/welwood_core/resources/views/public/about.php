<?php
$app = config_arr('app');
$site_name = $app['site_name'] ?? 'WelWood';
?>
<!-- HERO -->
<section class="relative overflow-hidden bg-white">
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-16 md:py-20 grid md:grid-cols-2 gap-10 items-center">
    <div data-aos="fade-right">
      <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs bg-gold-100 text-olive-900">
        <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Nossa história
      </span>
      <h1 class="mt-4 text-4xl md:text-5xl font-semibold leading-tight font-display">
        <?= esc($site_name) ?> — empresa familiar com tradição e cuidado
      </h1>
      <p class="mt-4 text-olive-700">
        Uma empresa familiar que começou como um sonho para transformar a vida e o lar dos outros em realidade,
        trazendo o cuidado familiar para o aconchego do seu ambiente.
      </p>
      <div class="mt-6 flex flex-wrap gap-3">
        <a href="/servicos" class="rounded-2xl px-5 py-3 bg-olive-800 text-white hover:bg-olive-700 shadow-soft">Ver serviços</a>
        <a href="/portfolio" class="rounded-2xl px-5 py-3 border border-olive-300 hover:border-olive-400">Ver portfólio</a>
      </div>
    </div>
    <div data-aos="fade-left" class="relative">
   <div class="w-full rounded-2xl border border-olive-100 bg-white/70 grid place-items-center shadow-soft p-8 md:p-10" data-aos="fade-left">
  <div class="text-center">
    <img
      src="/img/logo-welwood.png"
      alt="<?= esc($site_name) ?> — logomarca"
      class="mx-auto h-32 md:h-44 lg:h-56 w-auto"
      loading="lazy"
      decoding="async"
    />
    <p class="mt-5 text-base md:text-lg text-olive-800 font-medium tracking-wide">
      Tradição e cuidado em cada projeto
    </p>
    <div class="mt-3 flex items-center justify-center gap-2 text-olive-500 text-xs">
      <span class="h-px w-8 bg-olive-200"></span>
      <span>RJ • Niterói • São Gonçalo</span>
      <span class="h-px w-8 bg-olive-200"></span>
    </div>
  </div>
</div>

    </div>
  </div>
</section>

<!-- EMPRESA FAMILIAR -->
<section class="bg-olive-50">
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-14 grid md:grid-cols-2 gap-10 items-start">
    <div data-aos="fade-up">
      <h2 class="text-2xl md:text-3xl font-semibold">Empresa Familiar</h2>
      <p class="mt-3 text-olive-700">
        Tradição e cuidado familiar em cada projeto: levamos o nosso jeito de fazer — com proximidade,
        atenção aos detalhes e respeito — para cada etapa do serviço.
      </p>
    </div>
    <div class="grid sm:grid-cols-2 gap-4" data-aos="fade-up">
      <?php
        $pontos = [
          ['icon'=>'badge-check','title'=>'Tradição','text'=>'Experiência e acabamento de alto padrão'],
          ['icon'=>'heart','title'=>'Cuidado','text'=>'Atenção genuína ao seu lar e à sua história'],
          ['icon'=>'user-round','title'=>'Aproximação','text'=>'Atendimento direto e comunicação clara'],
          ['icon'=>'ruler','title'=>'Personalização','text'=>'Soluções sob medida para cada necessidade'],
        ];
        foreach ($pontos as $p):
      ?>
        <div class="rounded-2xl p-5 bg-olive-600 text-white hover:bg-olive-700 hover:shadow-soft transition" data-aos="fade-up">
  <i data-lucide="<?= $p['icon'] ?>" class="w-6 h-6 opacity-95"></i>
  <h3 class="mt-2 font-semibold"><?= esc($p['title']) ?></h3>
  <p class="mt-1 text-sm text-white/90"><?= esc($p['text']) ?></p>
</div>

      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- NOSSA MISSÃO -->
<section class="bg-white">
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-14">
    <h2 class="text-2xl md:text-3xl font-semibold">Nossa Missão</h2>
    <div class="mt-6 grid md:grid-cols-2 gap-8">
      <div class="space-y-4 text-olive-700" data-aos="fade-right">
        <p>
          Transformar sonhos em realidade através de móveis planejados e personalizados que refletem a
          personalidade e necessidades únicas de cada cliente.
        </p>
        <p>
          Levamos o cuidado familiar para cada projeto, criando não apenas móveis, mas memórias e momentos
          especiais que durarão para sempre em seu lar ou ambiente comercial.
        </p>
        <p>
          Nossa paixão é ver a felicidade nos olhos de nossos clientes quando veem seus ambientes transformados,
          sabendo que fizemos parte de algo especial em suas vidas.
        </p>
      </div>
      <div class="grid sm:grid-cols-2 gap-4" data-aos="fade-left">
        <?php
          $missao = [
            ['icon'=>'house','title'=>'Lar em foco','text'=>'Ambientes que acolhem e valorizam sua rotina'],
            ['icon'=>'sparkles','title'=>'Detalhe','text'=>'Acabamento e materiais selecionados'],
            ['icon'=>'users','title'=>'Parceria','text'=>'Projeto construído junto com você'],
            ['icon'=>'smile','title'=>'Resultado','text'=>'Felicidade ao ver o espaço transformado'],
          ];
          foreach ($missao as $m):
        ?>
          <div class="bg-olive-50 rounded-2xl p-5 border border-olive-100">
            <i data-lucide="<?= $m['icon'] ?>" class="w-6 h-6"></i>
            <h3 class="mt-2 font-semibold"><?= esc($m['title']) ?></h3>
            <p class="mt-1 text-sm text-olive-700"><?= esc($m['text']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- COMO TUDO COMEÇOU -->
<section class="bg-olive-50">
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-14">
    <h2 class="text-2xl md:text-3xl font-semibold">Como Tudo Começou</h2>
    <div class="mt-6 grid md:grid-cols-2 gap-8 items-start">
      <div class="space-y-4 text-olive-700" data-aos="fade-up">
        <p>
          A <?= esc($site_name) ?> nasceu do sonho de uma família apaixonada por transformar ambientes e criar móveis únicos.
          O que começou como um pequeno projeto familiar se tornou uma empresa dedicada a levar o cuidado e carinho familiar
          para cada lar que tocamos.
        </p>
        <p>
          Nossa missão sempre foi clara: transformar a vida e o lar das pessoas em realidade, trazendo a dinâmica de cuidado
          familiar para o aconchego do lar ou ambiente comercial. Cada peça que criamos carrega não apenas nossa técnica,
          mas também nossa paixão por fazer a diferença.
        </p>
        <p>
          Hoje, somos uma empresa de soluções e planejamento de ambientes, especializada em móveis planejados e personalizados
          para ambientes comerciais e residenciais, sempre mantendo nossos valores familiares como base de tudo que fazemos.
        </p>
      </div>
      <div data-aos="fade-left" class="bg-white rounded-2xl p-6 border border-olive-100">
        <div class="flex items-center gap-2">
          <i data-lucide="map-pin" class="w-5 h-5"></i>
          <h3 class="font-semibold">RJ • Niterói • São Gonçalo</h3>
        </div>
        <p class="mt-2 text-sm text-olive-700">
          Atendemos as principais regiões com foco em bairros nobres — sempre unindo técnica, prazo e cuidado.
        </p>
       <div class="mt-4 grid sm:grid-cols-3 gap-4 text-sm">
  <!-- Rio de Janeiro -->
  <div class="bg-olive-50 rounded-2xl p-4 border border-olive-100">
    <h4 class="font-semibold flex items-center gap-2">
      <i data-lucide="map" class="w-4 h-4"></i> Rio de Janeiro
    </h4>
    <ul class="mt-2 space-y-1">
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Copacabana</li>
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Botafogo</li>
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Laranjeiras</li>
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Barra da Tijuca</li>
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Recreio</li>
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Jacarepaguá</li>
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Centro (RJ)</li>
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Ilha do Governador</li>
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Jardim Guanabara (Ilha)</li>
    </ul>
  </div>

  <!-- Niterói -->
  <div class="bg-olive-50 rounded-2xl p-4 border border-olive-100">
    <h4 class="font-semibold flex items-center gap-2">
      <i data-lucide="map" class="w-4 h-4"></i> Niterói
    </h4>
    <ul class="mt-2 space-y-1">
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Icaraí</li>
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> São Francisco</li>
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Ingá</li>
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Camboinhas</li>
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Centro (Niterói)</li>
    </ul>
  </div>

  <!-- São Gonçalo -->
  <div class="bg-olive-50 rounded-2xl p-4 border border-olive-100">
    <h4 class="font-semibold flex items-center gap-2">
      <i data-lucide="map" class="w-4 h-4"></i> São Gonçalo
    </h4>
    <ul class="mt-2 space-y-1">
      <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Colubandê</li>
    </ul>
  </div>
</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA FINAL -->
<section class="bg-white">
  <div class="max-w-7xl mx-auto px-4 md:px-6 py-14 grid md:grid-cols-2 gap-10 items-center">
    <div data-aos="fade-right">
      <h2 class="text-2xl md:text-3xl font-semibold">Pronto para começar?</h2>
      <p class="mt-3 text-olive-700">Conte pra gente sobre seu projeto. Vamos transformar seu espaço com móveis planejados sob medida.</p>
      <div class="mt-5 flex flex-wrap gap-3">
        <a href="/servicos" class="rounded-2xl px-5 py-3 bg-gold-500 text-white hover:bg-gold-400">Explorar serviços</a>
        <a href="/agendamento" class="rounded-2xl px-5 py-3 border border-olive-300 hover:border-olive-400">Agendar visita</a>
      </div>
    </div>
    <div data-aos="fade-left" class="relative">
      <div class="aspect-[4/3] w-full rounded-2xl border border-olive-100 bg-olive-50 grid place-items-center shadow-soft">
        <div class="text-center px-6">
          <i data-lucide="award" class="w-8 h-8 mx-auto"></i>
          <p class="mt-2 text-sm text-olive-700">Tradição, cuidado familiar e acabamento premium.</p>
        </div>
      </div>
    </div>
  </div>
</section>
