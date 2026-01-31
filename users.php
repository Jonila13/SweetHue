<?php
class Users {
    private $conn;
    private $table_name = 'users';

    public function __construct($db){
        $this->conn = $db;
    }

    public function register($Username, $Email, $Password): bool {
        $query = "INSERT INTO {$this->table_name} (Username, Email, Password)
                  VALUES (:Username, :Email, :Password)";
        $stmt = $this->conn->prepare($query);

        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

        $stmt->bindParam(':Username', $Username);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Password', $hashedPassword);

        return $stmt->execute();
    }

    public function login($Email, $Password): bool {
        $query = "SELECT id, Username, Email, Password,role
                  FROM {$this->table_name}
                  WHERE Email = :Email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Email', $Email);
        $stmt->execute();

        if($stmt->rowCount() === 1){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($Password, $row['Password'])){
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['Email'] = $row['Email'];
                $_SESSION['role'] = $row['role'];
                return true;
            }
        }
        return false;
    }
}
?>
