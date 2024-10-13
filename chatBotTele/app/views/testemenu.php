<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de Cabeçalho</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        header {
            background-color: #000; /* Cor de fundo do cabeçalho */
            padding: 10px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between; /* Espaça os itens */
        }

        nav {
            display: flex; /* Alinha os itens em linha */
            align-items: center; /* Centraliza verticalmente os itens */
        }

        nav ul {
            list-style-type: none; /* Remove marcadores da lista */
            padding: 0; /* Remove padding padrão */
            margin: 0; /* Remove margem padrão */
            display: flex; /* Exibe os itens em linha */
        }

        nav ul li {
            position: relative; /* Necessário para o submenu */
            margin: 0 20px; /* Espaçamento entre os itens */
        }

        nav ul li a {
            text-decoration: none; /* Remove sublinhado */
            color: white; /* Cor do texto */
            padding: 10px; /* Espaçamento ao redor do link */
            transition: background-color 0.3s; /* Transição suave para o fundo */
        }

        nav ul li a:hover {
            background-color: #444; /* Cor de fundo ao passar o mouse */
        }

        .submenu {
            display: none; /* Oculta os submenus por padrão */
            position: absolute; /* Posiciona o submenu em relação ao item pai */
            top: 100%; /* Começa logo abaixo do item pai */
            left: 0; /* Alinha à esquerda do item pai */
            width: 100%; /* Faz o submenu ocupar toda a largura do cabeçalho */
            background-color: #333; /* Cor de fundo do submenu */
            z-index: 10; /* Coloca o submenu acima de outros elementos */
        }

        /* Exibe o submenu ao passar o mouse sobre o item pai */
        nav ul li:hover .submenu {
            display: block;
        }

        .submenu a {
            padding: 10px; /* Espaçamento ao redor do link no submenu */
            white-space: nowrap; /* Impede quebra de linha */
            color: white; /* Cor do texto do submenu */
            display: block; /* Faz o link ocupar toda a área do item */
        }

        .submenu a:hover {
            background-color: #666; /* Cor de fundo ao passar o mouse no submenu */
        }

        .submenu {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Sombra para o submenu */
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="#">Início</a>
                    <div class="submenu">
                        <a href="#">Subitem 1</a>
                        <a href="#">Subitem 2</a>
                    </div>
                </li>
                <li>
                    <a href="#">Produtos</a>
                    <div class="submenu">
                        <a href="#">Mac</a>
                        <a href="#">iPad</a>
                        <a href="#">iPhone</a>
                    </div>
                </li>
                <li>
                    <a href="#">Suporte</a>
                    <div class="submenu">
                        <a href="#">Suporte Técnico</a>
                        <a href="#">FAQs</a>
                    </div>
                </li>
                <li>
                    <a href="#">Contato</a>
                    <div class="submenu">
                        <a href="#">Fale Conosco</a>
                        <a href="#">Chat Online</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="conteudo">
        <h1>Conteúdo Principal</h1>
        <p>Aqui está o conteúdo principal da página. Os submenus aparecem ao passar o mouse sobre os itens do menu.</p>
    </div>
</body>
</html>
