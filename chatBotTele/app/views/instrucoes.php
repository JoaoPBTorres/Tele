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
    <title>Instruções de uso do Telê</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #373764;
        }

        main {
            width: 1266px;
            margin: 0 auto;
            padding-top: 50px;
            line-height: 1.5;
        }

        h1, h2 {
            font-size: 40px;
            font-weight: 600;
            line-height: 48.41px;
            margin-bottom: 20px;
        }

        p {
            font-size: 20px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        ul {
            list-style-type: disc;
            margin-left: 40px;
            font-size: 20px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        ul li {
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <main>
        <h1>Instruções de uso do Telê</h1>
        <p>O Telê é um chatbot que simula uma conversa com humanos. Ele é usado em nosso sistema para fornecer atendimento ao cliente, responder perguntas e coletar informações.</p>

        <h2>Como interagir com o ChatBot</h2>
        <p>Para interagir com um chatbot, você precisa digitar ou falar suas mensagens. O chatbot irá processar suas mensagens e responder de acordo com sua programação.</p>

        <h2>O que o Chatbot Pode Fazer</h2>
        <ul>
            <li>Responder perguntas sobre produtos, serviços ou tópicos específicos</li>
            <li>Fornecer suporte ao cliente, como resolver problemas ou responder perguntas sobre pedidos</li>
            <li>Coletar informações, como feedback ou informações de contato</li>
        </ul>

        <h2>Dicas para Interagir com o Chatbot</h2>
        <ul>
            <li>Seja claro e conciso em suas mensagens.</li>
            <li>Use linguagem natural que você usaria em uma conversa normal.</li>
            <li>Evite usar gírias ou linguagem abreviada.</li>
            <li>Se o chatbot não entender sua mensagem, tente reformulá-la.</li>
            <li>Seja paciente com o chatbot. Ainda está em desenvolvimento e pode não ser capaz de entender todas as suas mensagens perfeitamente.</li>
        </ul>

        <h2>Limitações do Chatbot</h2>
        <p>É importante lembrar que um chatbot é um programa de computador e não um humano. Ele não tem o mesmo nível de compreensão de linguagem e inteligência que um humano. Como tal, pode haver algumas coisas que o chatbot não pode fazer:</p>
        <ul>
            <li>Entender perguntas complexas ou multifacetadas</li>
            <li>Fornecer assistência com problemas complexos</li>
            <li>Compreender emoções ou humor</li>
        </ul>

        <h2>Se Você Precisar de Ajuda</h2>
        <p>Se precisar de ajuda para interagir com o chatbot, consulte a documentação de ajuda ou entre em contato com o suporte ao cliente.</p>
    </main>
</body>
</html>

