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
    <title>Login</title>
    
    <link rel="stylesheet" href="/chatBotTele/public/css/style.css" type="text/css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

</head>
<body >
    
    <header class="cabecalho"> 
        <div>
            <a class="logo" href="../views/bemvindo.php"><img src="../../public/images/tele.svg" width="50px"></a>
        </div>

        <div>
            <a class="cadastre" href="../views/registrar.php">Não possui uma conta? Crie agora</a>
        </div>
    </header>

    <div class="container">
        <h1>Entrar</h1>
        <p>Acesso restrito ao Cliente.</p>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="/chatBotTele/public/index.php?action=login">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <div class="preencher"> 
                <input type="email" name="email" id="email" placeholder="Digite seu email" required>
            </div>
            <input type="password" name="password" id="password" placeholder="Digite a sua senha" required>

            <button type="submit">Acessar</button>

            <p class="links">
                <a href="#">Esqueceu a senha?</a>
            </p>
        </form>

        <hr>
        <button class="microsoft-button">Logar com conta da Microsoft<i class="bi bi-microsoft" style="color: red;"></i></button>
    </div>
</body>
</html>
