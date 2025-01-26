<?php
session_start();
require 'db_connection.php'; // Fichier pour connecter à la base de données.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier les informations dans la base de données.
    $query = $db->prepare("SELECT * FROM users WHERE email = :email");
    $query->execute(['email' => $email]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Stocker les informations dans la session.
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];

        // Rediriger en fonction du rôle.
        if ($user['role'] === 'user') {
            header("Location: user_dashboard.php");
        } else {
            header("Location: admin_dashboard.php");
        }
        exit;
    } else {
        echo "E-mail ou mot de passe incorrect.";
    }
}
?>
