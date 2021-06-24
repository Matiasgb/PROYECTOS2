<?php
/** @var PDO $db */
// Traemos las secciones para el select.
$seccionRepo = new SeccionesRepository($db);
$secciones = $seccionRepo->getAll();

$etiquetaRepo = new EtiquetasRepository($db);
$etiquetas = $etiquetaRepo->getAll();


$errores = $_SESSION['errores'] ?? [];
$oldData = $_SESSION['oldData'] ?? [
    'seccion_id' => null,
    'etiquetas' => [],
];


unset($_SESSION['errores'], $_SESSION['oldData']);
?>
<section class="container-flex content">
    <div>
        <h1>Crear nueva noticia</h1>
        <p>Completá el formulario con los datos de la noticia que querés publicar, y dale a "Publicar".</p>

 
     
        <form action="acciones/noticias-crear.php" method="post" enctype="multipart/form-data">
            <div class="form-fila">
                <label for="seccion_id">Sección</label>
                <select
                    id="seccion_id"
                    name="seccion_id"
                    class="form-control"
                    <?= isset($errores['seccion_id']) ? 'aria-describedby="error-seccion_id"' : '';?>
                >
                    <option value="">Elegí la sección</option>
                <?php
                foreach($secciones as $seccion): ?>
                    <option
                        value="<?= $seccion->getSeccionId()?>"
                        <?= ($oldData['seccion_id'] == $seccion->getSeccionId()) ? 'selected' : null;?>
                    ><?= $seccion->getNombre();?></option>
                <?php
                endforeach; ?>
                </select>
            <?php
            if(isset($errores['seccion_id'])): ?>
                <div id="error-seccion_id" class="msg-error"><?= $errores['seccion_id'];?></div>
            <?php
            endif; ?>
            </div>
            <div class="form-fila">
                <label for="titulo">Título</label>
          
                <input type="text" id="titulo" name="titulo" class="form-control" value="<?= $oldData['titulo'] ?? '';?>" <?= isset($errores['titulo']) ? 'aria-describedby="error-titulo"' : '';?>>
            <?php
        
            if(isset($errores['titulo'])): ?>
                <div id="error-titulo" class="msg-error"><?= $errores['titulo'];?></div>
            <?php
            endif; ?>
            </div>
            <div class="form-fila">
                <label for="sinopsis">Sinopsis</label>
                <textarea id="sinopsis" name="sinopsis" class="form-control" <?= isset($errores['sinopsis']) ? 'aria-describedby="error-sinopsis"' : '';?>><?= $oldData['sinopsis'] ?? '';?></textarea>
            <?php
            
            if(isset($errores['sinopsis'])): ?>
                <div id="error-sinopsis" class="msg-error"><?= $errores['sinopsis'];?></div>
            <?php
            endif; ?>
            </div>
            <div class="form-fila">
                <label for="texto">Texto de la noticia</label>
                <textarea id="texto" name="texto" class="form-control" <?= isset($errores['texto']) ? 'aria-describedby="error-texto"' : '';?>><?= $oldData['texto'] ?? '';?></textarea>
            <?php
            
            if(isset($errores['texto'])): ?>
                <div id="error-texto" class="msg-error"><?= $errores['texto'];?></div>
            <?php
            endif; ?>
            </div>
            <div class="form-fila">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" class="form-control" aria-describedby="help-imagen">
                <p id="help-imagen">La imagen debe ser JPG o PNG.</p>
            </div>
            <div class="form-fila">
                <label for="imagen_descripcion">Descripción de la imagen</label>
                <input type="text" id="imagen_descripcion" name="imagen_descripcion" class="form-control" value="<?= $oldData['imagen_descripcion'] ?? '';?>">
            </div>

            <fieldset>
                <legend>Etiquetas</legend>

            <?php
            foreach($etiquetas as $etiqueta): ?>
                <label>
                    <?php
                 
                    ?>
                    <input
                        type="checkbox"
                        name="etiquetas[]"
                        value="<?= $etiqueta->getEtiquetaId();?>"
                        <?= in_array($etiqueta->getEtiquetaId(), $oldData['etiquetas']) ? 'checked' : null;?>
                    >
                    <?= $etiqueta->getNombre();?>
                </label>
            <?php
            endforeach; ?>
            </fieldset>

            <button class="button" type="submit">Publicar</button>
        </form>
    </div>
</section>
