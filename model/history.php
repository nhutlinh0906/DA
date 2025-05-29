<?php
class history {
    private $conn;

    public $id_history  ;
    public $id_user;
    public $id_locationn;
    public $date_history;
    public $time_history;
    public $note_history;
    public $evaluate_history;
    public $image_history;
    public $creat_history;
 
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Read all favourites
    public function read() {
        $query = "SELECT * FROM history ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Show a single favourites
    public function show() {
        $query = "SELECT * FROM history WHERE id_history = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_history);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id_user = $row['id_user'];
        $this->id_locationn = $row['id_locationn'];
        $this->date_history = $row['date_history'];
        $this->time_history = $row['time_history'];
        $this->note_history = $row['note_history'];
        $this->evaluate_history = $row['evaluate_history'];
        $this->image_history = $row['image_history'];
        $this->creat_history = $row['creat_history'];

    }


     // Create (Insert) a new pet
    public function create() {
        $query = "INSERT INTO history SET 
         id_history=:id_history, id_user=:id_user, id_locationn=:id_locationn, date_history=:date_history,
         time_history=:time_history, note_history =:note_history, evaluate_history=:evaluate_history, image_history=:image_history, creat_history =:creat_history";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_history= htmlspecialchars(strip_tags($this->id_history));
        $this->id_user= htmlspecialchars(strip_tags($this->id_user));
        $this->id_locationn= htmlspecialchars(strip_tags($this->id_locationn));
        $this->date_history= htmlspecialchars(strip_tags($this->date_history));
        $this->time_history= htmlspecialchars(strip_tags($this->time_history));
        $this->note_history= htmlspecialchars(strip_tags($this->note_history));
        $this->evaluate_history= htmlspecialchars(strip_tags($this->evaluate_history));
        $this->image_history= htmlspecialchars(strip_tags($this->image_history));
        $this->creat_history= htmlspecialchars(strip_tags($this->creat_history));

        // Bind data
        $stmt->bindParam(':id_history', $this->id_history);
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':id_locationn', $this->id_locationn);
        $stmt->bindParam(':date_history', $this->date_history);
        $stmt->bindParam(':time_history', $this->time_history);
        $stmt->bindParam(':note_history', $this->note_history);
        $stmt->bindParam(':evaluate_history', $this->evaluate_history);
        $stmt->bindParam(':image_history', $this->image_history);
        $stmt->bindParam(':creat_history', $this->creat_history);
    
        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Update pet details
    public function update() {
        $query = "UPDATE history SET id_user=:id_user, id_locationn=:id_locationn, date_history=:date_history, time_history=:time_history,
         note_history=:note_history, evaluate_history=:evaluate_history, image_history=:image_history, creat_history=:creat_history
         WHERE id_history=:id_history  ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_history= htmlspecialchars(strip_tags($this->id_history ));
        $this->id_user= htmlspecialchars(strip_tags($this->id_user));
        $this->id_locationn= htmlspecialchars(strip_tags($this->id_locationn));
        $this->date_history= htmlspecialchars(strip_tags($this->date_history));
        $this->time_history= htmlspecialchars(strip_tags($this->time_history));
        $this->note_history= htmlspecialchars(strip_tags($this->note_history));
        $this->evaluate_history= htmlspecialchars(strip_tags($this->evaluate_history));
        $this->image_history= htmlspecialchars(strip_tags($this->image_history));
        $this->creat_history= htmlspecialchars(strip_tags($this->creat_history));
      
        // Bind dat
        $stmt->bindParam(':id_history', $this->id_history);
        $stmt->bindParam(':id_user', $this-> id_user);
        $stmt->bindParam(':id_locationn', $this->id_locationn);
        $stmt->bindParam(':date_history', $this->date_history);
        $stmt->bindParam(':time_history', $this->time_history);
        $stmt->bindParam(':note_history', $this->note_history);
        $stmt->bindParam(':evaluate_history', $this->evaluate_history);   
        $stmt->bindParam(':image_history', $this->image_history);
        $stmt->bindParam(':creat_history', $this->creat_history);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Delete a pet
    public function delete() {
        $query = "DELETE FROM history WHERE id_history=:id_history";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_history = htmlspecialchars(strip_tags($this->id_history));

        // Bind data
        $stmt->bindParam(':id_history', $this->id_history );

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
}

?>
