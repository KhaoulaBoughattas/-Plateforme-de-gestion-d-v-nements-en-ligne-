<?php
session_start();

// Connexion à la base de données
$host = 'localhost';
$dbname = 'bdprojettp';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Vérification des champs obligatoires
    if (empty($role) || empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Tous les champs sont obligatoires !";
        exit;
    }

    // Validation des mots de passe
    if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas !";
        exit;
    }

    // Vérification si l'email existe déjà dans la base de données
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        echo "L'email est déjà utilisé !";
        exit;
    }

    // Hashage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertion des données dans la base de données
    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $hashed_password, $role]);

        // Stockage des informations dans la session
        $_SESSION['user_name'] = $name;
        $_SESSION['user_role'] = $role;

        // Redirection en fonction du rôle
        if ($role === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: user.php");
        }
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de l'inscription : " . $e->getMessage();
        exit;
    }
} else {
    echo "Méthode de requête non autorisée !";
    exit;
}
?>
