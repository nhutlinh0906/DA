<?php
class systemnotification {
    private $conn;

    public $id_systemnotification    ;
    public $title_systemnotification;
    public $content_systemnotification;
    public $type_systemnotification;
    public $id_user ;
    public $time_systemnotification;
    public $status_systemnotification;
    public $id_create_systemnotification;
    public $date_systemnotification;
    
 
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Read all favourites
    public function read() {
        $query = "SELECT * FROM systemnotification ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Show a single favourites
    public function show() {
        $query = "SELECT * FROM systemnotification WHERE id_systemnotification = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_systemnotification );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title_systemnotification = $row['title_systemnotification'];
        $this->content_systemnotification = $row['content_systemnotification'];
        $this->type_systemnotification = $row['type_systemnotification'];
        $this->id_user = $row['id_user'];
        $this->time_systemnotification = $row['time_systemnotification'];
        $this->status_systemnotification = $row['status_systemnotification'];
        $this->id_create_systemnotification = $row['id_create_systemnotification'];
        $this->date_systemnotification = $row['date_systemnotification'];

    }

// Create (Insert) a new pet
    public function create() {
        $query = "INSERT INTO systemnotification SET id_systemnotification =:id_systemnotification , title_systemnotification=:title_systemnotification, content_systemnotification=:content_systemnotification,
        type_systemnotification=:type_systemnotification, id_user=:id_user, time_systemnotification=:time_systemnotification, status_systemnotification=:status_systemnotification,
        id_create_systemnotification=:id_create_systemnotification, date_systemnotification =:date_systemnotification";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_systemnotification  = htmlspecialchars(strip_tags($this->id_systemnotification ));
        $this->title_systemnotification = htmlspecialchars(strip_tags($this->title_systemnotification));
        $this->content_systemnotification = htmlspecialchars(strip_tags($this->content_systemnotification));
        $this->type_systemnotification = htmlspecialchars(strip_tags($this->type_systemnotification));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->time_systemnotification = htmlspecialchars(strip_tags($this->time_systemnotification));
        $this->status_systemnotification = htmlspecialchars(strip_tags($this->status_systemnotification));
        $this->id_create_systemnotification = htmlspecialchars(strip_tags($this->id_create_systemnotification));
        $this->date_systemnotification = htmlspecialchars(strip_tags($this->date_systemnotification));

        // Bind data
        $stmt->bindParam(':id_systemnotification ', $this->id_systemnotification);
        $stmt->bindParam(':title_systemnotification', $this->title_systemnotification);
        $stmt->bindParam(':content_systemnotification', $this->content_systemnotification);
        $stmt->bindParam(':type_systemnotification', $this->type_systemnotification);
        $stmt->bindParam(':id_user', $this->id_user );
        $stmt->bindParam(':time_systemnotification', $this->time_systemnotification);
        $stmt->bindParam(':status_systemnotification', $this->status_systemnotification);
        $stmt->bindParam(':id_create_systemnotification', $this->id_create_systemnotification);
        $stmt->bindParam(':date_systemnotification', $this->date_systemnotification);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Update pet details
    public function update() {
        $query = "UPDATE systemnotification SET title_systemnotification=:title_systemnotification, content_systemnotification=:content_systemnotification, type_systemnotification=:type_systemnotification,
         id_user=:id_user, time_systemnotification=:time_systemnotification, status_systemnotification=:status_systemnotification, id_create_systemnotification=:id_create_systemnotification,
         date_systemnotification=:date_systemnotification
         WHERE id_systemnotification=:id_systemnotification ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_systemnotification = htmlspecialchars(strip_tags($this->id_systemnotification ));
        $this->title_systemnotification = htmlspecialchars(strip_tags($this->title_systemnotification));
        $this->content_systemnotification = htmlspecialchars(strip_tags($this->content_systemnotification));
        $this->type_systemnotification = htmlspecialchars(strip_tags($this->type_systemnotification));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user ));
        $this->time_systemnotification = htmlspecialchars(strip_tags($this->time_systemnotification));
        $this->status_systemnotification = htmlspecialchars(strip_tags($this->status_systemnotification));
        $this->id_create_systemnotification = htmlspecialchars(strip_tags($this->id_create_systemnotification));
        $this->date_systemnotification = htmlspecialchars(strip_tags($this->date_systemnotification));

        // Bind dat
        $stmt->bindParam(':id_systemnotification', $this->id_systemnotification );
        $stmt->bindParam(':title_systemnotification', $this->title_systemnotification);
        $stmt->bindParam(':content_systemnotification', $this->content_systemnotification);
        $stmt->bindParam(':type_systemnotification', $this->type_systemnotification);
        $stmt->bindParam(':id_user', $this->id_user );
        $stmt->bindParam(':time_systemnotification', $this->time_systemnotification);
        $stmt->bindParam(':status_systemnotification', $this->status_systemnotification);   
        $stmt->bindParam(':id_create_systemnotification', $this->id_create_systemnotification);
        $stmt->bindParam(':date_systemnotification', $this->date_systemnotification);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Delete a pet
    public function delete() {
        $query = "DELETE FROM systemnotification WHERE id_systemnotification=:id_systemnotification";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_systemnotification = htmlspecialchars(strip_tags($this->id_systemnotification));

        // Bind data
        $stmt->bindParam(':id_systemnotification', $this->id_systemnotification);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
}

?>
