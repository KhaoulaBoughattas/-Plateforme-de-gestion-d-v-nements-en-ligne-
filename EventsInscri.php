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

// Récupérer les événements auxquels l'utilisateur est inscrit
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("
    SELECT e.* 
    FROM events e
    JOIN event_participants ep ON e.id = ep.event_id
    WHERE ep.user_id = ?");
$stmt->execute([$user_id]);
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Afficher les événements
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes événements</title>
</head>
<body>
    <h2>Mes événements</h2>
    <table>
        <tr>
            <th>Nom de l'événement</th>
            <th>Date</th>
            <th>Lieu</th>
            <th>Catégorie</th>
        </tr>
        
        <?php foreach ($events as $event): ?>
            <tr>
                <td><?= htmlspecialchars($event['title']) ?></td>
                <td><?= htmlspecialchars($event['event_date']) ?></td>
                <td><?= htmlspecialchars($event['location']) ?></td>
                <td><?= htmlspecialchars($event['category']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
