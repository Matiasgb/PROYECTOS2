<?php

/**
 * Class Noticia
 * Representa una noticia de la base de datos.
 */
class Noticia
{
    /** @var int La PK de la noticia. */
    protected $noticia_id;

    /** @var int La FK con el id de la sección en la que se publicó la noticia. */
    protected $seccion_id;

    /** @var int La FK con el id del usuario que publicó la noticia. */
    protected $usuario_id;

    /** @var string */
    protected $titulo;

    /** @var string */
    protected $sinopsis;

    /** @var string */
    protected $texto;

    /** @var string */
    protected $fecha;

    /** @var string */
    protected $imagen;

    /** @var string */
    protected $imagen_descripcion;

    /** @var array|Etiqueta[] */
    protected $etiquetas = [];

    /**
     *
     * @param array $data
     */
    public function loadDataFromArray(array $data): void
    {
        $this->setNoticiaId($data['noticia_id']);
        $this->setUsuarioId($data['usuario_id']);
        $this->setTitulo($data['titulo']);
        $this->setSinopsis($data['sinopsis']);
        $this->setTexto($data['texto']);
        $this->setFecha($data['fecha']);
        $this->setImagen($data['imagen']);
        $this->setImagenDescripcion($data['imagen_descripcion']);
    }

    /**
     * Retorna el valor de la PK de la noticia.
     *
     * @return int
     */
    public function getNoticiaId(): int
    {
        return $this->noticia_id;
    }

    /**
     * @param int $noticia_id
     */
    public function setNoticiaId(int $noticia_id): void
    {
        $this->noticia_id = $noticia_id;
    }

    /**
     * @return int
     */
    public function getUsuarioId(): int
    {
        return $this->usuario_id;
    }

    /**
     * @param int $usuario_id
     */
    public function setUsuarioId(int $usuario_id): void
    {
        $this->usuario_id = $usuario_id;
    }

    /**
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getSinopsis(): string
    {
        return $this->sinopsis;
    }

    /**
     * @param string $sinopsis
     */
    public function setSinopsis(string $sinopsis): void
    {
        $this->sinopsis = $sinopsis;
    }

    /**
     * @return string
     */
    public function getTexto(): string
    {
        return $this->texto;
    }

    /**
     * @param string $texto
     */
    public function setTexto(string $texto): void
    {
        $this->texto = $texto;
    }

    /**
     * @return string
     */
    public function getFecha(): string
    {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     */
    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return string|null
     */
    public function getImagen(): ?string 
    {
        return $this->imagen;
    }

    /**
     * @param string $imagen
     */
    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }

    /**
     * @return string
     */
    public function getImagenDescripcion(): string
    {
        return $this->imagen_descripcion;
    }

    /**
     * @param string $imagen_descripcion
     */
    public function setImagenDescripcion(string $imagen_descripcion): void
    {
        $this->imagen_descripcion = $imagen_descripcion;
    }

    /**
     * @return int
     */
    public function getSeccionId(): int
    {
        return $this->seccion_id;
    }

    /**
     * @param int $seccion_id
     */
    public function setSeccionId(int $seccion_id): void
    {
        $this->seccion_id = $seccion_id;
    }

    /**
     * @return array|Etiqueta[]
     */
    public function getEtiquetas(): array
    {
        return $this->etiquetas;
    }

    /**
     * @param array $etiquetas
     */
    public function setEtiquetas(array $etiquetas): void
    {
        $this->etiquetas = $etiquetas;
    }
}
