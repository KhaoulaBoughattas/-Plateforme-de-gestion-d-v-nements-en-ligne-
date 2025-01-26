<?php
class Event {
    private $id;
    private $name;
    private $date;
    private $description;

    // Constructeur
    public function __construct($id, $name, $date, $description) {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->description = $description;
    }

    // Créer un événement
    public function createEvent($conn) {
        $stmt = $conn->prepare("INSERT INTO events (name, date, description) VALUES (?, ?, ?)");
        return $stmt->execute([$this->name, $this->date, $this->description]);
    }

    // Modifier un événement
    public function updateEvent($conn) {
        $stmt = $conn->prepare("UPDATE events SET name = ?, date = ?, description = ? WHERE id = ?");
        return $stmt->execute([$this->name, $this->date, $this->description, $this->id]);
    }

    // Supprimer un événement
    public function deleteEvent($conn) {
        $stmt = $conn->prepare("DELETE FROM events WHERE id = ?");
        return $stmt->execute([$this->id]);
    }

    // Afficher un événement
    public function getEventDetails($conn) {
        $stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
        $stmt->execute([$this->id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
