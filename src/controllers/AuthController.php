<?php
    session_start();
    require_once '../config.php';
    require_once '../models/User.php';

    class AuthController {
        private $userModel;

        public function __construct($connection) {
            $this -> userModel = new User($connection);
        }

        public function register() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                if ($this -> userModel -> create($name, $email, $password)) {
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
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

                $user = $this -> userModel -> find($email, $password);

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
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            header("Location: ../views/login.php");
            exit();
        }
    }

    $authController = new AuthController($connection);

    if (isset($_POST['submit']) && $_POST['submit'] == 'register') {
        $authController -> register();
    }

    if (isset($_POST['submit']) && $_POST['submit'] == 'login') {
        $authController -> login();
    }

    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        $authController -> logout();
    }

?>
