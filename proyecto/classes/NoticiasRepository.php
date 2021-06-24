<?php

class NoticiasRepository
{
    /** @var PDO|null */
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Retorna un array con todas las noticias disponibles en la base de datos.
     *
     * @return Noticia[]
     */
    public function getAll(): array
    {
        $query = "SELECT * FROM noticias";
        $stmt = $this->db->prepare($query);

        $stmt->execute();

        $output = [];

      
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Noticia');
        while($news = $stmt->fetch()) {
            $output[] = $news;
        }

        return $output;
    }

    /**
     * Retorna la noticia a la que corresponde el $id.
     *
     *
     * @param int $id
     * @param bool $loadRelations
     * @return Noticia
     */
    public function getById(int $id, $loadRelations = false): Noticia {
 
        $query = "SELECT * FROM noticias
            WHERE noticia_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);


        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Noticia');
        /** @var Noticia $news */
        $news = $stmt->fetch();

        if($loadRelations) {
            // Cargamos los datos de las etiquetas relacionadas.
            $queryRelation = "SELECT e.*
                    FROM etiquetas_tienen_noticias etn
                        INNER JOIN etiquetas e ON etn.etiqueta_id = e.etiqueta_id
                    WHERE etn.noticia_id = ?";
            $stmt = $this->db->prepare($queryRelation);
            $stmt->execute([$id]);

            // Creamos el array de objetos Etiqueta con esa data.
            $stmt->setFetchMode(PDO::FETCH_CLASS, Etiqueta::class);
            $etiquetas = $stmt->fetchAll();
            $news->setEtiquetas($etiquetas);
        }

        return $news;
    }

    /**
     * Crea una noticia nueva en la base de datos.
     * Retorna true si tuvo éxito. false de lo contrario.
     *
     * @param array $nuevaNoticia
     * @return bool
     */
    public function create(array $nuevaNoticia): bool {
      
        $query = "INSERT INTO noticias (seccion_id, titulo, sinopsis, fecha, texto, imagen, imagen_descripcion, usuario_id)
            VALUES (:seccion_id, :titulo, :sinopsis, NOW(), :texto, :imagen, :imagen_descripcion, :usuario_id)";

        $stmt = $this->db->prepare($query);
      
        $exito = $stmt->execute([
            'seccion_id'            => $nuevaNoticia['seccion_id'], 
            ':titulo'               => $nuevaNoticia['titulo'], 
            'sinopsis'              => $nuevaNoticia['sinopsis'],
            'texto'                 => $nuevaNoticia['texto'],
            'imagen'                => $nuevaNoticia['imagen'],
            'imagen_descripcion'    => $nuevaNoticia['imagen_descripcion'],
            'usuario_id'            => $nuevaNoticia['usuario_id'],
        ]);

       
        $noticia_id = $this->db->lastInsertId();

        // Armado del INSERT para las etiquetas.
  
        if(!empty($nuevaNoticia['etiquetas'])) {
            $dataEtiquetas = []; 
            foreach($nuevaNoticia['etiquetas'] as $etiqueta) {
                
                $dataEtiquetas[] = "($etiqueta, $noticia_id)";
            }
            
            $queryEtiquetas = "INSERT INTO etiquetas_tienen_noticias (etiqueta_id, noticia_id) 
                                VALUES " . implode(', ', $dataEtiquetas);
            $stmtEtiquetas = $this->db->prepare($queryEtiquetas);
            $exitoEtiquetas = $stmtEtiquetas->execute();

           
            $exito = $exito && $exitoEtiquetas;
        }

        return $exito;
    }

    /**
     *
     * @param int $id
     * @param array $datosNoticia
     * @return bool
     */
    public function update(int $id, array $datosNoticia): bool {
        $query = "UPDATE noticias 
                SET titulo              = :titulo, 
                    sinopsis            = :sinopsis, 
                    texto               = :texto, 
                    imagen              = :imagen, 
                    imagen_descripcion  = :imagen_descripcion, 
                    seccion_id          = :seccion_id, 
                    usuario_id          = :usuario_id
                WHERE 
                    noticia_id          = :noticia_id";

        $stmt = $this->db->prepare($query);
        $exito = $stmt->execute([
            'titulo'                => $datosNoticia['titulo'],
            'sinopsis'              => $datosNoticia['sinopsis'],
            'texto'                 => $datosNoticia['texto'],
            'imagen'                => $datosNoticia['imagen'],
            'imagen_descripcion'    => $datosNoticia['imagen_descripcion'],
            'seccion_id'            => $datosNoticia['seccion_id'],
            'usuario_id'            => $datosNoticia['usuario_id'],
            'noticia_id'            => $id,
        ]);

       
        $queryDelete = "DELETE FROM etiquetas_tienen_noticias
                        WHERE noticia_id = ?";
        $stmt = $this->db->prepare($queryDelete);
        $exitoDelete = $stmt->execute([$id]);

      
        $exito = $exito && $exitoDelete;

        // Armado del INSERT para las etiquetas.

        if(!empty($datosNoticia['etiquetas'])) {
            $dataEtiquetas = []; 
            foreach($datosNoticia['etiquetas'] as $etiqueta) {
                
                $dataEtiquetas[] = "($etiqueta, $id)";
            }
            
            $queryEtiquetas = "INSERT INTO etiquetas_tienen_noticias (etiqueta_id, noticia_id) 
                                VALUES " . implode(', ', $dataEtiquetas);
            echo $queryEtiquetas;
            $stmtEtiquetas = $this->db->prepare($queryEtiquetas);
            $exitoEtiquetas = $stmtEtiquetas->execute();

     
            $exito = $exito && $exitoEtiquetas;
        }

        return $exito;
    }

    /**
     * Elimina una noticia de la base de datos.
     * Retorna true si tuvo éxito. false de lo contrario.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $query = "DELETE FROM noticias
                WHERE noticia_id = ?";
        $stmt = $this->db->prepare($query);
        $exito = $stmt->execute([$id]);

        return $exito;
    }
}
