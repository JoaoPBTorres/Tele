<?php
require '../app/config/Database.php'; // Inclua a configuração do banco de dados
require '../app/models/UserModel.php'; // Inclua o modelo do usuário
require '../app/controllers/AuthController.php'; // Inclua o controlador de login
require '../app/controllers/RegistrarController.php'; // Inclua o controlador de registro
require '../app/services/SessionService.php'; // Inclua o serviço de sessão


// Criação da instância do serviço de sessão
$sessionService = new SessionService();
$sessionService->startSession(); // Inicie a sessão

// Criação da instância do banco de dados e obtenção da conexão PDO
$database = new Database();
$pdo = $database->getConnection(); // Obtenha a conexão PDO

// Criação da instância do modelo de usuário
$userModel = new UserModel($pdo);

// Verifica a ação passada pela URL
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

switch ($action) {
    case 'register':
        $registrarController = new RegistrarController($userModel);
        $registrarController->register();
        break;

    case 'login':
        $authController = new AuthController($userModel, $sessionService);
        $authController->login();
        break;

    case 'logout':
        $authController = new AuthController($userModel, $sessionService);
        $authController->logout();
        break;

    default:
        $authController = new AuthController($userModel, $sessionService);
        $authController->login();
        break;
}
?>
