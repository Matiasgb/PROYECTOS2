<?php
/** @var PDO $db */

$repo = new NoticiasRepository($db);
$noticias = $repo->getAll();
?>
<section class="container-fixed content">
    <h1>Administración de noticias</h1>

    <a href="index.php?s=noticias-nueva">Crear nueva noticia</a>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Fecha</th>
            <th>Sinopsis</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
    <?php
    foreach($noticias as $noticia): ?>
        <tr>
            <td><?= $noticia->getNoticiaId();?></td>
            <td><?= $noticia->getTitulo();?></td>
            <td><?= $noticia->getFecha();?></td>
            <td><?= $noticia->getSinopsis();?></td>
            <td><img src="<?= RUTA_CARPETA_IMAGENES . '/' . $noticia->getImagen();?>" alt="<?= $noticia->getImagenDescripcion();?>"></td>
            <td>
                <a href="index.php?s=noticias-editar&id=<?= $noticia->getNoticiaId();?>">Editar</a>
                <form action="acciones/noticias-eliminar.php" method="post" class="form-eliminar" data-titulo="<?= $noticia->getTitulo();?>">
                  
                    <input type="hidden" name="id" value="<?= $noticia->getNoticiaId();?>">
                    <button type="submit" class="button">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php
    endforeach; ?>
        </tbody>
    </table>
</section>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('.form-eliminar');
    forms.forEach(elem => {
        elem.addEventListener('submit', function(ev) {
            const titulo = this.dataset.titulo;
            const confirmado = confirm(`¿Estás SEGURO/A que querés eliminar definitivamente la noticia '${titulo}'?`);
            if(!confirmado) {
                ev.preventDefault();
            }
        });
    });
});
</script>
