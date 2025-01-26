<?php
session_start();

// Configuration de la base de données
$host = 'localhost';
$dbname = 'bdprojettp';
$username = 'root';
$password = '';

// Établir la connexion avec la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifier les erreurs de connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Vérifier si l'ID de l'événement est passé en paramètre
if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['user_id'])) {
        die("Utilisateur non connecté.");
    }

    $user_id = $_SESSION['user_id'];

    // Préparer et exécuter la requête de suppression
    $sql = "DELETE FROM events WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erreur SQL : " . $conn->error);
    }

    $stmt->bind_param("ii", $event_id, $user_id);

    if ($stmt->execute()) {
        echo "Événement supprimé avec succès !";
        header("Location: events.php");
        exit;
    } else {
        echo "Erreur lors de la suppression : " . $stmt->error;
    }

    // Fermer la requête
    $stmt->close();
} else {
    die("ID de l'événement manquant.");
}

// Fermer la connexion à la base de données
$conn->close();
?>
