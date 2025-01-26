<?php
class Registration {
    private $userId;
    private $eventId;

    // Constructeur
    public function __construct($userId, $eventId) {
        $this->userId = $userId;
        $this->eventId = $eventId;
    }

    // Inscrire un utilisateur à un événement
    public function registerUser($conn) {
        $stmt = $conn->prepare("INSERT INTO registrations (user_id, event_id) VALUES (?, ?)");
        return $stmt->execute([$this->userId, $this->eventId]);
    }

    // Annuler l'inscription d'un utilisateur
    public function cancelRegistration($conn) {
        $stmt = $conn->prepare("DELETE FROM registrations WHERE user_id = ? AND event_id = ?");
        return $stmt->execute([$this->userId, $this->eventId]);
    }

    // Vérifier si l'utilisateur est déjà inscrit à l'événement
    public function isUserRegistered($conn) {
        $stmt = $conn->prepare("SELECT * FROM registrations WHERE user_id = ? AND event_id = ?");
        $stmt->execute([$this->userId, $this->eventId]);
        return $stmt->rowCount() > 0;
    }
}
?>
