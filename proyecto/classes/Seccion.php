<?php

class Seccion
{
    /** @var int */
    protected $seccion_id;
    /** @var string */
    protected $nombre;

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
