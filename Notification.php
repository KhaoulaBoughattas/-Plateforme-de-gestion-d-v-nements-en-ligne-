<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Notification {

    // Fonction pour envoyer une notification par e-mail
    public function sendEmailNotification($toEmail, $subject, $message) {
        $mail = new PHPMailer(true);
        
        try {
            $mail->setFrom('noreply@example.com', 'Event Platform');
            $mail->addAddress($toEmail);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    // Fonction pour envoyer une notification interne
    public function sendInternalNotification($userId, $message, $conn) {
        $stmt = $conn->prepare("INSERT INTO notifications (user_id, message) VALUES (?, ?)");
        return $stmt->execute([$userId, $message]);
    }
}
?>
