<?php 
$app = config_arr('app'); 
// Configuração automática do WhatsApp para evitar erros
$wa = preg_replace('/\D+/', '', $app['whatsapp'] ?? '5521968661598'); 
?>

<section class="bg-olive-50 py-12 border-b border-olive-100">
  <div class="max-w-7xl mx-auto px-4 text-center">
    <h1 class="text-3xl md:text-4xl font-serif text-olive-900 mb-3">Nossos Serviços</h1>
    <p class="text-olive-700 max-w-2xl mx-auto">
      Da concepção à instalação, entregamos soluções em marcenaria que unem funcionalidade, 
      design exclusivo e materiais de alta durabilidade.
    </p>
  </div>
</section>

<section class="max-w-7xl mx-auto px-4 py-16">
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    
    <article class="bg-white p-6 rounded-lg shadow-sm border border-stone-100 hover:shadow-md transition">
      <div class="w-12 h-12 bg-olive-100 text-olive-700 rounded-full flex items-center justify-center mb-4">
        <i data-lucide="chef-hat" class="w-6 h-6"></i>
      </div>
      <h3 class="text-xl font-bold text-olive-900 mb-2">Cozinhas Planejadas</h3>
      <p class="text-stone-600 text-sm leading-relaxed">
        Otimização inteligente de espaço com armários resistentes à umidade, ferragens com amortecimento 
        e design ergonômico para o coração da sua casa.
      </p>
    </article>

    <article class="bg-white p-6 rounded-lg shadow-sm border border-stone-100 hover:shadow-md transition">
      <div class="w-12 h-12 bg-olive-100 text-olive-700 rounded-full flex items-center justify-center mb-4">
        <i data-lucide="bed" class="w-6 h-6"></i>
      </div>
      <h3 class="text-xl font-bold text-olive-900 mb-2">Dormitórios & Closets</h3>
      <p class="text-stone-600 text-sm leading-relaxed">
        Guarda-roupas sob medida, cabeceiras e closets que aproveitam cada centímetro, 
        trazendo organização e conforto visual ao ambiente.
      </p>
    </article>

    <article class="bg-white p-6 rounded-lg shadow-sm border border-stone-100 hover:shadow-md transition">
      <div class="w-12 h-12 bg-olive-100 text-olive-700 rounded-full flex items-center justify-center mb-4">
        <i data-lucide="droplets" class="w-6 h-6"></i>
      </div>
      <h3 class="text-xl font-bold text-olive-900 mb-2">Banheiros e Lavabos</h3>
      <p class="text-stone-600 text-sm leading-relaxed">
        Gabinetes fabricados com compensado naval ou MDF ultra resistente, projetados 
        para suportar a umidade e organizar seus itens pessoais com elegância.
      </p>
    </article>

    <article class="bg-white p-6 rounded-lg shadow-sm border border-stone-100 hover:shadow-md transition">
      <div class="w-12 h-12 bg-olive-100 text-olive-700 rounded-full flex items-center justify-center mb-4">
        <i data-lucide="tv" class="w-6 h-6"></i>
      </div>
      <h3 class="text-xl font-bold text-olive-900 mb-2">Home Theater e Salas</h3>
      <p class="text-stone-600 text-sm leading-relaxed">
        Painéis ripados, racks suspensos e estantes sob medida que escondem a fiação 
        e transformam sua sala em um cinema particular.
      </p>
    </article>

    <article class="bg-white p-6 rounded-lg shadow-sm border border-stone-100 hover:shadow-md transition">
      <div class="w-12 h-12 bg-olive-100 text-olive-700 rounded-full flex items-center justify-center mb-4">
        <i data-lucide="briefcase" class="w-6 h-6"></i>
      </div>
      <h3 class="text-xl font-bold text-olive-900 mb-2">Móveis Corporativos</h3>
      <p class="text-stone-600 text-sm leading-relaxed">
        Mesas de reunião, estações de trabalho e recepções que transmitem a seriedade 
        da sua empresa e melhoram a produtividade da equipe.
      </p>
    </article>

    <article class="bg-white p-6 rounded-lg shadow-sm border border-stone-100 hover:shadow-md transition">
      <div class="w-12 h-12 bg-olive-100 text-olive-700 rounded-full flex items-center justify-center mb-4">
        <i data-lucide="sun" class="w-6 h-6"></i>
      </div>
      <h3 class="text-xl font-bold text-olive-900 mb-2">Decks e Áreas Externas</h3>
      <p class="text-stone-600 text-sm leading-relaxed">
        Madeira maciça tratada para áreas gourmet, decks de piscina e pergolados, 
        garantindo resistência ao sol e à chuva com acabamento impecável.
      </p>
    </article>

  </div>

  <div class="mt-16 text-center bg-stone-900 text-white rounded-xl p-8 md:p-12">
    <h2 class="text-2xl md:text-3xl font-bold mb-4">Tem um projeto em mente?</h2>
    <p class="text-stone-300 mb-8 max-w-xl mx-auto">
      Não importa o tamanho do desafio, nós temos a solução em madeira ideal para você. 
      Solicite um orçamento sem compromisso hoje mesmo.
    </p>
    <a href="https://wa.me/<?= $wa ?>?text=Olá,%20vi%20os%20serviços%20no%20site%20e%20gostaria%20de%20um%20orçamento." 
       target="_blank"
       class="inline-flex items-center bg-olive-600 hover:bg-olive-500 text-white px-8 py-4 rounded-lg font-bold transition transform hover:-translate-y-1">
      <i data-lucide="message-circle" class="mr-2"></i>
      Falar com Especialista
    </a>
  </div>
</section>
