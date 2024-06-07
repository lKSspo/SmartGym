<?php
// Incluir a configuração do banco de dados
include_once 'config.php'; // Supondo que você tenha um arquivo config.php que faça a conexão com o banco de dados

class Training {
    private $connection;

    // função para criar conexão com o banco de dados
    public function __construct($connection) {
        $this->connection = $connection;
    }

    // função que busca as informações de exercicios, repetições e ganho de massa do db
    public function findAll() {
        $sql = "SELECT * FROM training";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return null;
        }
    }
}

$training = new Training($connection);
$data = $training->findAll();

// Retornar os dados como JSON
header('Content-Type: application/json');
echo json_encode($data);

?>