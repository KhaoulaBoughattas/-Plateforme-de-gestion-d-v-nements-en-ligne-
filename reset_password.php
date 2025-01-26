<?php
// Démarrer la session
session_start();

// Connexion à la base de données
$host = 'localhost'; // L'hôte de la base de données
$dbname = 'projetwebtp'; // Le nom de la base de données
$username = 'root'; // Le nom d'utilisateur de la base de données
$password = ''; // Le mot de passe de la base de données

// Créer une connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier que l'email a été soumis
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = trim($_POST['email']);
        
        // Préparer la requête pour vérifier si l'email existe dans la base de données
        $stmt = $conn->prepare("SELECT id FROM inscriptions WHERE email = ?");
        
        // Vérifier si la préparation a réussi
        if (!$stmt) {
            die("Erreur lors de la préparation de la requête : " . $conn->error);
        }
        
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result(); // Utiliser store_result() pour pouvoir vérifier num_rows

        if ($stmt->num_rows > 0) {
            // Générer un jeton sécurisé
            $token = bin2hex(random_bytes(32));
            $expiration = date("Y-m-d H:i:s", strtotime("+1 hour"));

            // Insérer le jeton dans la base de données
            $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expiration) VALUES (?, ?, ?)");
            
            // Vérifier si la préparation a réussi
            if (!$stmt) {
                die("Erreur lors de la préparation de la requête d'insertion : " . $conn->error);
            }

            $stmt->bind_param("sss", $email, $token, $expiration);
            $stmt->execute();

            // Créer le lien de réinitialisation
            $reset_link = "http://yourdomain.com/reset_form.php?token=" . $token;

            // Envoyer l'email de réinitialisation
            $to = $email;
            $subject = "Réinitialisation de votre mot de passe";
            $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : " . $reset_link;
            $headers = "From: no-reply@yourdomain.com\r\n";

            if (mail($to, $subject, $message, $headers)) {
                echo "Un lien de réinitialisation a été envoyé à votre adresse e-mail.";
            } else {
                echo "Erreur lors de l'envoi de l'e-mail. Veuillez réessayer.";
            }
        } else {
            echo "Aucun compte associé à cet e-mail.";
        }

        $stmt->close();
    } else {
        echo "Veuillez fournir une adresse e-mail valide.";
    }
} else {
    header("Location: index.html");
    exit();
}

$conn->close();
?>
