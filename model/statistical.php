<?php
class statistical {
    private $conn;

    public $id_statistical;
    public $number_user_statistical;
    public $number_locationn_statistical;
    public $number_review_statistical;
    public $number_responses_statistical;
    public $time_statistical;
    public $index_statistical;
    public $popular_statistical;
    public $activity_statistical;
    public $date_statistical;
    

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Read all favourites
    public function read() {
        $query = "SELECT * FROM statistical ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Show a single favourites
    public function show() {
        $query = "SELECT * FROM statistical WHERE id_statistical=? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_statistical);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->number_user_statistical = $row['number_user_statistical   '];
        $this->number_locationn_statistical = $row['number_locationn_statistical'];
        $this->number_review_statistical = $row['number_review_statistical'];
        $this->number_responses_statistical = $row['number_responses_statistical'];
        $this->time_statistical = $row['time_statistical'];
        $this->index_statistical = $row['index_statistical'];
        $this->popular_statistical = $row['popular_statistical'];
        $this->activity_statistical = $row['activity_statistical'];
        $this->date_statistical = $row['date_statistical'];
        

    }

// Create (Insert) a new pet
    public function create() {
        $query = "INSERT INTO statistical SET id_statistical=:id_statistical  
        ,number_user_statistical=:number_user_statistical,
         number_locationn_statistical=:number_locationn_statistical,
         number_review_statistical=:number_review_statistical,
         number_responses_statistical=:number_responses_statistical,
         time_statistical =:time_statistical, index_statistical=:index_statistical,
         popular_statistical=:popular_statistical,
         activity_statistical =:activity_statistical, 
         date_statistical =:date_statistical";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_statistical=htmlspecialchars(strip_tags($this->id_statistical ));
        $this->number_user_statistical = htmlspecialchars(strip_tags($this->number_user_statistical));
        $this->number_locationn_statistical = htmlspecialchars(strip_tags($this->number_locationn_statistical));
        $this->number_review_statistical = htmlspecialchars(strip_tags($this->number_review_statistical));
        $this->number_responses_statistical = htmlspecialchars(strip_tags($this->number_responses_statistical));
        $this->time_statistical = htmlspecialchars(strip_tags($this->time_statistical));
        $this->index_statistical = htmlspecialchars(strip_tags($this->index_statistical));
        $this->popular_statistical = htmlspecialchars(strip_tags($this->popular_statistical));
        $this->activity_statistical = htmlspecialchars(strip_tags($this->activity_statistical));
        $this->date_statistical = htmlspecialchars(strip_tags($this->date_statistical));


        // Bind data
        $stmt->bindParam(':id_statistical', $this->id_statistical);
        $stmt->bindParam(':number_user_statistical', $this->number_user_statistical);
        $stmt->bindParam(':number_locationn_statistical', $this->number_locationn_statistical);
        $stmt->bindParam(':number_review_statistical', $this->number_review_statistical);
        $stmt->bindParam(':number_responses_statistical', $this->number_responses_statistical);
        $stmt->bindParam(':time_statistical', $this->time_statistical);
        $stmt->bindParam(':index_statistical', $this->index_statistical);   
        $stmt->bindParam(':popular_statistical', $this->popular_statistical);
        $stmt->bindParam(':activity_statistical', $this->activity_statistical);
        $stmt->bindParam(':date_statistical', $this->date_statistical);
        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Update pet details
    public function update() {
        $query = "UPDATE statistical SET number_user_statistical=:number_user_statistical, number_locationn_statistical=:number_locationn_statistical, number_review_statistical=:number_review_statistical, number_responses_statistical=:number_responses_statistical,
         time_statistical=:time_statistical, index_statistical=:index_statistical, popular_statistical=:popular_statistical, activity_statistical=:activity_statistical,
         date_statistical=:date_statistical
         WHERE id_statistical=:id_statistical ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_statistical = htmlspecialchars(strip_tags($this->id_statistical));
        $this->number_user_statistical = htmlspecialchars(strip_tags($this->number_user_statistical));
        $this->number_locationn_statistical = htmlspecialchars(strip_tags($this->number_locationn_statistical));
        $this->number_review_statistical = htmlspecialchars(strip_tags($this->number_review_statistical));
        $this->number_responses_statistical = htmlspecialchars(strip_tags($this->number_responses_statistical));
        $this->time_statistical = htmlspecialchars(strip_tags($this->time_statistical));
        $this->index_statistical = htmlspecialchars(strip_tags($this->index_statistical));
        $this->popular_statistical = htmlspecialchars(strip_tags($this->popular_statistical));
        $this->activity_statistical = htmlspecialchars(strip_tags($this->activity_statistical));
        $this->date_statistical = htmlspecialchars(strip_tags($this->date_statistical));


        // Bind dat
        $stmt->bindParam(':id_statistical', $this->id_statistical);
        $stmt->bindParam(':number_user_statistical', $this->number_user_statistical);
        $stmt->bindParam(':number_locationn_statistical', $this->number_locationn_statistical);
        $stmt->bindParam(':number_review_statistical', $this->number_review_statistical);
        $stmt->bindParam(':number_responses_statistical', $this->number_responses_statistical);
        $stmt->bindParam(':time_statistical', $this->time_statistical);
        $stmt->bindParam(':index_statistical', $this->index_statistical);   
        $stmt->bindParam(':popular_statistical', $this->popular_statistical);
        $stmt->bindParam(':activity_statistical', $this->activity_statistical);
        $stmt->bindParam(':date_statistical', $this->date_statistical);
       

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Delete a pet
    public function delete() {
        $query = "DELETE FROM statistical WHERE id_statistical=:id_statistical ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_statistical = htmlspecialchars(strip_tags($this->id_statistical));

        // Bind data
        $stmt->bindParam(':id_statistical', $this->id_statistical);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
}

?>
