<?php
/** @var PDO $db */

$id = (int) $_GET['id'];
$repo = new NoticiasRepository($db);
$noticia = $repo->getById($id);
?>
<section class="container-flex">
    <article class="noticias noticias-item">
        <div class="noticias-item_content">
            <h2><?= $noticia->getTitulo();?></h2>
            <p><?= $noticia->getSinopsis();?></p>
        </div>
        <picture class="noticias-item_imagen">
            <source srcset="<?= RUTA_CARPETA_IMAGENES . "/big-" . $noticia->getImagen();?>" media="all and (min-width: 46.875em)">
            <img src="<?= RUTA_CARPETA_IMAGENES . "/" . $noticia->getImagen();?>" alt="<?= $noticia->getImagenDescripcion();?>">
        </picture>
        <div class="noticias-item_texto">
            <?= $noticia->getTexto();?>
        </div>
    </article>
</section>
