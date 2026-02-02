<?php 
$app = config_arr('app'); 
$wa = preg_replace('/\D+/', '', $app['whatsapp'] ?? '5521968661598'); 
$email = $app['email'] ?? 'contato@welwood.com.br';
?>

<section class="bg-olive-900 text-white py-16 md:py-20 border-b-4 border-gold-500">
  <div class="max-w-7xl mx-auto px-4 text-center">
    <span class="inline-block py-1 px-3 rounded-full bg-olive-800 border border-olive-700 text-olive-100 text-xs font-bold uppercase tracking-wider mb-6">
      Canais de Atendimento
    </span>
    <h1 class="text-4xl md:text-5xl font-serif font-medium mb-6">Vamos tirar seu projeto do papel?</h1>
    <p class="text-olive-200 text-lg max-w-2xl mx-auto leading-relaxed">
      Seja para tirar dúvidas, solicitar um orçamento ou discutir parcerias. Escolha o canal ideal abaixo.
    </p>
  </div>
</section>

<section class="max-w-7xl mx-auto px-4 -mt-10 relative z-10 pb-12">
  <div class="grid md:grid-cols-3 gap-6">
    
    <div class="bg-white rounded-2xl p-8 shadow-xl border-t-4 border-green-600 flex flex-col items-center text-center hover:-translate-y-1 transition duration-300">
      <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-6">
        <i data-lucide="message-circle" class="w-8 h-8"></i>
      </div>
      <h3 class="text-xl font-bold text-olive-900 mb-2">Orçamentos & Projetos</h3>
      <p class="text-stone-500 text-sm mb-6 flex-grow">
        Canal exclusivo para agendar visitas técnicas e iniciar o desenvolvimento da sua solução.
      </p>
      <a href="https://wa.me/<?= $wa ?>" target="_blank" 
         class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition shadow-lg shadow-green-600/20 flex items-center justify-center gap-2">
         Chamar no WhatsApp
      </a>
    </div>

    <div class="bg-white rounded-2xl p-8 shadow-xl border-t-4 border-olive-600 flex flex-col items-center text-center hover:-translate-y-1 transition duration-300">
      <div class="w-16 h-16 bg-olive-100 text-olive-600 rounded-full flex items-center justify-center mb-6">
        <i data-lucide="mail" class="w-8 h-8"></i>
      </div>
      <h3 class="text-xl font-bold text-olive-900 mb-2">Administrativo</h3>
      <p class="text-stone-500 text-sm mb-6 flex-grow">
        Assuntos financeiros, fornecedores e parcerias comerciais com arquitetos.
      </p>
      <a href="mailto:<?= $email ?>" 
         class="w-full py-3 bg-olive-600 hover:bg-olive-700 text-white font-bold rounded-xl transition shadow-lg shadow-olive-600/20 flex items-center justify-center gap-2">
         Enviar E-mail
      </a>
    </div>

    <div class="bg-white rounded-2xl p-8 shadow-xl border-t-4 border-pink-600 flex flex-col items-center text-center hover:-translate-y-1 transition duration-300">
      <div class="w-16 h-16 bg-pink-50 text-pink-600 rounded-full flex items-center justify-center mb-6">
        <i data-lucide="instagram" class="w-8 h-8"></i>
      </div>
      <h3 class="text-xl font-bold text-olive-900 mb-2">Nosso Portfólio</h3>
      <p class="text-stone-500 text-sm mb-6 flex-grow">
        Acompanhe nossos bastidores e resultados reais no perfil oficial.
      </p>
      <a href="https://instagram.com/w.e.l_wood_marcenaria" target="_blank" 
         class="w-full py-3 bg-white border-2 border-pink-600 text-pink-600 hover:bg-pink-50 font-bold rounded-xl transition flex items-center justify-center gap-2">
         @w.e.l_wood_marcenaria
      </a>
    </div>

  </div>
</section>

