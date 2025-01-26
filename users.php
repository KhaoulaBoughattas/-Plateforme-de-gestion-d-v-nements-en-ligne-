<?php
class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;

    // Constructeur
    public function __construct($id, $username, $email, $password, $role = 'user') {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    // Inscription d'un utilisateur
    public function register($conn) {
        $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$this->username, $this->email, $hashed_password, $this->role]);
    }

    // Connexion d'un utilisateur
    public function login($conn) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$this->email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($this->password, $user['password'])) {
            return $user;
        }
        return false;
    }

    // Récupérer l'email
    public function getEmail() {
        return $this->email;
    }

    // Récupérer le rôle
    public function getRole() {
        return $this->role;
    }

    // Récupérer l'ID de l'utilisateur
    public function getId() {
        return $this->id;
    }
}
?>
