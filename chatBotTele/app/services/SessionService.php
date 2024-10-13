<?php
class SessionService {
    public function startSession() {
        // Inicia a sessão se ela ainda não foi iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function destroySession() {
        // Inicia a sessão caso não esteja ativa
        $this->startSession();

        // Limpa todas as variáveis de sessão
        $_SESSION = [];

        // Remove o cookie de sessão
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Destroi a sessão
        session_destroy();
    }

    public function getUserId() {
        $this->startSession();
        return $_SESSION['user_id'] ?? null;
    }

    public function setUserId($userId) {
        $this->startSession();
        $_SESSION['user_id'] = $userId;
    }

    public function clearCsrfToken() {
        $this->startSession();
        unset($_SESSION['csrf_token']);
    }

    public function getCsrfToken() {
        $this->startSession();
        return $_SESSION['csrf_token'] ?? null;
    }

    public function generateCsrfToken() {
        $this->startSession();
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
}
?>
