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

// Récupérer les filtres
$filter_date = isset($_GET['filter_date']) ? $_GET['filter_date'] : '';
$filter_category = isset($_GET['filter_category']) ? $_GET['filter_category'] : '';
$filter_popularity = isset($_GET['filter_popularity']) ? $_GET['filter_popularity'] : '';

// Construire la requête SQL en fonction des filtres
$sql = "SELECT * FROM events WHERE status = 'approved'";

if ($filter_date) {
    $sql .= " AND event_date = ?";
}
if ($filter_category) {
    $sql .= " AND category = ?";
}
if ($filter_popularity) {
    $sql .= " ORDER BY number_of_participants DESC";  // Trier par popularité
}

$stmt = $pdo->prepare($sql);

// Passer les paramètres de filtre
$params = [];
if ($filter_date) {
    $params[] = $filter_date;
}
if ($filter_category) {
    $params[] = $filter_category;
}

$stmt->execute($params);
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Afficher les événements
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les événements</title>
</head>
<body>
    <h2>Tous les événements</h2>

    <!-- Formulaire de filtre -->
    <form method="GET" action="listes_events.php">
        <label for="filter_date">Filtrer par date:</label>
        <input type="date" name="filter_date" value="<?= htmlspecialchars($filter_date) ?>">
        
        <label for="filter_category">Filtrer par catégorie:</label>
        <select name="filter_category">
            <option value="">Sélectionner une catégorie</option>
            <option value="Culture" <?= $filter_category == 'Culture' ? 'selected' : '' ?>>Culture</option>
            <option value="Sport" <?= $filter_category == 'Sport' ? 'selected' : '' ?>>Sport</option>
            <option value="Technologie" <?= $filter_category == 'Technologie' ? 'selected' : '' ?>>Technologie</option>
            <option value="Autre" <?= $filter_category == 'Autre' ? 'selected' : '' ?>>Autre</option>
        </select>

        <label for="filter_popularity">Filtrer par popularité:</label>
        <select name="filter_popularity">
            <option value="1" <?= $filter_popularity == '1' ? 'selected' : '' ?>>Populaire</option>
            <option value="0" <?= $filter_popularity == '0' ? 'selected' : '' ?>>Tous</option>
        </select>
        
        <button type="submit">Filtrer</button>
    </form>

    <!-- Affichage des événements -->
    <table>
        <tr>
            <th>Nom de l'événement</th>
            <th>Date</th>
            <th>Lieu</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
        
        <?php foreach ($events as $event): ?>
            <tr>
                <td><?= htmlspecialchars($event['title']) ?></td>
                <td><?= htmlspecialchars($event['event_date']) ?></td>
                <td><?= htmlspecialchars($event['location']) ?></td>
                <td><?= htmlspecialchars($event['category']) ?></td>
                <td>
                    <a href="register_event.php?event_id=<?= $event['id'] ?>">S'inscrire</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
