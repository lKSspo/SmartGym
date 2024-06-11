<?php
class Validation { /*Validações dos campos Nome, Email e senha*/
    public function validateRegister($name, $email, $password) {
        $errors = [];

        if (empty($name)) {
            $errors['name'] = "O nome é obrigatório.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "O e-mail é inválido.";
        }

        if (strlen($password) < 6) {
            $errors['password'] = "A senha deve ter pelo menos 6 caracteres.";
        }

        return $errors;
    }

    public function validateAdditional($height, $peso, $current_objective) {
        $errors = []; /*Validação do formulario adicional*/ 

        if (!is_numeric($height) || $height <= 0) {
            $errors['height'] = "A altura deve ser um número positivo.";
        }

        if (!is_numeric($peso) || $peso <= 0) {
            $errors['peso'] = "O peso deve ser um número positivo.";
        }

        if (empty($current_objective)) {
            $errors['current_objective'] = "O objetivo atual é obrigatório.";
        }

        return $errors;
    }
}
?>