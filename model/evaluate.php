<?php
class evaluate {
    private $conn;

    public $id_evaluate ;
    public $id_user ;
    public $id_location ;
    public $point_evaluate;
    public $content_evaluate;
    public $image_evaluate;
    public $likes_evaluate;
    public $feedback_evaluate;
    public $useful_evaluate;
    public $reported_evaluate;
    public $reporting_evaluate;
    public $censorship_status_evaluate;
    public $Update_evaluate;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Read all pets
    public function read() {
        $query = "SELECT * FROM evaluate ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Show a single pet
    public function show() {
        $query = "SELECT * FROM evaluate WHERE id_evaluate  = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_evaluate);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id_user = $row['id_user '];
        $this->id_location  = $row['id_location '];
        $this->point_evaluate = $row['point_evaluate'];
        $this->content_evaluate = $row['content_evaluate'];
        $this->image_evaluate = $row['image_evaluate'];
        $this->likes_evaluate = $row['likes_evaluate'];
        $this->feedback_evaluate = $row['feedback_evaluate'];
        $this->useful_evaluate = $row['useful_evaluate'];
        $this->reported_evaluate = $row['reported_evaluate'];
        $this->reporting_evaluate = $row['reporting_evaluate'];
        $this->censorship_status_evaluate = $row['censorship_status_evaluate'];
        $this->Update_evaluate = $row['Update_evaluate'];


    }

    // Create (Insert) a new pet
    public function create() {
        $query = "INSERT INTO evaluate SET id_evaluate=:id_evaluate ,id_user=:id_user, id_location =:id_location, point_evaluate=:point_evaluate, content_evaluate=:content_evaluate, image_evaluate =:image_evaluate, likes_evaluate=:likes_evaluate, feedback_evaluate=:feedback_evaluate, useful_evaluate =:useful_evaluate,reported_evaluate =:reported_evaluate,reporting_evaluate =:reporting_evaluate, censorship_status_evaluate =:censorship_status_evaluate, Update_evaluate =:Update_evaluate ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_evaluate = htmlspecialchars(strip_tags($this->id_evaluate ));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user ));
        $this->id_location  = htmlspecialchars(strip_tags($this->id_location ));
        $this->point_evaluate = htmlspecialchars(strip_tags($this->point_evaluate));
        $this->content_evaluate = htmlspecialchars(strip_tags($this->content_evaluate));
        $this->image_evaluate = htmlspecialchars(strip_tags($this->image_evaluate));
        $this->likes_evaluate = htmlspecialchars(strip_tags($this->likes_evaluate));
        $this->feedback_evaluate = htmlspecialchars(strip_tags($this->feedback_evaluate));
        $this->useful_evaluate = htmlspecialchars(strip_tags($this->useful_evaluate));
        $this->reported_evaluate = htmlspecialchars(strip_tags($this->reported_evaluate));
        $this->reporting_evaluate = htmlspecialchars(strip_tags($this->reporting_evaluate));
        $this->censorship_status_evaluate = htmlspecialchars(strip_tags($this->censorship_status_evaluate));
        $this->Update_evaluate = htmlspecialchars(strip_tags($this->Update_evaluate));


        // Bind data
        $stmt->bindParam(':id_evaluate', $this->id_evaluate);
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':id_location', $this->id_location );
        $stmt->bindParam(':point_evaluate', $this->point_evaluate);
        $stmt->bindParam(':content_evaluate', $this->content_evaluate);
        $stmt->bindParam(':image_evaluate', $this->image_evaluate);
        $stmt->bindParam(':likes_evaluate', $this->likes_evaluate);
        $stmt->bindParam(':feedback_evaluate', $this->feedback_evaluate);
        $stmt->bindParam(':useful_evaluate', $this->useful_evaluate);
        $stmt->bindParam(':reported_evaluate', $this->reported_evaluate);
        $stmt->bindParam(':reporting_evaluate', $this->reporting_evaluate);
        $stmt->bindParam(':censorship_status_evaluate', $this->censorship_status_evaluate);
        $stmt->bindParam(':Update_evaluate', $this->Update_evaluate);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Update pet details
    public function update() {
        $query = "UPDATE evaluate SET id_user=:id_user, id_location =:id_location, point_evaluate=:point_evaluate, content_evaluate=:content_evaluate, image_evaluate =:image_evaluate, likes_evaluate=:likes_evaluate, feedback_evaluate=:feedback_evaluate, useful_evaluate =:useful_evaluate,reported_evaluate =:reported_evaluate,
        reporting_evaluate =:reporting_evaluate, censorship_status_evaluate =:censorship_status_evaluate, Update_evaluate =:Update_evaluate 
         WHERE id_evaluate  = :id_evaluate";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_evaluate = htmlspecialchars(strip_tags($this->id_evaluate ));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user ));
        $this->id_location  = htmlspecialchars(strip_tags($this->id_location ));
        $this->point_evaluate = htmlspecialchars(strip_tags($this->point_evaluate));
        $this->content_evaluate = htmlspecialchars(strip_tags($this->content_evaluate));
        $this->image_evaluate = htmlspecialchars(strip_tags($this->image_evaluate));
        $this->likes_evaluate = htmlspecialchars(strip_tags($this->likes_evaluate));
        $this->feedback_evaluate = htmlspecialchars(strip_tags($this->feedback_evaluate));
        $this->useful_evaluate = htmlspecialchars(strip_tags($this->useful_evaluate));
        $this->reported_evaluate = htmlspecialchars(strip_tags($this->reported_evaluate));
        $this->reporting_evaluate = htmlspecialchars(strip_tags($this->reporting_evaluate));
        $this->censorship_status_evaluate = htmlspecialchars(strip_tags($this->censorship_status_evaluate));
        $this->Update_evaluate = htmlspecialchars(strip_tags($this->Update_evaluate));


        // Bind data
        $stmt->bindParam(':id_evaluate', $this->id_evaluate);
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':id_location', $this->id_location);
        $stmt->bindParam(':point_evaluate', $this->point_evaluate);
        $stmt->bindParam(':content_evaluate', $this->content_evaluate);
        $stmt->bindParam(':image_evaluate', $this->image_evaluate);
        $stmt->bindParam(':likes_evaluate', $this->likes_evaluate);
        $stmt->bindParam(':feedback_evaluate', $this->feedback_evaluate);
        $stmt->bindParam(':useful_evaluate', $this->useful_evaluate);
        $stmt->bindParam(':reported_evaluate', $this->reported_evaluate);
        $stmt->bindParam(':reporting_evaluate', $this->reporting_evaluate);
        $stmt->bindParam(':censorship_status_evaluate', $this->censorship_status_evaluate);
        $stmt->bindParam(':Update_evaluate', $this->Update_evaluate);


        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Delete a pet
    public function delete() {
        $query = "DELETE FROM evaluate WHERE id_evaluate  = :id_evaluate ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_evaluate = htmlspecialchars(strip_tags($this->id_evaluate));

        // Bind data
        $stmt->bindParam(':id_evaluate', $this->id_evaluate);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
}

?>


