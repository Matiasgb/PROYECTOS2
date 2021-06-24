<?php
session_start();

/** @var PDO $db */
/** @var RUTA_CARPETA_IMAGENES Ruta a la carpeta de las imágenes. */
const RUTA_CARPETA_IMAGENES = '../imgs';


require_once __DIR__ . '/../bootstrap/autoload.php';
require_once __DIR__ . '/../bootstrap/conexion.php';

$auth = new Autenticacion($db);


require __DIR__ . '/rutas/secciones.php';


$secciones = getSeccionesLista();


$seccionActual = $_GET['s'] ?? 'home';


if(!isset($secciones[$seccionActual])) {
    $seccionActual = '404';
}


$requiresAuth = $secciones[$seccionActual]['requiresAuth'] ?? false;
if($requiresAuth && !$auth->estaAutenticado()) {
    $_SESSION['status_error'] = "Tenés que iniciar sesión para poder acceder a esta sección.";
    header("Location: index.php?s=login");
    exit;
}


$statusExito = $_SESSION['status_exito'] ?? null;
$statusError = $_SESSION['status_error'] ?? null;
unset($_SESSION['status_exito'], $_SESSION['status_error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saraza Basket Panel :: <?= $secciones[$seccionActual]['title'];?></title>
    <link rel="stylesheet" href="../css/estilos-v2.css">
</head>
<body>
    <header id="main-header">
        <p class="logo">Saraza Basket</p>
        <p>Panel de administración</p>
    </header>
    <nav id="main-nav">
    <?php
    if($auth->estaAutenticado()): ?>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?s=noticias">Noticias</a></li>
            <li><a href="acciones/cerrar-sesion.php">Cerrar Sesión</a></li>
        </ul>
    <?php
    endif; ?>
    </nav>
    <main class="main-content">
    <?php
    if($statusExito):
    ?>
        <div class="msg-success"><?= $statusExito;?></div>
    <?php
    endif;
    ?>
    <?php
    if($statusError):
    ?>
        <div class="msg-error"><?= $statusError;?></div>
    <?php
    endif;
    ?>

    <?php
        require __DIR__ . "/secciones/" . $seccionActual . ".php";
    ?>
    </main>
    <footer id="main-footer">
        <p>&copy; Da Vinci - 2021</p>
    </footer>
</body>
</html>
