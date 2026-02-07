<?php
session_start();

// ==============================================================================
// 1. CONFIGURAÇÕES DO BANCO DE DADOS
// ==============================================================================
$host = '127.0.0.1'; 
$db   = 'u768456268_welwood';
$user = 'u768456268_pedro';
$pass = 'Sprexx99151651';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro Crítico de Conexão: " . $e->getMessage());
}

// ==============================================================================
// 2. SISTEMA DE LOGIN
// ==============================================================================

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: orcamento.php");
    exit;
}

$erroLogin = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'login') {
    $usuarioInput = trim($_POST['usuario']); 
    $senhaInput   = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuarioInput]);
    $dadosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($dadosUsuario && password_verify($senhaInput, $dadosUsuario['senha'])) {
        $_SESSION['logado'] = true;
        $_SESSION['nome_usuario'] = $dadosUsuario['usuario'];
        header("Location: orcamento.php");
        exit;
    } else {
        $erroLogin = "Usuário ou senha incorretos.";
    }
}

if (!isset($_SESSION['logado'])) {
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Login | WelWood</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-[#f7f8f3] h-screen flex items-center justify-center font-['Inter'] px-4">
    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-xl w-full max-w-sm border border-[#eef0e6]">
        <div class="text-center mb-6">
            <div class="h-12 w-12 bg-[#3c4028] text-white rounded-lg flex items-center justify-center mx-auto mb-3 text-xl font-bold">W</div>
            <h1 class="text-xl font-bold text-[#3c4028]">Sistema WelWood</h1>
            <p class="text-sm text-gray-500">Acesso Restrito</p>
        </div>
        <?php if ($erroLogin): ?><div class="bg-red-50 text-red-600 text-sm p-3 rounded mb-4 text-center border border-red-100"><?= $erroLogin ?></div><?php endif; ?>
        <form method="POST" class="space-y-4">
            <input type="hidden" name="acao" value="login">
            <div><label class="block text-xs font-semibold text-[#505535] mb-1">Usuário</label><input type="text" name="usuario" required class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#7b8651] outline-none transition bg-[#f7f8f3] text-base"></div>
            <div><label class="block text-xs font-semibold text-[#505535] mb-1">Senha</label><input type="password" name="senha" required class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#7b8651] outline-none transition bg-[#f7f8f3] text-base"></div>
            <button type="submit" class="w-full bg-[#3c4028] text-white py-3 rounded-lg hover:bg-[#2c2f1e] transition font-semibold text-lg">Entrar</button>
        </form>
    </div>
</body>
</html>
<?php exit; } ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Orçamentos | WelWood</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { olive: { 50:'#f7f8f3', 100:'#eef0e6', 500:'#7b8651', 800:'#3c4028', 900:'#2c2f1e' }, gold: { 500:'#f3ad12' } },
            fontFamily: { sans: ['Inter', 'sans-serif'] }
          }
        }
      }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { -webkit-tap-highlight-color: transparent; }
        .calc-input { font-size: 16px; } 

        .preview-page, .internal-page {
            width: 210mm; 
            min-height: 297mm; 
            background: white; 
            padding: 10mm 15mm; 
            position: relative; 
            margin: 0 auto; 
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); 
            box-sizing: border-box;
        }
        .internal-page { background: #fffcf5; }
        .no-break { page-break-inside: avoid; break-inside: avoid; }
        
        @media (max-width: 1023px) {
            .preview-container { overflow-x: auto; padding: 20px 0; background: #e5e5e5; display: flex; justify-content: center; }
            .preview-page, .internal-page { transform: scale(0.48); transform-origin: top center; margin-bottom: -140mm; } 
        }

        .custom-scroll::-webkit-scrollbar { width: 6px; }
        .custom-scroll::-webkit-scrollbar-thumb { background-color: #d7dcc2; border-radius: 4px; }
    </style>
</head>
<body class="bg-olive-50 text-olive-900 font-sans antialiased lg:h-screen lg:overflow-hidden flex flex-col">

  <nav class="bg-white border-b border-olive-100 px-4 py-3 flex justify-between items-center z-50 no-print shadow-sm flex-none h-16 sticky top-0">
    <div class="flex items-center gap-2">
      <div class="w-8 h-8 bg-olive-800 rounded flex items-center justify-center text-white font-bold text-lg">W</div>
      <div>
        <h1 class="font-bold text-olive-900 leading-tight text-sm md:text-base">WelWood</h1>
        <p class="text-[10px] text-olive-500 font-medium uppercase tracking-wider hidden md:block">Olá, <?= htmlspecialchars($_SESSION['nome_usuario']) ?></p>
      </div>
    </div>
    <div class="flex items-center gap-2">
       <button onclick="generateInternalPDF()" class="flex items-center justify-center w-8 h-8 md:w-auto md:h-auto md:px-3 md:py-2 bg-yellow-100 text-yellow-800 border border-yellow-200 rounded-lg active:scale-95 transition">
        <i data-lucide="file-spreadsheet" class="w-4 h-4"></i> <span class="hidden md:inline ml-2 text-xs font-bold uppercase">Custos</span>
      </button>
       <button onclick="generatePDF()" class="flex items-center justify-center w-8 h-8 md:w-auto md:h-auto md:px-3 md:py-2 bg-olive-800 text-white rounded-lg active:scale-95 transition shadow-lg shadow-olive-800/20">
        <i data-lucide="file-down" class="w-4 h-4"></i> <span class="hidden md:inline ml-2 text-xs font-bold uppercase">Orçamento</span>
      </button>
      <a href="?logout=1" class="text-red-600 p-2"><i data-lucide="log-out" class="w-5 h-5"></i></a>
    </div>
  </nav>

  <main class="flex-grow flex flex-col lg:flex-row overflow-visible lg:overflow-hidden no-print">
    
    <div class="w-full lg:w-5/12 bg-white border-b lg:border-b-0 lg:border-r border-olive-100 overflow-visible lg:overflow-y-auto custom-scroll pb-24 lg:pb-6 relative">
        <div class="p-4 lg:p-6 space-y-6">
            <div class="space-y-3">
                <h3 class="font-bold text-olive-800 text-xs uppercase tracking-wide flex items-center gap-2"><i data-lucide="user" class="w-4 h-4"></i> Cliente & Obra</h3>
                <div class="grid grid-cols-2 gap-3">
                    <input type="text" id="clientName" placeholder="Nome do Cliente" class="col-span-2 w-full p-3 bg-olive-50 border border-olive-100 rounded-xl text-base focus:border-olive-500 outline-none" oninput="updateProposal()">
                    <input type="text" id="clientAddress" placeholder="Endereço do Cliente" class="col-span-2 w-full p-3 bg-olive-50 border border-olive-100 rounded-xl text-base focus:border-olive-500 outline-none" oninput="updateProposal()">
                    <input type="text" id="projectTitle" placeholder="Título do Projeto" class="col-span-2 w-full p-3 bg-olive-50 border border-olive-100 rounded-xl text-base focus:border-olive-500 outline-none" oninput="updateProposal()">
                    <div><label class="text-[10px] font-bold text-olive-500 mb-1 block">Data</label><input type="date" id="projectDate" class="w-full p-3 border border-olive-100 rounded-xl text-base bg-white" value="<?php echo date('Y-m-d'); ?>" oninput="updateProposal()"></div>
                    <div><label class="text-[10px] font-bold text-olive-500 mb-1 block">Validade</label><input type="text" id="validity" value="07 dias" class="w-full p-3 border border-olive-100 rounded-xl text-base" oninput="updateProposal()"></div>
                </div>
            </div>

            <div class="space-y-3 bg-olive-50/50 p-4 rounded-xl border border-olive-100">
                <h3 class="font-bold text-olive-800 text-xs uppercase tracking-wide flex items-center gap-2"><i data-lucide="hammer" class="w-4 h-4"></i> Fase 1: Produção</h3>
                <div class="grid grid-cols-2 gap-3">
                    <div><label class="text-[10px] font-bold text-gray-500">Material</label><input type="number" id="costMaterial" class="w-full p-3 border rounded-xl text-base calc-input bg-white" placeholder="0,00"></div>
                    <div><label class="text-[10px] font-bold text-gray-500">Mão de Obra</label><input type="number" id="costLabor" class="w-full p-3 border rounded-xl text-base calc-input bg-white" placeholder="0,00"></div>
                    <div><label class="text-[10px] font-bold text-gray-500">Frete</label><input type="number" id="costFreight" class="w-full p-3 border rounded-xl text-base calc-input bg-white" placeholder="0,00"></div>
                    <div><label class="text-[10px] font-bold text-gray-500">Montador</label><input type="number" id="costAssembler" class="w-full p-3 border rounded-xl text-base calc-input bg-white" placeholder="0,00"></div>
                    <div class="col-span-2 bg-yellow-50 p-2 rounded-xl border border-yellow-100">
                        <label class="text-[10px] font-bold text-yellow-700 ml-1">Gordura / Imprevistos</label>
                        <input type="number" id="costFat" class="w-full p-3 border border-yellow-200 rounded-xl text-base calc-input bg-white" value="500.00">
                    </div>
                </div>
                <div class="flex justify-between text-xs pt-2 font-bold text-olive-800 px-1"><span>Subtotal Fase 1:</span><span id="subTotalPhase1">R$ 0,00</span></div>
            </div>

            <div class="space-y-3 bg-olive-50/50 p-4 rounded-xl border border-olive-100">
                <h3 class="font-bold text-olive-800 text-xs uppercase tracking-wide flex items-center gap-2"><i data-lucide="briefcase" class="w-4 h-4"></i> Fase 2: Gestão</h3>
                <div class="grid grid-cols-3 gap-3">
                    <div><label class="text-[10px] font-bold text-gray-500">Mkt</label><input type="number" id="costMarketing" class="w-full p-3 border rounded-xl text-base calc-input bg-white" placeholder="0"></div>
                    <div><label class="text-[10px] font-bold text-gray-500">Warlyn</label><input type="number" id="commWarlyn" class="w-full p-3 border rounded-xl text-base calc-input bg-white" value="1000"></div>
                    <div><label class="text-[10px] font-bold text-gray-500">Pedro</label><input type="number" id="commPedro" class="w-full p-3 border rounded-xl text-base calc-input bg-white" value="1000"></div>
                </div>
                <div class="flex justify-between text-xs pt-2 font-bold text-olive-800 px-1"><span>Custo Base:</span><span id="totalBaseCost">R$ 0,00</span></div>
            </div>

            <div class="space-y-3 bg-blue-50/50 p-4 rounded-xl border border-blue-100">
                <h3 class="font-bold text-blue-800 text-xs uppercase tracking-wide flex items-center gap-2"><i data-lucide="percent" class="w-4 h-4"></i> Desconto Especial</h3>
                <div class="grid grid-cols-3 gap-3">
                    <div class="col-span-1">
                        <label class="text-[10px] font-bold text-blue-600">Desconto %</label>
                        <input type="number" id="discountPct" class="w-full p-3 border border-blue-200 rounded-xl text-base calc-input bg-white text-blue-800 font-bold" placeholder="0">
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] font-bold text-blue-600">Motivo</label>
                        <input type="text" id="discountDesc" class="w-full p-3 border border-blue-200 rounded-xl text-base bg-white" placeholder="Ex: À Vista" oninput="updateProposal()">
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                 <h3 class="font-bold text-olive-800 text-xs uppercase tracking-wide flex items-center gap-2"><i data-lucide="file-text" class="w-4 h-4"></i> Memorial & Fotos</h3>
                 <textarea id="descriptionInput" rows="6" class="w-full p-3 border border-gray-200 rounded-xl text-base focus:border-olive-500 outline-none" placeholder="Descrição do projeto..." oninput="updateProposal()"></textarea>
                 <div class="bg-gray-50 p-4 rounded-xl border border-dashed border-gray-300 text-center">
                     <label class="block text-xs font-bold text-gray-500 mb-2">Adicionar Imagens (Render)</label>
                     <input type="file" id="imageInput" multiple accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-olive-600 file:text-white hover:file:bg-olive-700" onchange="handleImages()">
                 </div>
            </div>
        </div>
        
        <div class="fixed lg:static bottom-0 left-0 w-full bg-gray-900 text-white p-4 lg:rounded-xl shadow-[0_-5px_15px_rgba(0,0,0,0.2)] lg:shadow-lg z-40 lg:mb-6">
            <div class="flex justify-between items-end">
                <div>
                    <span class="block text-[10px] uppercase font-bold text-gold-500">Valor Final</span>
                    <span class="text-xs text-gray-400">Entrada 60%: <span id="sugEntry" class="text-white font-bold">R$ 0,00</span></span>
                </div>
                <div class="text-right">
                    <span id="finalSalePrice" class="text-2xl lg:text-3xl font-bold text-white tracking-tight">R$ 0,00</span>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-7/12 bg-gray-200 lg:overflow-y-auto custom-scroll p-0 lg:p-8 relative">
        <div class="p-4 lg:hidden text-center text-xs font-bold text-gray-500 uppercase tracking-widest mt-6">Pré-visualização do PDF</div>
        
        <div id="printArea" class="preview-container">
            <div id="proposalPreview" class="preview-page flex flex-col text-black">
                <div class="flex justify-between items-start border-b-2 border-olive-800 pb-6 mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-olive-900 tracking-tight">WelWood Marcenaria Planejada</h1>
                        <p class="text-[10px] text-gray-500 uppercase tracking-widest mb-1">Bunker Intermediação Ltda</p>
                        <div class="text-xs text-gray-600 space-y-0.5">
                            <p><strong>CNPJ:</strong> 04.989.134/0001-38</p>
                            <p><strong>Tel:</strong> +55 (21) 96866-1598</p>
                            <p>@w.e.l_wood_marcenaria</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="inline-block bg-olive-50 px-4 py-2 rounded border border-olive-100 mb-2">
                            <h2 class="text-lg font-bold text-olive-900 uppercase">Orçamento</h2>
                        </div>
                        <p class="text-xs text-gray-500">Data: <span id="propDate">--/--/----</span></p>
                    </div>
                </div>

                <div class="bg-olive-50/50 p-4 rounded-lg border border-olive-100 mb-6 no-break">
                    <div class="grid grid-cols-2 gap-y-2 text-sm text-gray-700">
                        <p class="col-span-2"><span class="font-bold text-olive-800">Cliente:</span> <span id="propClient">---</span></p>
                        <p class="col-span-2"><span class="font-bold text-olive-800">Endereço:</span> <span id="propAddress">---</span></p>
                        <p><span class="font-bold text-olive-800">Projeto:</span> <span id="propTitle">---</span></p>
                        <p><span class="font-bold text-olive-800">Validade:</span> <span id="propValidity">07 dias</span></p>
                    </div>
                </div>

                <div class="mb-6 flex-grow">
                    <h3 class="font-bold text-olive-900 border-b border-gray-300 mb-3 pb-1 uppercase text-xs tracking-wider">Descrição Técnica</h3>
                    <div id="propDescription" class="text-sm text-gray-700 leading-relaxed whitespace-pre-line text-justify">Aguardando preenchimento...</div>
                </div>

                <div id="propImages" class="grid grid-cols-2 gap-4 mb-6 no-break"></div>

                <div class="mt-auto no-break">
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <h3 class="font-bold text-olive-900 border-b border-gray-300 mb-4 pb-1 uppercase text-xs tracking-wider">Investimento e Condições</h3>
                        
                        <div id="discountRow" class="hidden mb-2 text-right">
                            <p class="text-xs text-gray-400 line-through" id="propOriginalPrice">R$ 0,00</p>
                            <p class="text-xs text-green-600 font-bold" id="propDiscDesc">Desconto Promocional</p>
                        </div>

                        <div class="flex justify-between items-end mb-6">
                            <div>
                                <p class="text-sm font-medium text-gray-700">Valor Total do Projeto</p>
                                <p class="text-[10px] text-gray-500 max-w-[250px]">(Incluso material, mão de obra, gestão, frete e instalação)</p>
                            </div>
                            <div class="text-right">
                                <span class="text-3xl font-bold text-olive-900" id="propTotalValue">R$ 0,00</span>
                            </div>
                        </div>

                        <div class="space-y-3 text-sm border-t border-gray-200 pt-4">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-olive-900">1. Entrada (60%) - Início Fabricação</span>
                                <span class="font-bold text-olive-900" id="propEntry">R$ 0,00</span>
                            </div>
                            <div class="flex justify-between items-center text-gray-600">
                                <span>2. Entrega (40%) - Final Instalação</span>
                                <span id="propBalance">R$ 0,00</span>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-gray-200">
                            <p class="text-[10px] font-bold text-gray-500 uppercase mb-2">Opções de Cartão de Crédito:</p>
                            <div class="grid grid-cols-5 gap-2 text-xs" id="propInstallments"></div>
                            <p class="text-[9px] text-gray-400 mt-2 italic">* Valores incluem taxas da operadora.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="internalReport" class="internal-page hidden flex-col text-black">
                <div class="border-b-2 border-gray-800 pb-4 mb-6">
                    <h1 class="text-xl font-bold uppercase">Relatório Analítico de Custos</h1>
                    <p class="text-sm text-gray-500">Uso estritamente interno</p>
                </div>
                
                <div class="grid grid-cols-2 gap-8">
                    <div class="no-break">
                        <h3 class="font-bold text-sm uppercase mb-2 border-b">Fase 1: Produção</h3>
                        <table class="w-full text-sm mb-4">
                            <tr><td class="py-1">Material</td><td class="text-right font-mono" id="repMat">0,00</td></tr>
                            <tr><td class="py-1">Mão de Obra</td><td class="text-right font-mono" id="repLab">0,00</td></tr>
                            <tr><td class="py-1">Frete</td><td class="text-right font-mono" id="repFre">0,00</td></tr>
                            <tr><td class="py-1">Montador</td><td class="text-right font-mono" id="repAss">0,00</td></tr>
                            <tr><td class="py-1 text-red-600">Gordura</td><td class="text-right font-mono text-red-600" id="repFat">0,00</td></tr>
                            <tr class="font-bold border-t"><td class="py-1">TOTAL FASE 1</td><td class="text-right font-mono" id="repTotal1">0,00</td></tr>
                        </table>

                        <h3 class="font-bold text-sm uppercase mb-2 border-b">Fase 2: Gestão</h3>
                        <table class="w-full text-sm mb-4">
                            <tr><td class="py-1">Marketing</td><td class="text-right font-mono" id="repMark">0,00</td></tr>
                            <tr><td class="py-1">Com. Warlyn</td><td class="text-right font-mono" id="repComW">0,00</td></tr>
                            <tr><td class="py-1">Com. Pedro</td><td class="text-right font-mono" id="repComP">0,00</td></tr>
                            <tr class="font-bold border-t"><td class="py-1">TOTAL FASE 2</td><td class="text-right font-mono" id="repTotal2">0,00</td></tr>
                        </table>
                    </div>

                    <div class="bg-gray-50 p-4 rounded border border-gray-200 no-break">
                        <h3 class="font-bold text-sm uppercase mb-2 text-blue-800">Resultado Financeiro</h3>
                        <table class="w-full text-sm">
                            <tr><td class="py-1">Custo Base</td><td class="text-right font-mono" id="repBase">0,00</td></tr>
                            <tr><td class="py-1 text-gray-500">+ Encargos e Impostos (12%)</td><td class="text-right font-mono text-gray-500" id="repTax">0,00</td></tr>
                            <tr><td class="py-1 text-gray-500">+ Taxa Utilização Marcenaria (10%)</td><td class="text-right font-mono text-gray-500" id="repSpace">0,00</td></tr>
                            <tr class="font-bold"><td class="py-2">TABELA</td><td class="text-right font-mono" id="repGross">0,00</td></tr>
                            <tr><td class="py-1 text-red-500">(-) Desconto</td><td class="text-right font-mono text-red-500" id="repDisc">0,00</td></tr>
                            <tr class="text-lg font-bold bg-green-100"><td class="py-2 pl-2">VENDA FINAL</td><td class="text-right font-mono pr-2" id="repFinal">0,00</td></tr>
                        </table>
                        <div class="mt-6 pt-4 border-t border-gray-300 text-xs">
                            <div class="flex justify-between"><span>Pagar Custos</span><span id="destCost">0,00</span></div>
                            <div class="flex justify-between font-bold"><span>Saldo para Taxas e Uso</span><span id="destProfit">0,00</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>

  <script>
    lucide.createIcons();
    const RATES = { sale: 3.54, ant: [0, 1.73, 2.62, 3.54, 4.46, 5.38, 6.30, 7.22, 8.14, 9.06, 9.98, 10.90, 11.82, 12.74, 13.66, 14.58, 15.50, 16.42, 17.36] };
    const fmt = (v) => v.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

    function calculate() {
        const getVal = (id) => parseFloat(document.getElementById(id).value) || 0;
        const mat=getVal('costMaterial'), lab=getVal('costLabor'), fre=getVal('costFreight'), ass=getVal('costAssembler'), fat=getVal('costFat');
        const mark=getVal('costMarketing'), cw=getVal('commWarlyn'), cp=getVal('commPedro');
        const discPct = getVal('discountPct');

        const sub1 = mat+lab+fre+ass+fat;
        const sub2 = mark+cw+cp;
        const base = sub1 + sub2;

        const tax = base * 0.12; 
        const space = base * 0.10;
        const grossPrice = base + tax + space;

        const discountValue = grossPrice * (discPct / 100);
        const finalPrice = grossPrice - discountValue;

        // UI Updates
        document.getElementById('subTotalPhase1').innerText = fmt(sub1);
        document.getElementById('totalBaseCost').innerText = fmt(base);
        document.getElementById('finalSalePrice').innerText = fmt(finalPrice);
        document.getElementById('sugEntry').innerText = fmt(finalPrice * 0.60);

        // PDF Updates
        document.getElementById('propTotalValue').innerText = fmt(finalPrice);
        document.getElementById('propEntry').innerText = fmt(finalPrice * 0.60);
        document.getElementById('propBalance').innerText = fmt(finalPrice * 0.40);
        
        const discRow = document.getElementById('discountRow');
        const discEl = document.getElementById('propDiscDesc');
        if(discountValue > 0) {
            discRow.classList.remove('hidden');
            document.getElementById('propOriginalPrice').innerText = fmt(grossPrice);
            discEl.innerText = document.getElementById('discountDesc').value || "Desconto Especial";
        } else {
            discRow.classList.add('hidden');
        }

        // Relatório
        const ids = { repMat:mat, repLab:lab, repFre:fre, repAss:ass, repFat:fat, repTotal1:sub1, repMark:mark, repComW:cw, repComP:cp, repTotal2:sub2, repBase:base, repTax:tax, repSpace:space, repGross:grossPrice, repDisc:discountValue, repFinal:finalPrice };
        for(let k in ids) document.getElementById(k).innerText = fmt(ids[k]);
        document.getElementById('destCost').innerText = fmt(base);
        document.getElementById('destProfit').innerText = fmt(finalPrice - base);

        renderInstallments(finalPrice);
    }

    function renderInstallments(net) {
        const div = document.getElementById('propInstallments'); div.innerHTML = '';
        if(net<=0) return;
        [1, 6, 10, 12, 18].forEach(q => {
            const rate = RATES.sale + (RATES.ant[q]||0);
            const gross = net / (1 - (rate/100));
            div.innerHTML += `<div class="bg-white p-1 rounded border text-center"><div class="font-bold text-olive-800">${q}x</div><div class="text-[10px] text-gray-600">${fmt(gross/q)}</div></div>`;
        });
    }

    function updateProposal() {
        document.getElementById('propClient').innerText = document.getElementById('clientName').value || '---';
        document.getElementById('propAddress').innerText = document.getElementById('clientAddress').value || '---';
        document.getElementById('propTitle').innerText = document.getElementById('projectTitle').value || '---';
        document.getElementById('propValidity').innerText = document.getElementById('validity').value;
        document.getElementById('propDescription').innerText = document.getElementById('descriptionInput').value || '...';
        
        const d = document.getElementById('projectDate').valueAsDate;
        if(d) document.getElementById('propDate').innerText = d.toLocaleDateString('pt-BR');
        
        if(parseFloat(document.getElementById('discountPct').value) > 0) calculate();
    }

    function handleImages() {
        const input = document.getElementById('imageInput');
        const container = document.getElementById('propImages');
        container.innerHTML = ''; 
        if (input.files) {
            Array.from(input.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const wrapper = document.createElement('div');
                    wrapper.className = "h-56 w-full flex items-center justify-center bg-gray-50 border border-gray-200 rounded overflow-hidden no-break";
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = "max-w-full max-h-full w-auto h-auto object-contain block"; 
                    wrapper.appendChild(img);
                    container.appendChild(wrapper);
                }
                reader.readAsDataURL(file);
            });
        }
    }

    function genPDF(elId, name) {
        const originalElement = document.getElementById(elId);
        const clone = originalElement.cloneNode(true);
        clone.classList.remove('hidden');
        clone.style.transform = 'none';
        clone.style.margin = '0 auto';
        clone.style.marginBottom = '0';
        
        const container = document.createElement('div');
        container.style.position = 'absolute';
        container.style.top = '-9999px';
        container.style.left = '0';
        container.style.width = '210mm'; 
        container.appendChild(clone);
        document.body.appendChild(container);

        const opt = {
            margin: [0, 0, 0, 0],
            filename: name,
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, scrollY: 0, useCORS: true },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };
        
        html2pdf().set(opt).from(clone).save().then(() => {
            document.body.removeChild(container);
        });
    }

    function generatePDF() { genPDF('proposalPreview', `Orcamento_${document.getElementById('clientName').value}.pdf`); }
    function generateInternalPDF() { genPDF('internalReport', `CUSTOS_${document.getElementById('clientName').value}.pdf`); }

    document.querySelectorAll('.calc-input').forEach(i => i.addEventListener('input', calculate));
    calculate(); updateProposal();
  </script>
</body>
</html>
