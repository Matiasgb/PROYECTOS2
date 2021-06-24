<?php
// Deslogueamos al usuario.
session_start();
/** @var PDO $db */
require_once __DIR__ . '/../../bootstrap/autoload.php';
require_once __DIR__ . '/../../bootstrap/conexion.php';

$auth = new Autenticacion($db);
$auth->logout();

$_SESSION['status_exito'] = "La sesión se cerró correctamente. ¡Te esperamos pronto!";
header('Location: ../index.php?s=login');
