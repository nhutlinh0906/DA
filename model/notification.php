<?php
class notification {
    private $conn;
    
    public $id_notification   ;
    public $id_user;
    public $title_notification;
    public $content_notification;
    public $type_notification;
    public $id_object_notification;
    public $link_notification;
    public $read_notification;
    public $date_notification;
 
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Read all favourites
    public function read() {
        $query = "SELECT * FROM notification ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Show a single favourites
    public function show() {
        $query = "SELECT * FROM notification WHERE id_notification  = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_notification);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id_user = $row['id_user'];
        $this->title_notification = $row['title_notification'];
        $this->content_notification = $row['content_notification'];
        $this->type_notification = $row['type_notification'];
        $this->id_object_notification = $row['id_object_notification'];
        $this->link_notification = $row['link_notification'];
        $this->read_notification = $row['read_notification'];
        $this->date_notification = $row['date_notification'];

    }

// Create (Insert) a new pet
    public function create() {
        $query = "INSERT INTO notification SET id_notification=:id_notification, id_user =:id_user, title_notification=:title_notification, content_notification=:content_notification,
         type_notification=:type_notification, id_object_notification =:id_object_notification, link_notification=:link_notification, read_notification=:read_notification, date_notification =:date_notification";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_notification = htmlspecialchars(strip_tags($this->id_notification));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->title_notification = htmlspecialchars(strip_tags($this->title_notification));
        $this->content_notification = htmlspecialchars(strip_tags($this->content_notification));
        $this->type_notification = htmlspecialchars(strip_tags($this->type_notification));
        $this->id_object_notification = htmlspecialchars(strip_tags($this->id_object_notification));
        $this->link_notification = htmlspecialchars(strip_tags($this->link_notification));
        $this->read_notification = htmlspecialchars(strip_tags($this->read_notification));
        $this->date_notification = htmlspecialchars(strip_tags($this->date_notification));


        // Bind data
        $stmt->bindParam(':id_notification', $this->id_notification);
        $stmt->bindParam(':id_user', $this->id_user );
        $stmt->bindParam(':title_notification', $this->title_notification);
        $stmt->bindParam(':content_notification', $this->content_notification);
        $stmt->bindParam(':type_notification', $this->type_notification);
        $stmt->bindParam(':id_object_notification', $this->id_object_notification);
        $stmt->bindParam(':link_notification', $this->link_notification);
        $stmt->bindParam(':read_notification', $this->read_notification);
        $stmt->bindParam(':date_notification', $this->date_notification);
        

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Update pet details
    public function update() {
        $query = "UPDATE notification SET id_user=:id_user, title_notification=:title_notification, content_notification=:content_notification, type_notification=:type_notification,
         id_object_notification=:id_object_notification, link_notification=:link_notification, read_notification=:read_notification, date_notification=:date_notification
         WHERE id_notification=:id_notification  ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_notification = htmlspecialchars(strip_tags($this->id_notification ));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->title_notification = htmlspecialchars(strip_tags($this->title_notification));
        $this->content_notification = htmlspecialchars(strip_tags($this->content_notification));
        $this->type_notification = htmlspecialchars(strip_tags($this->type_notification));
        $this->id_object_notification = htmlspecialchars(strip_tags($this->id_object_notification));
        $this->link_notification = htmlspecialchars(strip_tags($this->link_notification));
        $this->read_notification = htmlspecialchars(strip_tags($this->read_notification));
        $this->date_notification = htmlspecialchars(strip_tags($this->date_notification));


        // Bind dat
        $stmt->bindParam(':id_notification', $this->id_notification);
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':title_notification', $this->title_notification);
        $stmt->bindParam(':content_notification', $this->content_notification);
        $stmt->bindParam(':type_notification', $this->type_notification);
        $stmt->bindParam(':id_object_notification', $this->id_object_notification);
        $stmt->bindParam(':link_notification', $this->link_notification);   
        $stmt->bindParam(':read_notification', $this->read_notification);
        $stmt->bindParam(':date_notification', $this->date_notification);
        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Delete a pet
    public function delete() {
        $query = "DELETE FROM notification WHERE id_notification=:id_notification";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_notification = htmlspecialchars(strip_tags($this->id_notification));

        // Bind data
        $stmt->bindParam(':id_notification', $this->id_notification);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
}

?>
