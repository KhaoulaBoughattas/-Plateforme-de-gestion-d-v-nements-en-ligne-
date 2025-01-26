<?php
session_start();

// Configuration de la base de données
$host = 'localhost';
$dbname = 'bdprojettp';
$username = 'root';
$password = '';

// Établir la connexion avec la base de données
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    die("Erreur : Utilisateur non connecté.");
}

// Vérifier si un ID d'événement est fourni
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Erreur : Aucun événement sélectionné.");
}

$event_id = $_GET['id'];

// Récupérer les données de l'événement à modifier
try {
    $sql = "SELECT * FROM events WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$event_id, $_SESSION['user_id']]);
    $event = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$event) {
        die("Erreur : Événement introuvable ou non autorisé.");
    }
} catch (PDOException $e) {
    die("Erreur lors de la récupération des données de l'événement : " . $e->getMessage());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $event_date = $_POST['event_date'] ?? '';
    $location = trim($_POST['location'] ?? '');
    $category = trim($_POST['category'] ?? '');

    // Validation des données
    if (empty($title) || empty($description) || empty($event_date) || empty($location) || empty($category)) {
        die("Erreur : Tous les champs sont obligatoires.");
    }

    // Vérifier le format de la date
    if (!DateTime::createFromFormat('Y-m-d', $event_date)) {
        die("Erreur : Le format de la date est incorrect.");
    }

    // Mettre à jour les données de l'événement
    try {
        $sql = "UPDATE events SET title = ?, description = ?, event_date = ?, location = ?, category = ? WHERE id = ? AND user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $description, $event_date, $location, $category, $event_id, $_SESSION['user_id']]);

        header("Location: events.php?success=update");
        exit;
    } catch (PDOException $e) {
        die("Erreur lors de la mise à jour de l'événement : " . $e->getMessage());
    }
    
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un événement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Modifier un événement</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Nom de l'événement :</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($event['title']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea class="form-control" id="description" name="description" required><?= htmlspecialchars($event['description']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="event_date" class="form-label">Date de l'événement :</label>
            <input type="date" class="form-control" id="event_date" name="event_date" value="<?= htmlspecialchars($event['event_date']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lieu de l'événement :</label>
            <input type="text" class="form-control" id="location" name="location" value="<?= htmlspecialchars($event['location']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Catégorie :</label>
            <input type="text" class="form-control" id="category" name="category" value="<?= htmlspecialchars($event['category']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
