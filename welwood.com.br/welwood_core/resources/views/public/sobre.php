<?php
$app = config_arr('app');
$wa = preg_replace('/\D+/', '', $app['whatsapp'] ?? '5521968661598');
?>

<section class="relative bg-white py-16 md:py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-gold-100 text-olive-900 mb-6">
                Marcenaria 4.0
            </span>
            <h1 class="text-4xl md:text-6xl font-serif text-olive-900 leading-tight mb-6">
                Não vendemos apenas móveis. <br>
                <span class="text-olive-600">Entregamos a solução completa.</span>
            </h1>
            <p class="text-lg md:text-xl text-stone-600 leading-relaxed">
                Esqueça a marcenaria antiga com prazos incertos e poeira. 
                Na Wel Wood, unimos a <strong>precisão industrial</strong> com o <strong>atendimento familiar</strong>.
                Você visualiza tudo em 3D antes mesmo de cortarmos a primeira peça.
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-olive-50 border-y border-olive-100">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif text-olive-900 mb-4">Como funciona nosso trabalho?</h2>
            <p class="text-olive-700">Um processo transparente, do primeiro contato à entrega das chaves.</p>
        </div>

        <div class="grid md:grid-cols-4 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-100 hover:-translate-y-2 transition duration-300">
                <div class="w-14 h-14 bg-olive-900 text-white rounded-xl flex items-center justify-center text-2xl font-bold mb-6">1</div>
                <h3 class="text-lg font-bold text-olive-900 mb-3">Diagnóstico</h3>
                <p class="text-stone-600 text-sm">Entendemos sua necessidade via WhatsApp ou Vídeo Chamada. Avaliamos seu espaço para propor a melhor solução.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-100 hover:-translate-y-2 transition duration-300">
                <div class="w-14 h-14 bg-gold-500 text-white rounded-xl flex items-center justify-center text-2xl font-bold mb-6">2</div>
                <h3 class="text-lg font-bold text-olive-900 mb-3">Visita & 3D</h3>
                <p class="text-stone-600 text-sm">Vamos até você para medição precisa. Criamos o projeto em 3D para você ver como ficará antes de fechar.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-100 hover:-translate-y-2 transition duration-300">
                <div class="w-14 h-14 bg-olive-600 text-white rounded-xl flex items-center justify-center text-2xl font-bold mb-6">3</div>
                <h3 class="text-lg font-bold text-olive-900 mb-3">Produção 4.0</h3>
                <p class="text-stone-600 text-sm">Seu móvel é fabricado com corte industrial computadorizado (CNC). Acabamento perfeito e zero erros.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-100 hover:-translate-y-2 transition duration-300">
                <div class="w-14 h-14 bg-olive-800 text-white rounded-xl flex items-center justify-center text-2xl font-bold mb-6">4</div>
                <h3 class="text-lg font-bold text-olive-900 mb-3">Instalação</h3>
                <p class="text-stone-600 text-sm">Equipe própria realiza a montagem com cuidado e limpeza. Entregamos o ambiente pronto para uso.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 md:px-6 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-3xl font-serif text-olive-900 mb-6">Transparência Total</h2>
            <p class="text-stone-600 mb-8">
                A Wel Wood é uma empresa constituída e séria. Prezamos pela segurança jurídica e fiscal do seu projeto.
                Ao fechar conosco, você sabe exatamente quem está contratando.
            </p>
            
            <ul class="space-y-4 mb-8">
                <li class="flex items-center gap-3 text-stone-700">
                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                    Emitimos Nota Fiscal de Serviço
                </li>
                <li class="flex items-center gap-3 text-stone-700">
                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                    Contrato com garantia detalhada
                </li>
                <li class="flex items-center gap-3 text-stone-700">
                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                    Materiais 100% MDF de Qualidade
                </li>
            </ul>
        </div>
        
        <div class="bg-stone-50 rounded-3xl p-8 md:p-10 border border-stone-200 flex flex-col justify-center h-full">
            <div class="flex items-center gap-3 mb-2">
                <i data-lucide="shield-check" class="w-5 h-5 text-olive-700"></i>
                <span class="text-xs font-bold uppercase tracking-widest text-olive-900">Empresa Verificada</span>
            </div>
            
            <div class="flex items-center gap-4 bg-white p-4 rounded-xl border border-stone-100 shadow-sm">
                <div>
                    <p class="text-[10px] text-stone-400 uppercase font-bold mb-0.5">CNPJ</p>
                    <p class="text-sm font-mono text-stone-600">04.989.134/0001-38</p>
                </div>
                <div class="ml-auto">
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-[10px] font-bold uppercase">Ativa</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-olive-900 text-white py-16 text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-serif mb-6">Vamos tirar seu projeto do papel?</h2>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/<?= $wa ?>" target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-xl font-bold transition">
                Falar no WhatsApp
            </a>
            <a href="/portfolio" class="bg-white/10 hover:bg-white/20 text-white border border-white/30 px-8 py-4 rounded-xl font-bold transition">
                Ver Portfólio
            </a>
        </div>
    </div>
</section>
