<?php
class user {
    private $conn;

    public $id_user;
    public $phone_user;
    public $name_user;
    public $password_user;
    public $email_user;
    public $avata_user;
    public $address_user;
    public $hobbi_user;
    public $gender_user;
    public $status_user;
    public $data_create_user;
    public $data_update_user;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Read all pets
    public function read() {
        $query = "SELECT * FROM user ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Show a single pet
    public function show() {
        $query = "SELECT * FROM user WHERE id_user = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->user_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->phone_user = $row['phone_user'];
        $this->name_user = $row['name_user'];
        $this->password_user = $row['password_user'];
        $this->email_user = $row['email_user'];
        $this->avata_user = $row['avata_user'];
        $this->address_user = $row['address_user'];
        $this->hobbi_user = $row['hobbi_user'];
        $this->gender_user = $row['gender_user'];
        $this->status_user = $row['status_user'];
        $this->data_create_user = $row['data_create_user'];
        $this->data_update_user = $row['data_update_user'];

    }

    // Create (Insert) a new pet
    public function create() {
        $query = "INSERT INTO user SET id_user=:id_user, phone_user=:phone_user, name_user=:name_user, password_user=:password_user, email_user=:email_user, avata_user =:avata_user, address_user=:address_user, hobbi_user=:hobbi_user, gender_user =:gender_user,status_user =:status_user,data_create_user =:data_create_user,data_update_user =:data_update_user ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->phone_user = htmlspecialchars(strip_tags($this->phone_user));
        $this->name_user = htmlspecialchars(strip_tags($this->name_user));
        $this->password_user = htmlspecialchars(strip_tags($this->password_user));
        $this->email_user = htmlspecialchars(strip_tags($this->email_user));
        $this->avata_user = htmlspecialchars(strip_tags($this->avata_user));
        $this->address_user = htmlspecialchars(strip_tags($this->address_user));
        $this->hobbi_user = htmlspecialchars(strip_tags($his->hobbi_user));
        $this->gender_user = htmlspecialchars(strip_tags($this->gender_user));
        $this->status_user = htmlspecialchars(strip_tags($this->status_user));
        $this->data_create_user = htmlspecialchars(strip_tags($this->data_create_user));
        $this->data_update_user = htmlspecialchars(strip_tags($this->data_update_user));


        // Bind data
         $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':phone_user', $this->phone_user);
        $stmt->bindParam(':name_user', $this->name_user);
        $stmt->bindParam(':password_user', $this->password_user);
        $stmt->bindParam(':email_user', $this->email_user);
        $stmt->bindParam(':avata_user', $this->avata_user);
        $stmt->bindParam(':address_user', $this->address_user);
        $stmt->bindParam(':hobbi_user', $this->hobbi_user);
        $stmt->bindParam(':gender_user', $this->gender_user);
        $stmt->bindParam(':status_user', $this->status_user);
        $stmt->bindParam(':data_create_user', $this->data_create_user);
        $stmt->bindParam(':data_update_user', $this->data_update_user);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Update pet details
    public function update() {
        $query = "UPDATE user SET phone_user=:phone_user, name_user=:name_user, password_user=:password_user, email_user=:email_user, avata_user=:avata_user, address_user=:address_user, hobbi_user=:hobbi_user, gender_user=:gender_user, status_user=:status_user, data_create_user=:data_create_user, data_update_user=:data_update_user 
         WHERE id_user= :id_user ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->phone_user = htmlspecialchars(strip_tags($this->phone_user));
        $this->name_user = htmlspecialchars(strip_tags($this->name_user));
        $this->password_user = htmlspecialchars(strip_tags($this->password_user));
        $this->email_user = htmlspecialchars(strip_tags($this->email_user));
        $this->avata_user = htmlspecialchars(strip_tags($this->avata_user));
        $this->address_user = htmlspecialchars(strip_tags($this->address_user));
        $this->hobbi_user = htmlspecialchars(strip_tags($this->hobbi_user));
        $this->gender_user = htmlspecialchars(strip_tags($this->gender_user));
        $this->status_user = htmlspecialchars(strip_tags($this->status_user));
        $this->data_create_user = htmlspecialchars(strip_tags($this->data_create_user));
        $this->data_update_user = htmlspecialchars(strip_tags($this->data_update_user));


        // Bind dat
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':phone_user', $this->phone_user);
        $stmt->bindParam(':name_user', $this->name_user);
        $stmt->bindParam(':password_user', $this->password_user);
        $stmt->bindParam(':email_user', $this->email_user);
        $stmt->bindParam(':avata_user', $this->avata_user);
        $stmt->bindParam(':address_user', $this->address_user);   
        $stmt->bindParam(':hobbi_user', $this->hobbi_user);
        $stmt->bindParam(':gender_user', $this->gender_user);
        $stmt->bindParam(':status_user', $this->status_user);
        $stmt->bindParam(':data_create_user', $this->data_create_user);
        $stmt->bindParam(':data_update_user', $this->data_update_user);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Delete a pet
    public function delete() {
        $query = "DELETE FROM user WHERE id_user= :id_user";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));

        // Bind data
        $stmt->bindParam(':id_user', $this->id_user);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
}

?>
