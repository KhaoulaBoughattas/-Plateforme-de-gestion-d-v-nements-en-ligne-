<?php
session_start();

// Vérification de l'admin
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: index.html");
    exit;
}

// Connexion à la base de données
$host = 'localhost';
$dbname = 'bdprojettp';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des paramètres
$id = $_GET['id'] ?? null;
$action = $_GET['action'] ?? null;

if ($id && in_array($action, ['accept', 'reject'])) {
    $status = ($action === 'accept') ? 'accepté' : 'refusé';
    $stmt = $pdo->prepare("UPDATE events SET status = ? WHERE id = ?");
    $stmt->execute([$status, $id]);
}

header("Location: admin_events.php");
exit;
