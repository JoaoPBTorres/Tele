<?php
class AuthController {
    private $userModel;
    private $sessionService;

    public function __construct($userModel, $sessionService) {
        $this->userModel = $userModel;
        $this->sessionService = $sessionService;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $csrfToken = $_POST['csrf_token'] ?? '';

            if (empty($email) || empty($password)) {
                $error = "Por favor, preencha todos os campos.";
                include '../app/views/login.php';
                return;
            }

            if (!hash_equals($this->sessionService->getCsrfToken(), $csrfToken)) {
                die("Token CSRF inválido.");
            }

            $user = $this->userModel->login($email, $password);
            if ($user) {
                $this->sessionService->setUserId($user['id']);
                header('Location: ../app/views/bemvindo.php');
                exit();
            } else {
                $error = "E-mail ou senha inválidos.";
                include '../app/views/login.php';
            }
        } else {
            include '../app/views/login.php';
        }
    }

    public function logout() {
        $this->sessionService->destroySession();
        header('Location: ../app/views/login.php');
        exit();
    }
}
?>
