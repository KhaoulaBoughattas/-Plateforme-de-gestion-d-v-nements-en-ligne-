<?php
class Admin extends User {

    // Constructeur
    public function __construct($id, $username, $email, $password, $role = 'admin') {
        parent::__construct($id, $username, $email, $password, $role);
    }

    // Ajouter un utilisateur
    public function addUser($conn, $username, $email, $password) {
        $newUser = new User(null, $username, $email, $password);
        return $newUser->register($conn);
    }

    // Supprimer un utilisateur
    public function deleteUser($conn, $userId) {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$userId]);
    }

    // Gérer un événement
    public function manageEvent($conn, $eventId, $action) {
        $event = new Event($eventId, '', '', '');
        switch ($action) {
            case 'create':
                return $event->createEvent($conn);
            case 'update':
                return $event->updateEvent($conn);
            case 'delete':
                return $event->deleteEvent($conn);
        }
    }
}
?>
