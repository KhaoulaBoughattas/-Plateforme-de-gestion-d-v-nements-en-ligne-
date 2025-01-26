<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure le fichier autoload de Composer pour charger PHPMailer
require 'vendor/autoload.php';

// Fonction pour envoyer un e-mail
function sendNotificationEmail($toEmail, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Serveur SMTP, par exemple Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'votre_email@gmail.com'; // Votre adresse e-mail
        $mail->Password = 'votre_mot_de_passe'; // Votre mot de passe
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Sécurisation TLS
        $mail->Port = 587; // Port SMTP pour TLS

        // Destinataire
        $mail->setFrom('votre_email@gmail.com', 'Plateforme d\'événements');
        $mail->addAddress($toEmail);

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Envoi de l'e-mail
        $mail->send();
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail: {$mail->ErrorInfo}";
    }
}
?>
