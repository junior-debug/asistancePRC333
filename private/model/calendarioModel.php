<?php
class database
{
    private $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function queryAllEmployee()
    {
        $sql = $this->db->query("SELECT * FROM empleados");
        if ($this->db->rows($sql) > 0) {
            while ($data = $this->db->recorrer($sql)) {
                $respuesta[] = $data;
            }
        } else {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function employe()
    {
        $sql = $this->db->query("SELECT * FROM empleados");
        if ($this->db->rows($sql) > 0) {
            while ($data = $this->db->recorrer($sql)) {
                $respuesta[] = $data;
            }
        } else {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function asistance($id, $dataDay)
    {
        $sql = $this->db->query("SELECT * FROM `adtlog` WHERE empleadoID = '$id' AND fecha_hora_aut LIKE '$dataDay%';");
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
