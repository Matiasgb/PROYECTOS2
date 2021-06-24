<?php
// Requerimos la clase Noticia que vamos a usar.
require_once __DIR__ . '/../classes/Noticia.php';

/**
 * Retorna un array con todas las noticias disponibles en la base de datos.
 *
 * @param PDO $db
 * @return Noticia[]
 */
function noticiasGetAll(PDO $db): array {
    $query = "SELECT * FROM noticias";
    $stmt = $db->prepare($query);

    $stmt->execute();

    $output = [];

    
    
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Noticia');
    while($news = $stmt->fetch()) {
        $output[] = $news;
    }

    return $output;
}

/**
 *
 * @param PDO $db
 * @param int $id
 * @return Noticia
 */
function noticiaGetById(PDO $db, int $id): Noticia {
   
    $query = "SELECT * FROM noticias
            WHERE noticia_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);


    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Noticia');
    $news = $stmt->fetch();

    return $news;
}

/**
 *
 * @param PDO $db
 * @param array $nuevaNoticia
 * @return bool
 */
function noticiaCreate(PDO $db, array $nuevaNoticia): bool {
   
    $query = "INSERT INTO noticias (titulo, sinopsis, fecha, texto, imagen, imagen_descripcion, usuario_id)
            VALUES (:titulo, :sinopsis, NOW(), :texto, :imagen, :imagen_descripcion, :usuario_id)";

    $stmt = $db->prepare($query);
 
    $exito = $stmt->execute([
        ':titulo'               => $nuevaNoticia['titulo'], 
        'sinopsis'              => $nuevaNoticia['sinopsis'],
        'texto'                 => $nuevaNoticia['texto'],
        'imagen'                => $nuevaNoticia['imagen'],
        'imagen_descripcion'    => $nuevaNoticia['imagen_descripcion'],
        'usuario_id'            => $nuevaNoticia['usuario_id'],
    ]);

    return $exito;
}
