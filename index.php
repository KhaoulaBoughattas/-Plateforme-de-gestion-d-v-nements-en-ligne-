<?php
include '../config/db.php';
include '../classes/User.php';
include '../classes/Notification.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle login or registration logic
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Plateforme d'événements</title>
</head>
<body>
    <h1>Bienvenue sur la plateforme d'événements</h1>
    <p><a href="login.php">Se connecter</a> | <a href="register.php">S'inscrire</a></p>
</body>
</html>
