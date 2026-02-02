<?php 
$app = config_arr('app'); 
$wa = preg_replace('/\D+/', '', $app['whatsapp'] ?? '5521968661598'); 
?>

<section class="bg-olive-50 py-12 border-b border-olive-100">
  <div class="max-w-4xl mx-auto px-4 text-center">
    <span class="inline-block py-1 px-3 rounded-full bg-olive-200 text-olive-800 text-xs font-bold uppercase tracking-wider mb-4">
      Atendimento Exclusivo
    </span>
    <h1 class="text-3xl md:text-4xl font-serif text-olive-900 mb-4">Agende sua Visita Técnica</h1>
    <p class="text-olive-700 text-lg">
      Para garantir a precisão do seu projeto, nós vamos até você. 
      Preencha os dados abaixo para iniciarmos o atendimento pelo WhatsApp.
    </p>
  </div>
</section>

<section class="max-w-3xl mx-auto px-4 py-12">
  <div class="bg-white rounded-2xl shadow-xl border border-stone-100 overflow-hidden">
    
    <div class="bg-olive-900 h-2 w-full"></div>

    <div class="p-8 md:p-10">
      <form id="agendamentoForm" onsubmit="enviarWhatsApp(event)">
        
        <div class="grid md:grid-cols-2 gap-6 mb-8">
          <div>
            <label class="block text-sm font-bold text-olive-900 mb-2">Seu Nome</label>
            <input type="text" id="nome" required placeholder="Como gosta de ser chamado?" 
                   class="w-full bg-stone-50 border border-stone-200 rounded-lg px-4 py-3 focus:outline-none focus:border-olive-500 transition">
          </div>
          <div>
            <label class="block text-sm font-bold text-olive-900 mb-2">Bairro / Cidade</label>
            <select id="local" required class="w-full bg-stone-50 border border-stone-200 rounded-lg px-4 py-3 focus:outline-none focus:border-olive-500 transition">
              <option value="" disabled selected>Selecione a região...</option>
              <option value="Recreio / Barra">Recreio ou Barra da Tijuca</option>
              <option value="Zona Sul RJ">Zona Sul (RJ)</option>
              <option value="Niterói (Icaraí/S. Francisco)">Niterói (Icaraí / S. Francisco)</option>
              <option value="Região Oceânica">Região Oceânica (Itaipu / Camboinhas)</option>
              <option value="São Gonçalo">São Gonçalo</option>
              <option value="Outra Região">Outra Região</option>
            </select>
          </div>
        </div>

        <div class="mb-8">
          <label class="block text-sm font-bold text-olive-900 mb-3">Quais ambientes vamos transformar?</label>
          <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
            <label class="cursor-pointer">
              <input type="checkbox" name="ambientes" value="Cozinha" class="peer sr-only">
              <div class="border border-stone-200 rounded-lg p-3 text-center hover:bg-olive-50 peer-checked:bg-olive-600 peer-checked:text-white peer-checked:border-olive-600 transition select-none">
                <i data-lucide="chef-hat" class="mx-auto w-6 h-6 mb-1"></i>
                <span class="text-sm font-medium">Cozinha</span>
              </div>
            </label>
            <label class="cursor-pointer">
              <input type="checkbox" name="ambientes" value="Quarto/Closet" class="peer sr-only">
              <div class="border border-stone-200 rounded-lg p-3 text-center hover:bg-olive-50 peer-checked:bg-olive-600 peer-checked:text-white peer-checked:border-olive-600 transition select-none">
                <i data-lucide="bed" class="mx-auto w-6 h-6 mb-1"></i>
                <span class="text-sm font-medium">Quarto/Closet</span>
              </div>
            </label>
            <label class="cursor-pointer">
              <input type="checkbox" name="ambientes" value="Banheiro" class="peer sr-only">
              <div class="border border-stone-200 rounded-lg p-3 text-center hover:bg-olive-50 peer-checked:bg-olive-600 peer-checked:text-white peer-checked:border-olive-600 transition select-none">
                <i data-lucide="droplets" class="mx-auto w-6 h-6 mb-1"></i>
                <span class="text-sm font-medium">Banheiro</span>
              </div>
            </label>
            <label class="cursor-pointer">
              <input type="checkbox" name="ambientes" value="Sala/Home" class="peer sr-only">
              <div class="border border-stone-200 rounded-lg p-3 text-center hover:bg-olive-50 peer-checked:bg-olive-600 peer-checked:text-white peer-checked:border-olive-600 transition select-none">
                <i data-lucide="tv" class="mx-auto w-6 h-6 mb-1"></i>
                <span class="text-sm font-medium">Sala/TV</span>
              </div>
            </label>
            <label class="cursor-pointer">
              <input type="checkbox" name="ambientes" value="Home Office" class="peer sr-only">
              <div class="border border-stone-200 rounded-lg p-3 text-center hover:bg-olive-50 peer-checked:bg-olive-600 peer-checked:text-white peer-checked:border-olive-600 transition select-none">
                <i data-lucide="monitor" class="mx-auto w-6 h-6 mb-1"></i>
                <span class="text-sm font-medium">Escritório</span>
              </div>
            </label>
            <label class="cursor-pointer">
              <input type="checkbox" name="ambientes" value="Outros" class="peer sr-only">
              <div class="border border-stone-200 rounded-lg p-3 text-center hover:bg-olive-50 peer-checked:bg-olive-600 peer-checked:text-white peer-checked:border-olive-600 transition select-none">
                <i data-lucide="plus" class="mx-auto w-6 h-6 mb-1"></i>
                <span class="text-sm font-medium">Outros</span>
              </div>
            </label>
          </div>
        </div>

        <div class="mb-8">
          <label class="block text-sm font-bold text-olive-900 mb-3">Qual a situação do imóvel?</label>
          <div class="space-y-2">
            <label class="flex items-center p-3 border border-stone-200 rounded-lg cursor-pointer hover:bg-stone-50 transition">
              <input type="radio" name="situacao" value="Moro no local" class="w-4 h-4 text-olive-600 focus:ring-olive-500" checked>
              <span class="ml-3 text-stone-700">Já moro no local</span>
            </label>
            <label class="flex items-center p-3 border border-stone-200 rounded-lg cursor-pointer hover:bg-stone-50 transition">
              <input type="radio" name="situacao" value="Em Obras" class="w-4 h-4 text-olive-600 focus:ring-olive-500">
              <span class="ml-3 text-stone-700">Está em obras / reforma</span>
            </label>
            <label class="flex items-center p-3 border border-stone-200 rounded-lg cursor-pointer hover:bg-stone-50 transition">
              <input type="radio" name="situacao" value="Na Planta (Entregue em breve)" class="w-4 h-4 text-olive-600 focus:ring-olive-500">
              <span class="ml-3 text-stone-700">Na planta (chaves em breve)</span>
            </label>
          </div>
        </div>

        <button type="submit" 
                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-green-600/30 flex items-center justify-center gap-3 transition transform hover:-translate-y-1">
          <i data-lucide="message-circle" class="w-6 h-6"></i>
          Solicitar Visita no WhatsApp
        </button>
        
        <p class="text-center text-xs text-stone-500 mt-4">
          Ao clicar, você será redirecionado para o WhatsApp oficial da Wel Wood.
        </p>

      </form>
    </div>
  </div>
</section>

<script>
function enviarWhatsApp(e) {
    e.preventDefault();
    
    // Coleta os dados
    const nome = document.getElementById('nome').value;
    const local = document.getElementById('local').value;
    const situacao = document.querySelector('input[name="situacao"]:checked').value;
    
    // Coleta os checkboxes marcados
    const checkboxes = document.querySelectorAll('input[name="ambientes"]:checked');
    let ambientes = [];
    checkboxes.forEach((checkbox) => {
        ambientes.push(checkbox.value);
    });
    
    // Validação simples
    if (ambientes.length === 0) {
        alert("Por favor, selecione pelo menos um ambiente.");
        return;
    }

    // Monta a mensagem
    const texto = `Olá Wel Wood! Me chamo *${nome}*.\n` +
                  `Sou de: *${local}*.\n\n` +
                  `Gostaria de agendar uma visita para:\n` +
                  `*${ambientes.join(', ')}*.\n\n` +
                  `Situação do imóvel: _${situacao}_.`;

    // Cria o link e abre
    const numero = "<?= $wa ?>";
    const link = `https://wa.me/${numero}?text=${encodeURIComponent(texto)}`;
    
    window.open(link, '_blank');
}
</script>
