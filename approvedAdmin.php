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

// Vérifier si l'utilisateur est administrateur
if ($_SESSION['role'] !== 'admin') {
    die("Accès interdit.");
}

if (isset($_GET['approve_id'])) {
    $event_id = $_GET['approve_id'];

    // Mettre à jour l'événement pour le marquer comme approuvé
    $sql = "UPDATE events SET status = 'approved' WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$event_id]);

    echo "Événement approuvé avec succès !";
    header("Location: events_admin.php");
    exit;
}

// Afficher tous les événements en attente
$sql = "SELECT * FROM events WHERE status = 'pending'";
$stmt = $pdo->query($sql);
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des événements</title>
</head>
<body>
    <h2>Événements en attente d'approbation</h2>
    <table>
        <tr>
            <th>Nom de l'événement</th>
            <th>Description</th>
            <th>Date</th>
            <th>Lieu</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($events as $event): ?>
            <tr>
                <td><?= htmlspecialchars($event['title']) ?></td>
                <td><?= htmlspecialchars($event['description']) ?></td>
                <td><?= htmlspecialchars($event['event_date']) ?></td>
                <td><?= htmlspecialchars($event['location']) ?></td>
                <td><?= htmlspecialchars($event['category']) ?></td>
                <td><a href="?approve_id=<?= $event['id'] ?>">Approuver</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
