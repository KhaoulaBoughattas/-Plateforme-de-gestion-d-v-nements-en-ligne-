<?php
session_start();

// Configuration de la base de données
$host = 'localhost';
$dbname = 'bdprojettp';
$username = 'root';
$password = '';

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    die("Utilisateur non connecté.");
}

// Récupérer l'ID de l'événement depuis l'URL
$event_id = isset($_GET['event_id']) ? $_GET['event_id'] : 0;

// Vérifier si l'événement existe
$stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
$stmt->execute([$event_id]);
$event = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$event) {
    die("Événement non trouvé.");
}

// Inscrire l'utilisateur à l'événement
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("INSERT INTO event_participants (user_id, event_id) VALUES (?, ?)");
$stmt->execute([$user_id, $event_id]);

// Envoyer un e-mail de confirmation
$to = "user@example.com"; // Remplacer par l'e-mail de l'utilisateur
$subject = "Inscription à l'événement : " . $event['title'];
$message = "Vous vous êtes inscrit avec succès à l'événement : " . $event['title'] . " le " . $event['event_date'] . ".";
$headers = "From: no-reply@example.com";

mail($to, $subject, $message, $headers);

echo "Vous vous êtes inscrit avec succès à l'événement : " . htmlspecialchars($event['title']);
?>
