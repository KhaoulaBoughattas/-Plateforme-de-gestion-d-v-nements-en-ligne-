<?php
// Importer PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Inclure autoload si tu utilises Composer

function sendNotificationEmail($to, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        // Paramètres SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';  // Remplace par ton serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com'; // Ton adresse e-mail
        $mail->Password = 'your-password';  // Ton mot de passe
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom('your-email@example.com', 'Nom de ton site');
        $mail->addAddress($to); // L'adresse e-mail du destinataire

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Envoi de l'e-mail
        $mail->send();
        echo 'Message a été envoyé';
    } catch (Exception $e) {
        echo "Message non envoyé. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
