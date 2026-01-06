<?php 
$app = config_arr('app'); 
$wa = preg_replace('/\D+/', '', $app['whatsapp'] ?? '5521968661598'); 

// ==============================================================================
// ÁREA DE GERENCIAMENTO DE PROJETOS (ARRAY)
// ==============================================================================
// Como editar:
// 1. 'titulo' => O nome que aparece em destaque.
// 2. 'fotos'  => Lista com os nomes exatos das imagens que você subiu.
//                Se tiver mais de uma, separe por vírgula: ['foto1.jpg', 'foto2.jpg']
// ==============================================================================


$projetos = [
    [
        'titulo' => 'Cozinha Premium Freijó & Branco',
        'local'  => 'São Gonçalo',
        'desc'   => 'Caixaria branca com portas em MDF Freijó e MDF Ultra resistente. Ferragens com amortecimento, buffet e nichos aéreos planejados.',
        'tags'   => ['MDF Ultra', 'Amortecedores', 'Cozinha'],
        'fotos'  => [
            'cozinha-freijo-1.jpg',
            'cozinha-freijo-2.jpg', 
        ]
    ],
    [
        'titulo' => 'Cozinha Azul Petróleo Sob Medida',
        'local'  => 'Olaria - RJ',
        'desc'   => 'Design moderno em Azul Petróleo. Caixaria em MDF Ultra resistente à umidade, com otimização total para o espaço do apartamento.',
        'tags'   => ['Design Exclusivo', 'Otimização', 'Colorido'],
        'fotos'  => [
            'cozinha-azul-1.jpg',
            'cozinha-azul-2.jpg',
            'cozinha-azul-3.jpg', 
        ]
    ],
    [
        'titulo' => 'Escritório Clean em MDF Branco',
        'local'  => 'Itaipu - Niterói',
        'desc'   => 'Bancada ergonômica para computadores com gaveteiros e nicho aéreo. Estrutura 100% em MDF Branco, garantindo organização e clareza.',
        'tags'   => ['Home Office', 'MDF Branco', 'Niterói'],
        'fotos'  => [
            'escritorio-itaipu-1.jpg',
            'escritorio-itaipu-2.jpg',
        ]
    ],
    [
        'titulo' => 'Banheiro Clean Detalhes Pretos',
        'local'  => 'Recreio - RJ', // <--- CORRIGIDO AQUI
        'desc'   => 'Acabamento em meia esquadria, puxadores preto fosco e MDF Ultra resistente à água. Elegância e durabilidade para áreas úmidas.',
        'tags'   => ['Meia Esquadria', 'Banheiro', 'Resistente à Água'],
        'fotos'  => [
            'banheiro-sg-1.jpg',
            'banheiro-sg-2.jpg',
        ]
    ],
    [
        'titulo' => 'Home Office Customizado',
        'local'  => 'Bonsucesso - RJ',
        'desc'   => 'Estação de trabalho em MDF Cerejeira com baú embutido inteligente e gaveteiros organizadores para máxima produtividade.',
        'tags'   => ['Home Office', 'Marcenaria Inteligente', 'Madeira'],
        'fotos'  => [
            'escrivaninha-cerejeira-1.jpg',
            'escrivaninha-cerejeira-2.jpg',
        ]
    ],
    [
        'titulo' => 'Rack Moderno Ripado com LED',
        'local'  => 'São Cristóvão',
        'desc'   => 'Portas ripadas com fita de LED embutida. Caixaria branca contrastando com iluminação quente para uma sala aconchegante.',
        'tags'   => ['Iluminação LED', 'Painel Ripado', 'Sala'],
        'fotos'  => [
            'rack-led-1.jpg',
            'rack-led-2.jpg',
        ]
    ],
];
?>

<section class="bg-stone-100 py-12 border-b border-stone-200">
  <div class="max-w-7xl mx-auto px-4 text-center">
    <h1 class="text-3xl md:text-4xl font-serif text-olive-900 mb-3">Nossos Projetos</h1>
    <p class="text-olive-700 max-w-2xl mx-auto">
      Toque nas imagens para ampliar e ver os detalhes do acabamento Wel Wood.
    </p>
  </div>
