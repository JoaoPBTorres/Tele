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
            return $user;
        }

        return false;
    }

    public function register($nome, $cpf, $data_nascimento, $telefone, $email, $senha, $genero) {
        $telefone = $this->removerCaracteresEspeciais($telefone);
        $cpf = $this->removerCaracteresEspeciais($cpf);


        if ($this->emailExists($email)) {
            return false;
        }

       
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        
        $stmt = $this->pdo->prepare("INSERT INTO clientes.usuario (nome, cpf, data_nascimento, telefone, email, senha, genero) VALUES (:nome, :cpf, :data_nascimento, :telefone, :email, :senha, :genero)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':senha', $senhaHash);

        return $stmt->execute();
    }

    private function removerCaracteresEspeciais($dado) {
       
        return preg_replace('/\D/', '', $dado);
    }

    private function emailExists($email) {
       
        $stmt = $this->pdo->prepare("SELECT id FROM clientes.usuario WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false; 
    }
}
?>