<section class="py-16 bg-olive-50">
  <div class="max-w-4xl mx-auto px-4">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-serif text-olive-900 mb-4">Perguntas Frequentes</h2>
      <p class="text-olive-700">Entenda nosso modelo de trabalho focado em tecnologia e precisão.</p>
    </div>

    <div class="space-y-4">
      
      <div class="bg-white rounded-xl border border-stone-200 overflow-hidden">
        <details class="group p-6 cursor-pointer">
          <summary class="flex justify-between items-center font-bold text-olive-900 list-none">
            Como funciona a produção dos móveis?
            <span class="transition group-open:rotate-180">
              <i data-lucide="chevron-down" class="w-5 h-5 text-olive-500"></i>
            </span>
          </summary>
          <div class="text-stone-600 mt-4 leading-relaxed text-sm animate-fade-in border-t border-stone-100 pt-4">
            <p class="mb-3">Somos uma <strong>Marcenaria 4.0</strong>. Isso significa que todo o processo está sob nosso controle rigoroso: da visita técnica e criação do projeto exclusivo até o plano de corte digital.</p>
            <p class="mb-3">Para a fabricação, utilizamos parceiros com <strong>centros de usinagem industriais de alta precisão</strong> no RJ (tecnologia de ponta), garantindo um corte milimétrico que marcenarias tradicionais não conseguem.</p>
            <p>A montagem e o acabamento final na sua casa são executados exclusivamente pela nossa equipe técnica, assegurando o padrão Wel Wood.</p>
          </div>
        </details>
      </div>

      <div class="bg-white rounded-xl border border-stone-200 overflow-hidden">
        <details class="group p-6 cursor-pointer" open>
          <summary class="flex justify-between items-center font-bold text-olive-900 list-none">
            Quais regiões vocês atendem?
            <span class="transition group-open:rotate-180">
              <i data-lucide="chevron-down" class="w-5 h-5 text-olive-500"></i>
            </span>
          </summary>
          <div class="text-stone-600 mt-4 leading-relaxed text-sm animate-fade-in border-t border-stone-100 pt-4">
            Atendemos com agilidade no Estado do Rio de Janeiro, com foco em:
            <ul class="list-disc list-inside mt-2 space-y-1 text-olive-800 font-medium">
              <li>Zona Sul (Leblon, Ipanema, Copacabana, Botafogo...)</li>
              <li>Barra da Tijuca e Recreio dos Bandeirantes</li>
              <li>Niterói (Icaraí, São Francisco) e Região Oceânica</li>
              <li>Ilha do Governador e adjacências</li>
              <li>São Gonçalo e Região</li>
            </ul>
          </div>
        </details>
      </div>

      <div class="bg-white rounded-xl border border-stone-200 overflow-hidden">
        <details class="group p-6 cursor-pointer">
          <summary class="flex justify-between items-center font-bold text-olive-900 list-none">
            Quais as formas de pagamento?
            <span class="transition group-open:rotate-180">
              <i data-lucide="chevron-down" class="w-5 h-5 text-olive-500"></i>
            </span>
          </summary>
          <div class="text-stone-600 mt-4 leading-relaxed text-sm animate-fade-in border-t border-stone-100 pt-4">
            Trabalhamos com condições facilitadas para viabilizar seu sonho. Aceitamos parcelamento em até <strong>18x no cartão de crédito</strong> ou condições especiais para pagamento via PIX/Transferência conforme o cronograma da obra.
          </div>
        </details>
      </div>

    </div>
  </div>
</section>

<section class="bg-stone-100 py-16 border-t border-stone-200">
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="md:w-1/2">
            <h3 class="text-2xl font-serif text-olive-900 mb-4">Base Operacional</h3>
            <p class="text-stone-600 mb-6 leading-relaxed">
                Nossa logística é coordenada a partir de pontos estratégicos na <strong>Ilha do Governador</strong> e em <strong>São Gonçalo</strong>. 
                Isso nos permite mobilidade rápida e custos de frete otimizados tanto para o Rio (Zona Sul/Barra) quanto para Niterói.
                <br><br>
                <em class="text-sm text-stone-500">*Todo o atendimento é realizado exclusivamente no local do projeto (sua residência ou obra), garantindo comodidade e precisão nas medidas.*</em>
            </p>
            <a href="/agendamento" class="inline-flex items-center text-olive-700 font-bold hover:text-olive-900 border-b-2 border-olive-200 hover:border-olive-600 transition pb-1">
                Solicitar visita técnica <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
            </a>
        </div>
        <div class="md:w-1/3 flex justify-center opacity-40">
            <i data-lucide="map" class="w-48 h-48 text-olive-300"></i>
        </div>
    </div>
</section>
