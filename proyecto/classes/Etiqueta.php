<?php

class Etiqueta
{
    /** @var int */
    protected $etiqueta_id;
    /** @var string */
    protected $nombre;

    /**
     * @return int
     */
    public function getEtiquetaId(): int
    {
        return $this->etiqueta_id;
    }

    /**
     * @param int $etiqueta_id
     */
    public function setEtiquetaId(int $etiqueta_id): void
    {
        $this->etiqueta_id = $etiqueta_id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
}
