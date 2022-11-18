<?php
class database
{
    private $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function rotation($selectedDays)
    {
        $sql = $this->db->query("INSERT INTO rotaciones (rotacion) VALUES ('$selectedDays')");
    }
}
