<?php

class Reviews {

    private $conn;
    private $table_name = "reviews";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addReview($stars, $feedback) {

        $query = "INSERT INTO " . $this->table_name . " (stars, feedback)
                  VALUES (:stars, :feedback)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":stars", $stars, PDO::PARAM_INT);
        $stmt->bindParam(":feedback", $feedback, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getReviews() {

        $query = "SELECT stars, feedback, created_at
                  FROM " . $this->table_name . "
                  ORDER BY created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}