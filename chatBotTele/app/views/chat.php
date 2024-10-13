<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/login/public/css/chat.css" rel>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

<!--Cabeçalho-->
    <header>
        <div class="logo">
            <a href="../views/bemvindo.php">
                <img src="../../public/images/logo.png" width="45px" height="20px" alt="Logo Telê">
            </a>
        </div>

        <div class="botaoPerfil">
            <a href="#">
                <i class="bi bi-person-circle" style="font-size: 30px; color: #373764"></i>
            </a>
        </div>
    </header>


<!--Menu lateral-->
    <nav class="menu-lateral">
        <!-- <div class="btn-expandir">
            <i class="bi bi-list"></i>
        </div> -->

    <ul>
        <li class="item-menu">
            <a href="#">
                <span class="icon"><i class="bi bi-question-lg"></i></span>
                <span class="txt-link">Ajuda</span>
            </a>
        </li>

        <li class="item-menu">
            <a href="#">
                <span class="icon"><i class="bi bi-clock"></i></span>
                <span class="txt-link">Histórico</span>
            </a>
        </li>

        <li class="item-menu">
            <a href="#">
                <span class="icon"><i class="bi bi-gear-fill"></i></span>
                <span class="txt-link">Configurações</span>
            </a>
        </li>
    </ul>


    </nav>




</body>
</html>