<?php 
/*Iniciando sessão*/ 
session_start();

/*linkando os arquivos externos*/ 
require_once '../config.php'; /**/ 
require_once '../models/User.php';/**/
require_once '../helpers/Validation.php';

class AuthController {
    private $userModel;
    private $validation;

    public function __construct($connection) {
        $this->userModel = new User($connection);
        $this->validation = new Validation();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
    
            // Verifica se o email já está em uso
            $existingUser = $this->userModel->findByEmail($email);
            if ($existingUser) {
                // Email já está em uso, adiciona erro na sessão
                $_SESSION['errors']['email'] = "O email fornecido já está em uso.";
                header("Location: ../views/register.php");
                exit();
            }
    
            // Outras validações
            $errors = $this->validation->validateRegister($name, $email, $password);
    
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: ../views/register.php");
                exit();
            }
    
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
    
            header("Location: ../views/pages-additional/additional.php");
            exit();
        }
    }

    public function registerAdditional() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_SESSION['name'];
            $email = $_SESSION['email'];
            $password = password_hash($_SESSION['password'], PASSWORD_BCRYPT); // Hash the password

            $height = $_POST['height'];
            $peso = $_POST['peso'];
            $current_objective = $_POST['current_objective'];

            $errors = $this->validation->validateAdditional($height, $peso, $current_objective);

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: ../views/register.php?error=register_additional");
                exit();
            }

            if ($this->userModel->create($name, $email, $password, $height, $peso, $current_objective)) {
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
            
            $user = $this->userModel->findByEmail($email);
    
            if ($user && password_verify($password, $user['password'])) {
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