<?php
class voice {
    private $conn;

    public $id_voice   ;
    public $id_user ;
    public $content_voice;
    public $file_voice;
    public $transcription_voice;
    public $result_voice;
    public $odertype_voice;
    public $reliability_voice;
    public $language_voice;
    public $imformation_voice;
    public $date_voice;
 
 
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Read all favourites
    public function read() {
        $query = "SELECT * FROM voice ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Show a single favourites
    public function show() {
        $query = "SELECT * FROM voice WHERE id_voice = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_voice );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id_user = $row['id_user '];
        $this->content_voice = $row['content_voice'];
        $this->file_voice = $row['file_voice'];
        $this->transcription_voice = $row['transcription_voice'];
        $this->result_voice = $row['result_voice'];
        $this->odertype_voice = $row['odertype_voice'];
        $this->reliability_voice = $row['reliability_voice'];
        $this->language_voice = $row['language_voice'];
        $this->imformation_voice = $row['imformation_voice'];
        $this->date_voice = $row['date_voice'];

    }

// Create (Insert) a new pet
    public function create() {
        $query = "INSERT INTO voice SET id_voice=:id_voice, id_user=:id_user, content_voice=:content_voice,
         file_voice=:file_voice, transcription_voice=:transcription_voice, result_voice=:result_voice, odertype_voice=:odertype_voice,
        reliability_voice=:reliability_voice, language_voice =:language_voice,imformation_voice=:imformation_voice, date_voice=:date_voice ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_voice = htmlspecialchars(strip_tags($this->id_voice));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->content_voice = htmlspecialchars(strip_tags($this->content_voice));
        $this->file_voice = htmlspecialchars(strip_tags($this->file_voice));
        $this->transcription_voice = htmlspecialchars(strip_tags($this->transcription_voice));
        $this->result_voice = htmlspecialchars(strip_tags($this->result_voice));
        $this->odertype_voice = htmlspecialchars(strip_tags($this->odertype_voice));
        $this->reliability_voice = htmlspecialchars(strip_tags($this->reliability_voice));
        $this->language_voice = htmlspecialchars(strip_tags($this->language_voice));
        $this->imformation_voice = htmlspecialchars(strip_tags($this->imformation_voice));
        $this->date_voice = htmlspecialchars(strip_tags($this->date_voice));



        // Bind data
        $stmt->bindParam(':id_voice', $this->id_voice);
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':content_voice', $this->content_voice);
        $stmt->bindParam(':file_voice', $this->file_voice);
        $stmt->bindParam(':transcription_voice', $this->transcription_voice);
        $stmt->bindParam(':result_voice', $this->result_voice);
        $stmt->bindParam(':odertype_voice', $this->odertype_voice);
        $stmt->bindParam(':reliability_voice', $this->reliability_voice);
        $stmt->bindParam(':language_voice', $this->language_voice);
        $stmt->bindParam(':imformation_voice', $this->imformation_voice);
        $stmt->bindParam(':date_voice', $this->date_voice);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Update pet details
    public function update() {
        $query = "UPDATE voice SET id_user=:id_user, content_voice=:content_voice,
         file_voice=:file_voice, transcription_voice=:transcription_voice, result_voice=:result_voice, odertype_voice=:odertype_voice,
         reliability_voice=:reliability_voice, language_voice=:language_voice, imformation_voice=:imformation_voice, date_voice=:date_voice 
         WHERE id_voice=:id_voice  ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_voice = htmlspecialchars(strip_tags($this->id_voice));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->content_voice = htmlspecialchars(strip_tags($this->content_voice));
        $this->file_voice = htmlspecialchars(strip_tags($this->file_voice));
        $this->transcription_voice = htmlspecialchars(strip_tags($this->transcription_voice));
        $this->result_voice = htmlspecialchars(strip_tags($this->result_voice));
        $this->odertype_voice = htmlspecialchars(strip_tags($this->odertype_voice));
        $this->reliability_voice = htmlspecialchars(strip_tags($this->reliability_voice));
        $this->language_voice = htmlspecialchars(strip_tags($this->language_voice));
        $this->imformation_voice = htmlspecialchars(strip_tags($this->imformation_voice));
        $this->date_voice = htmlspecialchars(strip_tags($this->date_voice));



        // Bind dat
        $stmt->bindParam(':id_voice', $this->id_voice);
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':content_voice', $this->content_voice);
        $stmt->bindParam(':file_voice', $this->file_voice);
        $stmt->bindParam(':transcription_voice', $this->transcription_voice);
        $stmt->bindParam(':result_voice', $this->result_voice);
        $stmt->bindParam(':odertype_voice', $this->odertype_voice);   
        $stmt->bindParam(':reliability_voice', $this->reliability_voice);
        $stmt->bindParam(':language_voice', $this->language_voice);
        $stmt->bindParam(':imformation_voice', $this->imformation_voice);
        $stmt->bindParam(':date_voice', $this->date_voice);
    

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Delete a pet
    public function delete() {
        $query = "DELETE FROM voice WHERE id_voice=: id_voice ";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id_voice = htmlspecialchars(strip_tags($this->id_voice));

        // Bind data
        $stmt->bindParam(':id_voice', $this->id_voice);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }
}

?>
