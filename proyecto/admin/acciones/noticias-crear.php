<?php

session_start();


/** @var PDO $db */
require_once __DIR__ . '/../../bootstrap/autoload.php';
require_once __DIR__ . '/../../bootstrap/conexion.php';
require_once __DIR__ . '/../../funciones/archivos.php';


$auth = new Autenticacion($db);
if(!$auth->estaAutenticado()) {
    $_SESSION['status_error'] = "Tenés que iniciar sesión para poder realizar esta acción.";
    header('Location: ../index.php?s=login');
    exit;
}

// 1. Capturamos los datos.
$seccion_id         = $_POST['seccion_id'];
$titulo             = $_POST['titulo'];
$texto              = $_POST['texto'];
$sinopsis           = $_POST['sinopsis'];
$etiquetas          = $_POST['etiquetas'] ?? []; 
$imagen_descripcion = $_POST['imagen_descripcion'];
$imagen             = $_FILES['imagen']; 

// Validación
$validador = new ValidadorNoticia($_POST);

if($validador->falla()) {
    
    $_SESSION['errores'] = $validador->getErrores();
  
    $_SESSION['oldData'] = $_POST;
   
    header('Location: ../index.php?s=noticias-nueva');
    exit;
}


$nombreImagen = subirArchivo($imagen, __DIR__ . "/../../imgs");


$repo = new NoticiasRepository($db);
$exito = $repo->create([
    'seccion_id'            => $seccion_id,
    'titulo'                => $titulo,
    'sinopsis'              => $sinopsis,
    'texto'                 => $texto,
    'imagen_descripcion'    => $imagen_descripcion,
    'imagen'                => $nombreImagen,
    'etiquetas'             => $etiquetas,
    'usuario_id'            => 1, 
]);


if($exito) {
    $_SESSION['status_exito'] = '¡La noticia <b>' . $titulo . '</b> fue publicada con éxito!';
    header("Location: ./../index.php?s=noticias");
    exit;
} else {
    $_SESSION['status_error'] = 'Ocurrió un error inesperado al tratar de publicar la noticia. Por favor, probá de nuevo más tarde.';
   
    header("Location: ./../index.php?s=noticias-nueva");
    exit;
}
