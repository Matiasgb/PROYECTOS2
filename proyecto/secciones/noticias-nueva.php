<section class="container-flex">
    <div>
        <h1>Crear nueva noticia</h1>
        <p>Completá el formulario con los datos de la noticia que querés publicar, y dale a "Publicar".</p>

       
        <form action="acciones/noticias-crear.php" method="post">
            <div class="form-fila">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" class="form-control">
            </div>
            <div class="form-fila">
                <label for="sinopsis">Sinopsis</label>
                <textarea id="sinopsis" name="sinopsis" class="form-control"></textarea>
            </div>
            <div class="form-fila">
                <label for="texto">Texto de la noticia</label>
                <textarea id="texto" name="texto" class="form-control"></textarea>
            </div>
            <div class="form-fila">
                <label for="imagen">Imagen (coming soon)</label>
                <input type="file" id="imagen" name="imagen" class="form-control">
            </div>
            <div class="form-fila">
                <label for="imagen_descripcion">Descripción de la imagen</label>
                <input type="text" id="imagen_descripcion" name="imagen_descripcion" class="form-control">
            </div>
            <button class="button" type="submit">Publicar</button>
        </form>
    </div>
</section>
