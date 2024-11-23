<!-- <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?> -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Perfil</title>
    
    <link rel="stylesheet" href="/chatBotTele/public/css/style.css" type="text/css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .conteudo-principal {
            width: 500px; 
            margin: 0 auto; 
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }
        .content {
            width: 80%;
            height: 200px;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            text-align: center;
        }

       
        .overlay-button {
            all: unset;
            font-size: 16px;
            color: white;
            border: none;
            border-radius: 35px;
            cursor: pointer;
            margin-left: 30px;
            margin-right: 50px;
        }

        .overlay-button:hover,
        .overlay-button:focus,
        .overlay-button:active {
            background-color: transparent;
            color: white; 
            outline: none;
            border: none;
        }

       
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

       
        .overlay-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }

        .topo {
            display: flex;
            justify-content: space-between;
        }

        .topo-overlay {
            display: flex;
            margin-bottom: 50px;
            
        }

        .close-overlay {
            all: unset;
            border: none;
            padding: 5px 10px;
            padding: 0;
            border-radius: 5px;
            cursor: pointer;
            height: 20px;
            margin: 0;
        }

        .close-overlay:hover,
        .close-overlay:focus,
        .close-overlay:active {
            background-color: transparent; 
            color: white; 
            outline: none; 
            border: none; 
        }

        p {
            color: #373764;
        }

        h1 {
            margin-bottom: 10px;
            color: #373764;
        }

        h3 {
            margin-bottom: 3px;
            margin-top: 5px;
            color: #373764;
        }

        hr {
            margin: 3px 1px;
            padding: 0;
        }

        .dadosPerfil {
            margin-right: 20px;
        }

        a {
            text-decoration: none;
            color: #373764;
        }

        a:hover {
            color: black;
            
        }

        .nav-links {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 2px;
        }

        .editar-perfil {
            display: flex;
            flex-direction: column;
            font-size: 12px;
            margin-left: 5px;
            color: #373764;
        }
        

    </style>

</head>

<body>
    <header class="cabecalho"> 
            <div>
                <a class="logo" href="../views/bemvindo.php"><img src="../../public/images/telesuaconta.svg" width="200px" height="35px"></a>
            </div>
    </header>

    <main class="conteudo-principal">

        <div class="topo-overlay">
            <section class="perfilUsuario">
                <div class="fotoUsuario">
                    <button class="overlay-button" id="showOverlay"><img src="../../public/images/perfilmulher.svg" width="150px"></button>

                    <div class="overlay" id="overlay">
                        <div class="overlay-content">
                            <div class="topo"> 
                                <p>Foto do perfil</p>
                                <button class="close-overlay" id="closeOverlay"><i class="bi bi-x"></i></button>
                            </div>
                            <img src="../../public/images/perfilmulher.svg" width="100px">
                            <hr>
                            <ul>
                                <li>
                                    <a href="" class="editar-perfil">
                                        <i class="bi bi-pencil"></i>Editar foto
                                    </a>
                                </li>

                                <li>

                                    <a href="" class="editar-perfil">
                                        <i class="bi bi-camera"></i>Trocar foto
                                    </a>
                                </li>

                                <li>
                                    <a href="" class="editar-perfil">
                                        <i class="bi bi-trash"></i>Excluir foto
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="dadosPerfil">
                <div class="dados">
                    <h1>Perfil de usuário</h1>
                    <h3>Nome do usuário</h3>
                    <p>Danielli dos Santos</p>

                    <hr>

                    <h3>Conta</h3>
                    <p>danielli@gmail.com</p>
                </div>
            </section>

        </div>

        <section class="configuracoes">
            <div class="confConta">
                <h3>Configurações de conta</h1>
                <nav class="navbar">
                    <ul class="nav-links" id="navLinks">
                        <li><a href="#">Alteração de senha</a></li>
                        <li><a href="#">Configurações de Privacidade</a></li>
                    </ul>
                </nav>
            </div>

            <div class="confAtv">
                <h3>Configurações de atividades</h1>
                <nav class="navbar">
                    <ul class="nav-links" id="navLinks">
                        <li><a href="#">Verificação em duas etapas</a></li>
                        <li><a href="#">Gerenciamento de dispositivos conectados</a></li>
                        <li><a href="#">Histórico de login</a></li>
                    </ul> 
                </nav>
            </div>

            <div class="confAjuda">
                <h3>Ajuda e suporte</h1>
                <nav class="navbar">
                    <ul class="nav-links" id="navLinks">
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Formulário de contato</a></li>
                        <li><a href="#">Links para recursos de suporte</a></li>
                    </ul> 
                </nav>
            </div>
        </section>




    </main>

    <script>
  
    const showOverlay = document.getElementById('showOverlay');
        const closeOverlay = document.getElementById('closeOverlay');
        const overlay = document.getElementById('overlay');

    showOverlay.addEventListener('click', () => {
        overlay.style.display = 'flex';
    });

    closeOverlay.addEventListener('click', () => {
        overlay.style.display = 'none';
    });

    overlay.addEventListener('click', (event) => {
        if (event.target === overlay) {
            overlay.style.display = 'none';
        }
     });



    
  </script>
</body>


</html>