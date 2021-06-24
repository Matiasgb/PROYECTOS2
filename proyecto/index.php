<?php
session_start();

/** @var RUTA_CARPETA_IMAGENES Ruta a la carpeta de las imágenes. */
const RUTA_CARPETA_IMAGENES = 'imgs';


require_once __DIR__ . '/bootstrap/autoload.php';
require_once __DIR__ . '/bootstrap/conexion.php';


require __DIR__ . '/rutas/secciones.php';


$secciones = getSeccionesLista();


$seccionActual = $_GET['s'] ?? 'home';


if(!isset($secciones[$seccionActual])) {
    $seccionActual = '404';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saraza Basket :: <?= $secciones[$seccionActual]['title'];?></title>
    <link rel="stylesheet" href="css/estilos-v2.css">
</head>
<body>
    <header id="main-header">
        <h1>Saraza Basket</h1>
        <p>Enterate de todas las novedades sobre la NBA</p>
    </header>
    <nav id="main-nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?s=noticias">Noticias</a></li>
            <li><a href="index.php?s=noticias-nueva">Crear noticia</a></li>
            <li><a href="index.php?s=contacto">Contacto</a></li>
        </ul>
    </nav>
    <main class="main-content">
    <?php
        require __DIR__ . "/secciones/" . $seccionActual . ".php";
    ?>
    </main>
    <footer id="main-footer">
        <p>&copy; Garcia Brunelli - 2021</p>
    </footer>
</body>
</html>
