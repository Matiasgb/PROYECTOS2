<?php
/** @var PDO $db La conexión a la base*/

$repo = new NoticiasRepository($db);
$noticias = $repo->getAll();
?>
<div class="container-flex">
    <section class="noticias">
        <div>
            <h2>Noticias</h2>
            <p class="lead">Qué está pasando.</p>
        </div>
        <div class="noticias-list">
    <?php
    foreach($noticias as $noticia):
    ?>
      
        <a href="index.php?s=noticias-leer&id=<?= $noticia->getNoticiaId();?>" class="noticias-link">
            <article class="noticias-item">
                <div class="noticias-item_content">
                    <h3><?= $noticia->getTitulo();?></h3>
                    <p><?= $noticia->getSinopsis();?></p>
                </div>
                <picture class="noticias-item_imagen">
                    <source srcset="<?= RUTA_CARPETA_IMAGENES . "/big-" . $noticia->getImagen();?>" media="all and (min-width: 46.875em)">
                    <img src="<?= RUTA_CARPETA_IMAGENES . "/" . $noticia->getImagen();?>" alt="<?= $noticia->getImagenDescripcion();?>">
                </picture>
            </article>
        </a>
    <?php
    endforeach;
    ?>
        </div>
    </section>
</div>
