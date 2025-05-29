<?php
class locationn {
    private $conn;

    public $id_locationn ;
    public $name_locationn ;
    public $address_locationn;
    public $image_locationn;
    public $information_locationn;
    public $type_locationn;
    public $map_locationn;
    public $evaluate_locationn;
    public $price_locationn;
    public $contact_locationn;
    public $open_locationn;
    public $close_locationn;
    public $utilities_locationn;
    public $verified_locationn;
    public $outstand_locationn;
    public $update_locationn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Read all pets
    public function read() {
        $query = "SELECT * FROM locationn ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Show a single pet
    public function show() {
        $query = "SELECT * FROM locationn WHERE id_locationn = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_locationn);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name_locationn = $row['name_locationn'];
        $this->address_locationn = $row['address_locationn'];
        $this->image_locationn = $row['image_locationn'];
        $this->information_locationn = $row['information_locationn'];
        $this->type_locationn = $row['type_locationn'];
        $this->map_locationn = $row['map_locationn'];
        $this->evaluate_locationn = $row['evaluate_locationn'];
        $this->price_locationn = $row['price_locationn'];
        $this->contact_locationn = $row['contact_locationn'];
        $this->open_locationn = $row['open_locationn'];
        $this->close_locationn = $row['close_locationn'];
        $this->utilities_locationn = $row['utilities_locationn'];
        $this->verified_locationn = $row['verified_locationn'];
        $this->outstand_locationn = $row['outstand_locationn'];
        $this->update_locationn = $row['update_locationn'];

    }

   // Create (Insert) a new pet
    public function create() {
        $query = "INSERT INTO locationn SET id_locationn=:id_locationn, name_locationn=:name_locationn, address_locationn=:address_locationn, image_locationn=:image_locationn,
         information_locationn=:information_locationn, type_locationn =:type_locationn, map_locationn=:map_locationn, evaluate_locationn=:evaluate_locationn, price_locationn =:price_locationn,
         contact_locationn =:contact_locationn,open_locationn =:open_locationn, close_locationn =:close_locationn,
         utilities_locationn =:utilities_locationn, verified_locationn =:verified_locationn,
         outstand_locationn =:outstand_locationn, update_locationn =:update_locationn ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_locationn = htmlspecialchars(strip_tags($this->id_locationn));
        $this->name_locationn = htmlspecialchars(strip_tags($this->name_locationn));
        $this->address_locationn = htmlspecialchars(strip_tags($this->address_locationn));
        $this->image_locationn = htmlspecialchars(strip_tags($this->image_locationn));
        $this->information_locationn = htmlspecialchars(strip_tags($this->information_locationn));
        $this->type_locationn = htmlspecialchars(strip_tags($this->type_locationn));
        $this->map_locationn = htmlspecialchars(strip_tags($this->map_locationn));
        $this->evaluate_locationn = htmlspecialchars(strip_tags($this->evaluate_locationn));
        $this->price_locationn = htmlspecialchars(strip_tags($this->price_locationn));
        $this->contact_locationn = htmlspecialchars(strip_tags($this->contact_locationn));
        $this->open_locationn = htmlspecialchars(strip_tags($this->open_locationn));
        $this->close_locationn = htmlspecialchars(strip_tags($this->close_locationn));
        $this->utilities_locationn = htmlspecialchars(strip_tags($this->utilities_locationn));
        $this->verified_locationn = htmlspecialchars(strip_tags($this->verified_locationn));
        $this->outstand_locationn = htmlspecialchars(strip_tags($this->outstand_locationn));
        $this->update_locationn = htmlspecialchars(strip_tags($this->update_locationn));


        // Bind data
        $stmt->bindParam(':id_locationn', $this->id_locationn);
        $stmt->bindParam(':name_locationn', $this->name_locationn);
        $stmt->bindParam(':address_locationn', $this->address_locationn);
        $stmt->bindParam(':image_locationn', $this->image_locationn);
        $stmt->bindParam(':information_locationn', $this->information_locationn);
        $stmt->bindParam(':type_locationn', $this->type_locationn);
        $stmt->bindParam(':map_locationn', $this->map_locationn);
        $stmt->bindParam(':evaluate_locationn', $this->evaluate_locationn);
        $stmt->bindParam(':price_locationn', $this->price_locationn);
        $stmt->bindParam(':contact_locationn', $this->contact_locationn);
        $stmt->bindParam(':open_locationn', $this->open_locationn);
        $stmt->bindParam(':close_locationn', $this->close_locationn);
        $stmt->bindParam(':utilities_locationn', $this->utilities_locationn);
        $stmt->bindParam(':verified_locationn', $this->verified_locationn);
        $stmt->bindParam(':outstand_locationn', $this->outstand_locationn);
        $stmt->bindParam(':update_locationn', $this->update_locationn);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Update pet details
    public function update() {
        $query = "UPDATE locationn SET name_locationn=:name_locationn, address_locationn=:address_locationn, image_locationn=:image_locationn, information_locationn=:information_locationn,
         type_locationn=:type_locationn, map_locationn=:map_locationn, evaluate_locationn=:evaluate_locationn, price_locationn=:price_locationn, contact_locationn=:contact_locationn,
         open_locationn=:open_locationn, close_locationn=:close_locationn, utilities_locationn=:utilities_locationn,
         verified_locationn=:verified_locationn, outstand_locationn=:outstand_locationn, update_locationn=:update_locationn 
         WHERE id_locationn = :id_locationn";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_locationn = htmlspecialchars(strip_tags($this->id_locationn));
        $this->name_locationn = htmlspecialchars(strip_tags($this->name_locationn));
        $this->address_locationn = htmlspecialchars(strip_tags($this->address_locationn));
        $this->image_locationn = htmlspecialchars(strip_tags($this->image_locationn));
        $this->information_locationn = htmlspecialchars(strip_tags($this->information_locationn));
        $this->type_locationn = htmlspecialchars(strip_tags($this->type_locationn));
        $this->map_locationn = htmlspecialchars(strip_tags($this->map_locationn));
        $this->evaluate_locationn = htmlspecialchars(strip_tags($this->evaluate_locationn));
        $this->price_locationn = htmlspecialchars(strip_tags($this->price_locationn));
        $this->contact_locationn = htmlspecialchars(strip_tags($this->contact_locationn));
        $this->open_locationn = htmlspecialchars(strip_tags($this->open_locationn));
        $this->close_locationn = htmlspecialchars(strip_tags($this->close_locationn));
        $this->utilities_locationn	 = htmlspecialchars(strip_tags($this->utilities_locationn));
        $this->verified_locationn = htmlspecialchars(strip_tags($this->verified_locationn));
        $this->outstand_locationn = htmlspecialchars(strip_tags($this->outstand_locationn));
        $this->update_locationn = htmlspecialchars(strip_tags($this->update_locationn));



        // Bind dat
        $stmt->bindParam(':id_locationn', $this->id_locationn);
        $stmt->bindParam(':name_locationn', $this->name_locationn);
        $stmt->bindParam(':address_locationn', $this->address_locationn);
        $stmt->bindParam(':image_locationn', $this->image_locationn);
        $stmt->bindParam(':information_locationn', $this->information_locationn);
        $stmt->bindParam(':type_locationn', $this->type_locationn);
        $stmt->bindParam(':map_locationn', $this->map_locationn);   
        $stmt->bindParam(':evaluate_locationn', $this->evaluate_locationn);
        $stmt->bindParam(':price_locationn', $this->price_locationn);
        $stmt->bindParam(':contact_locationn', $this->contact_locationn);
        $stmt->bindParam(':open_locationn', $this->open_locationn);
        $stmt->bindParam(':close_locationn', $this->close_locationn);
        $stmt->bindParam(':utilities_locationn', $this->utilities_locationn);
        $stmt->bindParam(':verified_locationn', $this->verified_locationn);
        $stmt->bindParam(':outstand_locationn', $this->outstand_locationn);
        $stmt->bindParam(':update_locationn', $this->update_locationn);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Delete a pet
    public function delete() {
        $query = "DELETE FROM locationn WHERE id_locationn= :id_locationn";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_locationn = htmlspecialchars(strip_tags($this->id_locationn));

        // Bind data
        $stmt->bindParam(':id_locationn', $this->id_locationn);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
}

?>
