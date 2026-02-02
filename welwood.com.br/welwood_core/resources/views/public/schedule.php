<?php 
$app = config_arr('app'); 
$wa = preg_replace('/\D+/', '', $app['whatsapp'] ?? '5521968661598'); 
?>

<section class="bg-olive-50 py-12 border-b border-olive-100">
  <div class="max-w-4xl mx-auto px-4 text-center">
    <span class="inline-block py-1 px-3 rounded-full bg-olive-200 text-olive-800 text-xs font-bold uppercase tracking-wider mb-4">
      Atendimento em Domicílio
    </span>
    <h1 class="text-3xl md:text-4xl font-serif text-olive-900 mb-4">Agende sua Visita Técnica</h1>
    <p class="text-olive-700 text-lg">
      Para garantir a precisão do seu projeto, nós vamos até você. 
      Preencha os dados abaixo para iniciarmos o atendimento.
    </p>
  </div>
</section>

<section class="max-w-3xl mx-auto px-4 py-12">
  <div class="bg-white rounded-2xl shadow-xl border border-stone-100 overflow-hidden">
    
    <div class="bg-olive-900 h-2 w-full"></div>

    <div class="p-8 md:p-10">
      <form id="agendamentoForm" onsubmit="enviarWhatsApp(event)">
        
        <div class="mb-8">
            <label class="block text-sm font-bold text-olive-900 mb-2">Seu Nome</label>
            <input type="text" id="nome" required placeholder="Como gosta de ser chamado?" 
                   class="w-full bg-stone-50 border border-stone-200 rounded-lg px-4 py-3 focus:outline-none focus:border-olive-500 transition">
        </div>

        <div class="bg-stone-50 p-6 rounded-xl border border-stone-100 mb-8">
            <h3 class="text-olive-800 font-bold mb-4 flex items-center gap-2">
                <i data-lucide="map-pin" class="w-5 h-5"></i> Onde será o projeto?
            </h3>
            
            <div>
                <label class="block text-xs font-bold text-stone-500 mb-1">CEP do Local</label>
                <input type="text" id="cep" maxlength="9" required placeholder="00000-000" onblur="pesquisarCep(this.value)"
                    class="w-full bg-white border border-stone-300 rounded-lg px-4 py-3 focus:outline-none focus:border-olive-500 font-mono text-olive-900 text-lg tracking-wide">
                
                <p id="statusCep" class="text-xs text-stone-400 mt-2 font-medium">
                    Digite o CEP para verificarmos a disponibilidade.
                </p>
            </div>

            <input type="hidden" id="rua">
            <input type="hidden" id="bairro">
            <input type="hidden" id="cidade">
            <input type="hidden" id="uf_validado" value="false">
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
                <span class="text-sm font-medium">Quarto</span>
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
              <input type="checkbox" name="ambientes" value="Escritório" class="peer sr-only">
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
          <label class="block text-sm font-bold text-olive-900 mb-3">Situação do imóvel:</label>
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
              <input type="radio" name="situacao" value="Na Planta" class="w-4 h-4 text-olive-600 focus:ring-olive-500">
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
          Nenhuma cobrança é feita nesta etapa.
        </p>

      </form>
    </div>
  </div>
</section>

<script>
// Limpa os dados ocultos e exibe erro
function limparDados(msg, cor) {
    document.getElementById('rua').value = "";
    document.getElementById('bairro').value = "";
    document.getElementById('cidade').value = "";
    document.getElementById('uf_validado').value = "false";
    
    const status = document.getElementById('statusCep');
    status.innerText = msg;
    // Define a cor do texto (vermelho para erro, cinza para neutro)
    status.className = `text-xs mt-2 font-bold ${cor}`;
}

// Callback do ViaCEP
function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        // Validação 1: É do Rio de Janeiro?
        if (conteudo.uf !== "RJ") {
            limparDados("Infelizmente, atendemos apenas no Estado do Rio de Janeiro.", "text-red-600");
            return;
        }

        // Se chegou aqui, é RJ e válido.
        // Preenche os campos ocultos
        document.getElementById('rua').value = conteudo.logradouro;
        document.getElementById('bairro').value = conteudo.bairro;
        document.getElementById('cidade').value = conteudo.localidade;
        document.getElementById('uf_validado').value = "true";
        
        // Exibe mensagem de sucesso para o cliente
        const status = document.getElementById('statusCep');
        status.innerText = `Localidade atendida: ${conteudo.bairro} - ${conteudo.localidade} (RJ)`;
        status.className = "text-xs mt-2 font-bold text-green-600";
        
    } else {
        // Validação 2: CEP não encontrado na base
        limparDados("CEP inválido.", "text-red-600");
    }
}

// Função Principal de Busca
function pesquisarCep(valor) {
    // Remove tudo que não é dígito
    var cep = valor.replace(/\D/g, '');

    if (cep != "") {
        // Expressão regular para validar formato
        var validacep = /^[0-9]{8}$/;

        if(validacep.test(cep)) {
            // Mensagem de "Buscando..."
            const status = document.getElementById('statusCep');
            status.innerText = "Verificando disponibilidade...";
            status.className = "text-xs mt-2 font-medium text-olive-600";

            var script = document.createElement('script');
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
            document.body.appendChild(script);

        } else {
            // Formato inválido (ex: digitou poucos números)
            limparDados("CEP inválido.", "text-red-600");
        }
    } else {
        limparDados("Digite o CEP para verificarmos a disponibilidade.", "text-stone-400");
    }
};

// Enviar para o WhatsApp
function enviarWhatsApp(e) {
    e.preventDefault();
    
    // Validação Final antes de enviar
    const ufValidado = document.getElementById('uf_validado').value;
    if (ufValidado !== "true") {
        alert("Por favor, insira um CEP válido do Rio de Janeiro antes de continuar.");
        document.getElementById('cep').focus();
        return;
    }

    const nome = document.getElementById('nome').value;
    const cep = document.getElementById('cep').value;
    const rua = document.getElementById('rua').value;
    const bairro = document.getElementById('bairro').value;
    const cidade = document.getElementById('cidade').value;
    const situacao = document.querySelector('input[name="situacao"]:checked').value;
    
    // Checkboxes
    const checkboxes = document.querySelectorAll('input[name="ambientes"]:checked');
    let ambientes = [];
    checkboxes.forEach((checkbox) => { ambientes.push(checkbox.value); });
    
    if (ambientes.length === 0) {
        alert("Selecione pelo menos um ambiente para o projeto.");
        return;
    }

    // Montagem da Mensagem
    const texto = `*SOLICITAÇÃO DE VISITA TÉCNICA*\n\n` +
                  `👤 *Nome:* ${nome}\n` +
                  `📍 *Região:* ${bairro} - ${cidade}\n` +
                  `📝 *Endereço Base:* ${rua} (CEP ${cep})\n\n` +
                  `🛠 *Interesse:* ${ambientes.join(', ')}\n` +
                  `🏠 *Situação:* ${situacao}\n\n` +
                  `_Aguardo retorno sobre disponibilidade._`;

    const numero = "<?= $wa ?>";
    const link = `https://wa.me/${numero}?text=${encodeURIComponent(texto)}`;
    
    window.open(link, '_blank');
}
</script>
