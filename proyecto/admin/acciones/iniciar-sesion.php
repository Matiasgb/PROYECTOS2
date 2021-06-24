<?php
/*

*/
session_start();

/** @var PDO $db */
require_once __DIR__ . '/../../bootstrap/autoload.php';
require_once __DIR__ . '/../../bootstrap/conexion.php';

// Capturamos los datos del form.
$email      = $_POST['email'];
$password   = $_POST['password'];




$auth = new Autenticacion($db);
$exito = $auth->login($email, $password);

if($exito) {
    $_SESSION['status_exito'] = "Sesión iniciada exitosamente.";
    header("Location: ../index.php?s=home");
} else {
    $_SESSION['status_error'] = "Las credenciales ingresadas no coinciden con ningún registro.";
    $_SESSION['oldData'] = $_POST;
    header("Location: ../index.php?s=login");
}
