<?php

require_once __DIR__ . '/../funciones/noticias.php';

// 1. Capturamos los datos.
$titulo             = $_POST['titulo'];
$texto              = $_POST['texto'];
$sinopsis           = $_POST['sinopsis'];
$imagen_descripcion = $_POST['imagen_descripcion'];


$exito = noticiaCreate([
    'titulo'                => $titulo,
    'sinopsis'              => $sinopsis,
    'texto'                 => $texto,
    'imagen_descripcion'    => $imagen_descripcion,
    'imagen'                => 'manu.jpg',
]);


if($exito) {
   
    header("Location: ./../index.php?s=noticias");
  
    exit;
} else {

    header("Location: ./../index.php?s=noticias-nueva");
    exit;
}
