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

    public function queyUser($id)
    {
        $sql = $this->db->query("SELECT * FROM `empleados` WHERE cedula = '$id'");
        if ($this->db->rows($sql) > 0) {
            while ($data = $this->db->recorrer($sql)) {
                $respuesta[] = $data;
            }
        } else {
            $respuesta = false;
        }
        return $respuesta;
    }
}
