<?php
session_start();
require_once '../config.php';
require_once '../models/User.php';

class AuthController {
    private $userModel;

    public function __construct($connection) {
        $this->userModel = new User($connection);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Armazene esses dados na sessão
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            // Redirecione para a próxima etapa
            header("Location: ../views/pages-additional/additional.php");
            exit();
        }
    }

    public function registerAdditional() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recupere os dados da sessão
            $name = $_SESSION['name'];
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];

            // Coleta os dados do segundo formulário
            $height = $_POST['height'];
            $peso = $_POST['peso'];
            $current_objective = $_POST['current_objective'];

            // Crie o usuário com todos os dados
            if ($this->userModel->create($name, $email, $password, $height, $peso, $current_objective)) {
                // Limpe os dados da sessão
                session_unset();
                session_destroy();

                header("Location: ../views/account.php");
                exit();
            } else {
                echo "Erro ao cadastrar usuário!";
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->find($email, $password);

            if ($user) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                header("Location: ../views/account.php");
                exit();
            } else {
                echo "<script>
                        alert('Cadastro não encontrado');
                        window.location.href = '../views/login.php';
                      </script>";
            }
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: ../views/login.php");
        exit();
    }
}

$authController = new AuthController($connection);

if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'register') {
        $authController->register();
    } else if ($_POST['submit'] == 'register-additional') {
        $authController->registerAdditional();
    } else if ($_POST['submit'] == 'login') {
        $authController->login();
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $authController->logout();
}
?>