<?php

session_start();

/** @var PDO $db */
require_once __DIR__ . '/../../bootstrap/autoload.php';
require_once __DIR__ . '/../../bootstrap/conexion.php';


$auth = new Autenticacion($db);
if(!$auth->estaAutenticado()) {
    $_SESSION['status_error'] = "Tenés que iniciar sesión para poder realizar esta acción.";
    header('Location: ../index.php?s=login');
    exit;
}


$id = $_POST['id'];


$repo = new NoticiasRepository($db);
$exito = $repo->delete($id);

if($exito) {
    $_SESSION['status_exito'] = "La noticia fue eliminada exitosamente.";
    header("Location: ./../index.php?s=noticias");
} else {
    $_SESSION['status_error'] = "Ocurrió un error inesperado al tratar de eliminar la noticia.";
    header("Location: ./../index.php?s=noticias");
}
