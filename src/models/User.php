<?php
class User {
    private $connection;

    // função para criar conexão com o banco de dados
    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function create($name, $email, $password, $height, $peso, $current_objective) {

        // stmt = abreviação para "statement" (declaração ou comando) em programação de banco de dados, no nosso caso seria declaração SQL preparada.
        $stmt = $this->connection->prepare("INSERT INTO users (name, email, password, height, peso, current_objective) VALUES (?, ?, ?, ?, ?, ?)"); // Prepara uma declaração SQL para inserção de dados

        $stmt->bind_param("sssdds", $name, $email, $password, $height, $peso, $current_objective); // s = string, d = double

        return $stmt->execute();  // Executa a declaração preparada
    }

    public function findByEmail($email) { /*Função para referenciar a busca de um email existente*/ 
        
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = ?"); // Prepara uma declaração SQL para seleção de dados

        $stmt->bind_param("s", $email); // Associa o parâmetro da consulta com o valor fornecido

        $stmt->execute(); // Executa a declaração preparada

        return $stmt->get_result()->fetch_assoc(); // Obtém o resultado da execução
    }
}
?>