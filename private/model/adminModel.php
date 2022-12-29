<?php
class database
{
    private $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function newPayroll($payroll)
    {
        $sql = $this->db->query("INSERT INTO nominas (nomina) VALUES ('$payroll')");
    }

    public function newPosition($position)
    {
        $sql = $this->db->query("INSERT INTO cargos (cargo) VALUES ('$position')");
    }

    public function newTimeTable($turn)
    {
        $sql = $this->db->query("INSERT INTO horarios (horarios) VALUES ('$turn')");
    }

    public function payRoll()
    {
        $sql = $this->db->query("SELECT * FROM `nominas`");
        if ($this->db->rows($sql) > 0) {
            while ($data = $this->db->recorrer($sql)) {
                $respuesta[] = $data;
            }
        } else {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function position()
    {
        $sql = $this->db->query("SELECT * FROM `cargos`");
        if ($this->db->rows($sql) > 0) {
            while ($data = $this->db->recorrer($sql)) {
                $respuesta[] = $data;
            }
        } else {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function timetable()
    {
        $sql = $this->db->query("SELECT * FROM `horarios`");
        if ($this->db->rows($sql) > 0) {
            while ($data = $this->db->recorrer($sql)) {
                $respuesta[] = $data;
            }
        } else {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function payrollUpd($inputUpdate, $id)
    {
        $sql = $this->db->query("UPDATE nominas SET nomina = '$inputUpdate' WHERE id = '$id'");
    }

    public function positionUpd($inputUpdate, $id)
    {
        $sql = $this->db->query("UPDATE cargos SET cargo = '$inputUpdate' WHERE id = '$id'");
    }

    public function timeTableUpd($inputUpdate, $id)
    {
        $sql = $this->db->query("UPDATE horarios SET horarios = '$inputUpdate' WHERE id = '$id'");
    }

    public function payrollDisable($id)
    {
        $sql = $this->db->query("UPDATE nominas SET estatus_deshabilitado = 1 WHERE id = '$id'");
    }

    public function positionDisable($id)
    {
        $sql = $this->db->query("UPDATE cargos SET estatus_deshabilitado = 1 WHERE id = '$id'");
    }

    public function timeTableDisable($id)
    {
        $sql = $this->db->query("UPDATE horarios SET estatus_deshabilitado = 1 WHERE id = '$id'");
    }
}
