<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo "Veuillez vous connecter pour voir vos événements.";
    exit;
}

// Configuration de la base de données
$host = 'localhost';
$dbname = 'bdprojettp';
$username = 'root';
$password = '';

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer l'ID de l'utilisateur connecté
$user_id = $_SESSION['user_id'];

// Sélectionner les événements de l'utilisateur connecté
$sql = "SELECT * FROM events WHERE user_id = :user_id ORDER BY event_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

// Vérifier s'il y a des événements
if ($stmt->rowCount() > 0) {
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>";
    echo "<tr><th>Nom de l'événement</th><th>Description</th><th>Date</th><th>Lieu</th><th>Actions</th></tr>";
    foreach ($events as $event) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($event['event_name']) . "</td>";
        echo "<td>" . htmlspecialchars($event['description']) . "</td>";
        echo "<td>" . htmlspecialchars($event['event_date']) . "</td>";
        echo "<td>" . htmlspecialchars($event['location']) . "</td>";
        echo "<td>
                <a href='edit_event.php?id=" . $event['id'] . "'>Éditer</a> | 
                <a href='delete_event.php?id=" . $event['id'] . "'>Supprimer</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun événement trouvé.";
}
?>