</section>

<section class="max-w-7xl mx-auto px-4 py-16">
  <div class="grid md:grid-cols-2 gap-12">

    <?php foreach($projetos as $proj): ?>
    <div class="bg-white rounded-xl overflow-hidden shadow-lg border border-stone-100 group flex flex-col h-full">
      
      <div class="relative w-full h-72 bg-stone-200 group-hover:shadow-inner">
        <div class="absolute top-4 left-4 z-20 bg-olive-600/90 backdrop-blur-sm text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide shadow-sm pointer-events-none">
          <?= $proj['local'] ?>
        </div>

        <div class="flex overflow-x-auto snap-x snap-mandatory h-full w-full scrollbar-hide" style="scroll-behavior: smooth;">
          <?php foreach($proj['fotos'] as $foto): ?>
            <?php if(!empty($foto)): ?>
            <div class="snap-center shrink-0 w-full h-full relative">
               <img src="/img/<?= $foto ?>" 
                    alt="<?= $proj['titulo'] ?> - Wel Wood Marcenaria" 
                    class="w-full h-full object-cover cursor-pointer hover:opacity-95 transition"
                    loading="lazy"
                    onclick="openModal(this.src)">
            </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>

        <?php if(count($proj['fotos']) > 1): ?>
          <div class="absolute bottom-4 right-4 z-20 bg-black/60 text-white text-[10px] px-2 py-1 rounded-full pointer-events-none backdrop-blur-sm opacity-70">
            Deslize
          </div>
        <?php endif; ?>
      </div>

      <div class="p-6 flex flex-col flex-grow">
        <h3 class="text-xl font-bold text-olive-900 mb-2"><?= $proj['titulo'] ?></h3>
        <p class="text-stone-600 text-sm mb-4 leading-relaxed flex-grow">
          <?= $proj['desc'] ?>
        </p>
        
        <div class="flex flex-wrap gap-2 text-xs font-semibold text-olive-700 mt-auto pt-4 border-t border-stone-100">
          <?php foreach($proj['tags'] as $tag): ?>
            <span class="bg-olive-50 px-2 py-1 rounded"><?= $tag ?></span>
          <?php endforeach; ?>
        </div>

        <a href="https://wa.me/<?= $wa ?>?text=Olá,%20vi%20o%20projeto%20'<?= urlencode($proj['titulo']) ?>'%20no%20site%20e%20gostaria%20de%20um%20orçamento%20similar." 
           target="_blank"
           class="mt-5 flex items-center justify-center w-full py-3 border-2 border-olive-600 text-olive-700 rounded-lg hover:bg-olive-600 hover:text-white transition font-bold text-sm">
           <i data-lucide="message-circle" class="w-4 h-4 mr-2"></i>
           Orçar projeto similar
        </a>
      </div>
    </div>
    <?php endforeach; ?>

  </div>
</section>

<div id="imageModal" class="fixed inset-0 z-[9999] bg-black/95 hidden flex items-center justify-center p-4 backdrop-blur-sm transition-opacity duration-300" onclick="closeModal()">
    <button class="absolute top-6 right-6 text-white/80 hover:text-white bg-black/50 rounded-full p-2" onclick="closeModal()">
        <i data-lucide="x" class="w-8 h-8"></i>
    </button>
    <img id="modalImage" src="" class="max-h-[90vh] max-w-full rounded shadow-2xl object-contain transition-transform duration-300 scale-95 opacity-0" onclick="event.stopPropagation()">
</div>

<style>
.scrollbar-hide::-webkit-scrollbar { display: none; }
.scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<script>
    function openModal(src) {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImage');
        img.src = src;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            img.classList.remove('scale-95', 'opacity-0');
            img.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImage');
        img.classList.remove('scale-100', 'opacity-100');
        img.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
            img.src = '';
            document.body.style.overflow = 'auto';
        }, 300);
    }
    
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") closeModal();
    });
</script>
