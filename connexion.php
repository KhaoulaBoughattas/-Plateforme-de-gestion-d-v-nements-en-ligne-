<?php
session_start();
$host = 'localhost';
$dbname = 'bdprojettp';
$username = 'root';
$password = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $formPassword = $_POST['password'];

    if (empty($role) || empty($email) || empty($formPassword)) {
        $error = "Tous les champs sont obligatoires.";
    } else {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Added: security enhancement with user role check.
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND role = :role LIMIT 1");
            $stmt->execute(['email' => $email, 'role' => $role]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($formPassword, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];

                if ($role === 'admin') {
                    header('Location: admin.php');
                    exit;
                } else {
                    header('Location: user.php');
                    exit;
                }
            } else {
                $error = "Identifiants incorrects. Veuillez réessayer.";
            }
        } catch (PDOException $e) {
            $error = "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }
}
?>
