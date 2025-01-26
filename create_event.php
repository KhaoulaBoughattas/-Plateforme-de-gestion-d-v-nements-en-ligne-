<?php
session_start();

// Configuration de la base de données
$host = 'localhost';
$dbname = 'bdprojettp';
$username = 'root';
$password = '';

// Établir la connexion avec la base de données
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    die("Utilisateur non connecté.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $location = $_POST['location'];
    $category = $_POST['category'];
    $user_id = $_SESSION['user_id'];

    // Validation des champs
    if (empty($title) || empty($description) || empty($event_date) || empty($location) || empty($category)) {
        die("Tous les champs sont obligatoires.");
    }

    try {
        // Insérer les données dans la table
        $sql = "INSERT INTO events (title, description, event_date, location, category, user_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $description, $event_date, $location, $category, $user_id]);

        echo "Événement créé avec succès !";
        header("Location: events.php");
        exit;
    } catch (PDOException $e) {
        die("Erreur lors de la création de l'événement : " . $e->getMessage());
    }
}
?>
