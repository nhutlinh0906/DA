<?php
class typelocation {
    private $conn;

    public $id_typelocation   ;
    public $name_typelocation;
    public $describe_typelocation;
    public $icon_typelocation;
    public $id_locationn ;
    public $status_typelocation;
    public $update_typelocation;
 
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Read all favourites
    public function read() {
        $query = "SELECT * FROM typelocation ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Show a single favourites
    public function show() {
        $query = "SELECT * FROM typelocation WHERE id_typelocation  = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_typelocation);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name_typelocation = $row['name_typelocation'];
        $this->describe_typelocation = $row['describe_typelocation'];
        $this->icon_typelocation = $row['icon_typelocation'];
        $this->id_locationn = $row['id_locationn '];
        $this->status_typelocation = $row['status_typelocation'];
        $this->update_typelocation = $row['update_typelocation'];

    }

// Create (Insert) a new pet
    public function create() {
        $query = "INSERT INTO typelocation SET id_typelocation=:id_typelocation, name_typelocation=:name_typelocation, describe_typelocation=:describe_typelocation,
         icon_typelocation=:icon_typelocation, id_locationn=:id_locationn , status_typelocation=:status_typelocation, update_typelocation=:update_typelocation";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_typelocation = htmlspecialchars(strip_tags($this->id_typelocation));
        $this->name_typelocation = htmlspecialchars(strip_tags($this->name_typelocation));
        $this->describe_typelocation = htmlspecialchars(strip_tags($this->describe_typelocation));
        $this->icon_typelocation = htmlspecialchars(strip_tags($this->icon_typelocation));
        $this->id_locationn  = htmlspecialchars(strip_tags($this->id_locationn ));
        $this->status_typelocation = htmlspecialchars(strip_tags($this->status_typelocation));
        $this->update_typelocation = htmlspecialchars(strip_tags($this->update_typelocation));
        
        // Bind data
        $stmt->bindParam(':id_typelocation', $this->id_typelocation);
        $stmt->bindParam(':name_typelocation', $this->name_typelocation);
        $stmt->bindParam(':describe_typelocation', $this->describe_typelocation);
        $stmt->bindParam(':icon_typelocation', $this->icon_typelocation);
        $stmt->bindParam(':id_locationn', $this->id_locationn );
        $stmt->bindParam(':status_typelocation', $this->status_typelocation);
        $stmt->bindParam(':update_typelocation', $this->update_typelocation);
       
        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Update pet details
    public function update() {
        $query = "UPDATE typelocation SET name_typelocation=:name_typelocation, describe_typelocation=:describe_typelocation, icon_typelocation=:icon_typelocation,
         id_locationn=:id_locationn, status_typelocation=:status_typelocation, update_typelocation=:update_typelocation
         WHERE id_typelocation=:id_typelocation  ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_typelocation = htmlspecialchars(strip_tags($this->id_typelocation));
        $this->name_typelocation = htmlspecialchars(strip_tags($this->name_typelocation));
        $this->describe_typelocation = htmlspecialchars(strip_tags($this->describe_typelocation));
        $this->icon_typelocation = htmlspecialchars(strip_tags($this->icon_typelocation));
        $this->id_locationn = htmlspecialchars(strip_tags($this->id_locationn));
        $this->status_typelocation = htmlspecialchars(strip_tags($this->status_typelocation));
        $this->update_typelocation = htmlspecialchars(strip_tags($this->update_typelocation));
       

        // Bind dat
        $stmt->bindParam(':id_typelocation', $this->id_typelocation);
        $stmt->bindParam(':name_typelocation', $this->name_typelocation);
        $stmt->bindParam(':describe_typelocation', $this->describe_typelocation);
        $stmt->bindParam(':icon_typelocation', $this->icon_typelocation);
        $stmt->bindParam(':id_locationn', $this->id_locationn );
        $stmt->bindParam(':status_typelocation', $this->status_typelocation);
        $stmt->bindParam(':update_typelocation', $this->update_typelocation);      

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Delete a pet
    public function delete() {
        $query = "DELETE FROM typelocation WHERE id_typelocation= :id_typelocation";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_typelocation = htmlspecialchars(strip_tags($this->id_typelocation));

        // Bind data
        $stmt->bindParam(':id_typelocation', $this->id_user);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
}

?>
