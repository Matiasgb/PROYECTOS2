<?php

class EtiquetasRepository
{
    /** @var PDO|null */
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return array|Etiqueta[]
     */
    public function getAll(): array
    {
        $query = "SELECT * FROM etiquetas";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, Etiqueta::class);

        return $stmt->fetchAll();
    }
}
