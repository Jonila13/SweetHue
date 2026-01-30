<?php
class contact_messages {
    private $conn;
    private $table_name = 'contact_messages';

    public function __construct($db){
        $this->conn = $db;
    }

    public function register($Name, $Email, $Message): bool {
        $query = "INSERT INTO {$this->table_name} (Name, Email, Message)
                  VALUES (:Name, :Email, :Message)";
        $stmt = $this->conn->prepare($query);

        

        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Message', $Message);

        return $stmt->execute();
    }

    
}
?>
