<?php
    class User {
        private $connection;

        public function __construct($connection) {
            $this -> connection = $connection;
        }

        public function create($name, $email, $password, $height, $peso, $current_objective) {
            $result = $this -> connection -> prepare("INSERT INTO users (name, email, password, height, peso, current_objective ) VALUES ('$name','$email', '$password', $height, $peso, $current_objective)");
            return $result -> execute();
        }

        public function find($email, $password) {
            $result = $this -> connection -> prepare("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
            $result -> execute();
            return $result -> get_result() -> fetch_assoc();
        }
    }
?>
