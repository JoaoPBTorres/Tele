<?php
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($email, $password) {
        // Prepara a consulta para selecionar o usuário pelo e-mail
        $stmt = $this->pdo->prepare("SELECT * FROM clientes.usuario WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o usuário existe e se a senha está correta
        if ($user && password_verify($password, $user['senha'])) {
            return $user; // Usuário autenticado
        }

        return false; // Credenciais inválidas
    }

    public function register($nome, $cpf, $data_nascimento, $endereco, $telefone, $email, $senha) {
        // Normaliza, removendo todos os caracteres não numéricos
        $telefone = $this->removerCaracteresEspeciais($telefone);
        $cpf = $this->removerCaracteresEspeciais($cpf);

        // Verifica se o e-mail já está cadastrado
        if ($this->emailExists($email)) {
            return false; // E-mail já cadastrado
        }

        // Criptografa a senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Insere o novo usuário
        $stmt = $this->pdo->prepare("INSERT INTO clientes.usuario (nome, cpf, data_nascimento, endereco, telefone, email, senha) VALUES (:nome, :cpf, :data_nascimento, :endereco, :telefone, :email, :senha)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash);

        return $stmt->execute(); // Retorna verdadeiro em caso de sucesso ou falso em caso de erro
    }

    private function removerCaracteresEspeciais($dado) {
        // Remove todos os caracteres que não são dígitos, deixando somente números
        return preg_replace('/\D/', '', $dado);
    }

    private function emailExists($email) {
        // Prepara a consulta para verificar se o e-mail já está cadastrado
        $stmt = $this->pdo->prepare("SELECT id FROM clientes.usuario WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false; // Retorna verdadeiro se o e-mail já existir
    }
}
?>
