<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user_id'])) {
    header('Location: /login/app/views/login.php');
    exit();
}

$nome_usuario = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Usuário';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>


    <link rel="stylesheet" href="/chatBotTele/public/css/style.css" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <style>
        
        .saudacoes {
            position: fixed;
            top: 100px;
            left: 20px;
            color: #373764;
        }
        .carrossel {
            width: 100%;
            max-width: 600px;
            overflow: hidden;
            border-radius: 10px;
            position: relative;
            margin-left: 20px;
        }

        main {
            text-align: center;
            
        }

        main h1 {
            margin-bottom: 0px;
        }

        .frases {
            display: flex;
            animation: slide 12s infinite; /* Tempo total do carrossel */
        }

        .frase {
            min-width: 100%;
            padding: 15px;
            box-sizing: border-box;
            text-align: center;
            color: #373764;
        }

        @keyframes slide {
            0% { transform: translateX(0); }
            25% { transform: translateX(0); } /* Primeira frase visível */
            30% { transform: translateX(-100%); } /* Segunda frase visível */
            55% { transform: translateX(-100%); } /* Mantém a segunda frase visível */
            60% { transform: translateX(-200%); } /* Terceira frase visível */
            85% { transform: translateX(-200%); } /* Mantém a terceira frase visível */
            90% { transform: translateX(-300%); } /* Quarta frase visível */
            100% { transform: translateX(-300%); } /* Mantém a quarta frase visível */
        }

        .botao {
            background-color: #373764;
            color: white;
            text-decoration: none;
            padding: 10px 20px;;
            border-radius: 50px;
            margin-left: 20px;
        }

        .botao:hover {
            background-color: #ebc748;
            text-decoration: underline;
        }
    </style>
</head>


<body>


    <header class="cabecalho"> 
        <div>
            <a class="logo" href="../views/bemvindo.php"><img src="../../public/images/tele.svg" width="50px" height="35px"></a>
        </div>


        <nav class="menu-bem-vindo">
            <ul>
                <li class="item-menu">
                    <a href="#">
                        <span class="txt-link">Ajuda</span>
                    </a>
                    <ul>
                        <li class="itens-submenu" ><a href="../views/instrucoes.php" class="txt-link">Introduções de uso</a></li>
                        <li class="itens-submenu" ><a href="#" class="txt-link">Politica de privacidade</a></li>
                        <li class="itens-submenu" ><a href="#" class="txt-link">Informações adicionais</a></li>
                    </ul>
                </li>




                <li class="item-menu">
                    <a href="#">
                        <span class="txt-link">Histórico</span>
                    </a>
                    <ul>
                        <li class="itens-submenu" ><a href="#" class="txt-link">a</a></li>
                        <li class="itens-submenu" ><a href="#" class="txt-link">a</a></li>
                        <li class="itens-submenu" ><a href="#" class="txt-link">a</a></li>
                    </ul>
                </li>



                <li class="item-menu">
                    <a href="#">
                        <span class="txt-link">Configurações</span>
                    </a>
                    <ul>
                        <li class="itens-submenu" ><a href="#" class="txt-link">a</a></li>
                        <li class="itens-submenu" ><a href="#" class="txt-link">a</a></li>
                        <li class="itens-submenu" ><a href="#" class="txt-link">a</a></li>
                        <li class="itens-submenu"><a href="/chatBotTele/public/index.php?action=logout">Sair</a>
                    </ul>
                </li>



                <li class="item-menu">
                    <a href="../views/perfil.php">
                        <span class="icon"><i class="bi bi-person-circle" style="font-size: 30px;"></i></span>
                    </a>
                </li>

            </ul>



        </nav>
    </header>

    <div class="saudacoes">
            <h1>Bem-vindo, <?php echo htmlspecialchars($nome_usuario); ?>!</h1>
    
            <p>Você fez login com sucesso.</p>
            <!-- <a href="/login/public/index.php?action=logout">Sair</a> -->
        </div>

    <main>
        
        <p>Telecontrol</p>
        <h1>Faça perguntas. Consiga respostas.</h1>
        <h1>Aumente sua produtividade</h1>
        <div class="carrossel">
            <div class="frases">
                <div class="frase">"Como posso entrar em contato com o suporte para questões pós venda?"</div>
                <div class="frase">"Como posso registrar uma reclamação através do call center?"</div>
                <div class="frase">"Existe um número especifico para o suporte técnico?"</div>
                <div class="frase">"Qual produto mais reclamações esse mês?"</div>
            </div>
        </div>
       <a class="botao" href="../views/chat.php">Começar</a>




    </main>

</body>
</html>
