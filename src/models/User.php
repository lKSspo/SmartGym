<?php
class User {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function create($name, $email, $password, $height, $peso, $current_objective) {
        $stmt = $this->connection->prepare("INSERT INTO users (name, email, password, height, peso, current_objective) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdds", $name, $email, $password, $height, $peso, $current_objective); // s = string, d = double
        return $stmt->execute();
    }

    public function find($email, $password) {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>