<?php
session_start(); // Inicie a sessão no topo do arquivo PHP

// Gerar um token CSRF se não existir
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

class RegistrarController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function register() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token'])) {
                $error = "Token CSRF não enviado.";
                include '../app/views/registrar.php';
                return;
            }

            if (!$this->isValidCsrfToken($_POST['csrf_token'])) {
                $error = "Token CSRF inválido.";
                include '../app/views/registrar.php';
                return;
            }

            $nome = filter_var(trim($_POST['nome']), FILTER_SANITIZE_STRING);
            $cpf = filter_var(trim($_POST['cpf']), FILTER_SANITIZE_STRING);
            $data_nascimento = $_POST['data_nascimento'];
            $endereco = filter_var(trim($_POST['endereco']), FILTER_SANITIZE_STRING);
            $telefone = filter_var(trim($_POST['telefone']), FILTER_SANITIZE_STRING);
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $senha = $_POST['senha'];

            if ($this->model->register($nome, $cpf, $data_nascimento, $endereco, $telefone, $email, $senha)) {
                header('Location: ../app/views/login.php'); 
                exit;
            } else {
                $error = "O e-mail já está cadastrado. Tente novamente.";
            }
        }

        include '../app/views/registrar.php';
    }

    private function isValidCsrfToken($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
}
?>
