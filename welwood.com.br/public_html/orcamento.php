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
