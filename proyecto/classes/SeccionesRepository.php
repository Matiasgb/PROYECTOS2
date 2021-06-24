<?php

class SeccionesRepository
{
    /** @var PDO|null */
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return array|Seccion[]
     */
    public function getAll(): array
    {
        $query = "SELECT * FROM secciones";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, Seccion::class);

        return $stmt->fetchAll();
    }
}
