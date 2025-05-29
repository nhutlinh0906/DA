<?php
class message {
    private $conn;

    public $id_message;
    public $id_user;
    public $support_message;
    public $content_message;
    public $type_message;
    public $file_message;
    public $read_message;
    public $date_message;
    
 
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Read all favourites
    public function read() {
        $query = "SELECT * FROM message ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Show a single favourites
    public function show() {
        $query = "SELECT * FROM message WHERE id_message = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_message);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //$this->id_message = $row['id_message'];
        $this->id_user = $row['id_user'];
        $this->support_message = $row['support_message'];
        $this->content_message = $row['content_message'];
        $this->type_message = $row['type_message'];
        $this->file_message = $row['file_message'];
        $this->read_message = $row['read_message'];
        $this->date_message = $row['date_message'];

    }

// Create (Insert) a new pet
    public function create() {
        $query = "INSERT INTO message SET id_message=:id_message, id_user =:id_user, support_message=:support_message, content_message=:content_message,
         type_message=:type_message, file_message =:file_message, read_message=:read_message, date_message=:date_message";
        $stmt = $this->conn->prepare($query);

        // Clean data
       // $this->id_message = htmlspecialchars(strip_tags($this->id_message));
         $this->id_message = htmlspecialchars(strip_tags($this->id_message));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->support_message = htmlspecialchars(strip_tags($this->support_message));
        $this->content_message = htmlspecialchars(strip_tags($this->content_message));
        $this->type_message = htmlspecialchars(strip_tags($this->type_message));
        $this->file_message = htmlspecialchars(strip_tags($this->file_message));
        $this->read_message = htmlspecialchars(strip_tags($this->read_message));
        $this->date_message = htmlspecialchars(strip_tags($this->date_message));
       


        // Bind data
       // $stmt->bindParam(':id_message', $this->id_message);
        $stmt->bindParam(':id_message', $this->id_message);
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':support_message', $this->support_message);
        $stmt->bindParam(':content_message', $this->content_message);
        $stmt->bindParam(':type_message', $this->type_message);
        $stmt->bindParam(':file_message', $this->file_message);
        $stmt->bindParam(':read_message', $this->read_message);
        $stmt->bindParam(':date_message', $this->date_message);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Update pet details
    public function update() {
        $query = "UPDATE message SET id_user=:id_user, support_message=:support_message, content_message=:content_message,
        type_message=:type_message, file_message=:file_message, read_message=:read_message, date_message=:date_message
        WHERE id_message=:id_message  ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_message=htmlspecialchars(strip_tags($this->id_message));
        $this->id_user=htmlspecialchars(strip_tags($this->id_user));
        $this->support_message = htmlspecialchars(strip_tags($this->support_message));
        $this->content_message = htmlspecialchars(strip_tags($this->content_message));
        $this->type_message = htmlspecialchars(strip_tags($this->type_message));
        $this->file_message = htmlspecialchars(strip_tags($this->file_message));
        $this->read_message = htmlspecialchars(strip_tags($this->read_message));
        $this->date_message = htmlspecialchars(strip_tags($this->date_message)); 


        // Bind dat
        $stmt->bindParam(':id_message', $this->id_message );
        $stmt->bindParam(':id_user', $this->id_user );
        $stmt->bindParam(':support_message', $this->support_message);
        $stmt->bindParam(':content_message', $this->content_message);
        $stmt->bindParam(':type_message', $this->type_message);
        $stmt->bindParam(':file_message', $this->file_message);
        $stmt->bindParam(':read_message', $this->read_message);   
        $stmt->bindParam(':date_message', $this->date_message);
       
        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Delete a pet
    public function delete() {
        $query = "DELETE FROM message WHERE id_message=:id_message";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_message = htmlspecialchars(strip_tags($this->id_message));

        // Bind data
        $stmt->bindParam(':id_message', $this->id_message);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
}

?>
