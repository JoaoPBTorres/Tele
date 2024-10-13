<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="/login/public/css/style.css"> <!-- Adicione seu CSS aqui -->
</head>
<body>
    <header class="cabecalho"> 
        <div>
            <a class="logo" href="../views/bemvindo.php"><img src="../public/images/tele.svg" width="50px"></a>
        </div>
    </header>

    <div class="container">
        <h1>Cadastro de Usuário</h1>
        <form action="/login/public/index.php?action=register" method="POST"> <!-- Atualizado para chamar o controlador -->
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> <!-- Token CSRF -->
            <div>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
            </div>
            <div>
                <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" required maxlength="14">
            </div>
            <div>
                <input type="date" id="data_nascimento" name="data_nascimento" required>
            </div>

            <div> 
                <select name="genero" id="genero" required>
                    <option value="">Genero</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="nao-binario">Não-binário</option>
                    <option value="outra">Outra</option>
                    <option value="prefiro_nao_dizer">Prefiro não dizer</option>
                </select>
            </div>
            
            <div>

                <input type="text" id="telefone" name="telefone" placeholder="Digite seu telefone" required maxlength="11">
            </div>
            <div>
                <input type="email" id="email" name="email" placeholder="digite seu email" required>
            </div>
            <div>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>
            
            <p class="links">
                <a href="../views/login.php">Já possui uma conta?</a>
            </p>

            <div>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>
