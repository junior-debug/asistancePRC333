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

    public function queryUser($id)
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

    public function queryJustification($id, $date, $justification, $finalDay)
    {
        $sql = $this->db->query("INSERT INTO adtlog (empleadoID, fecha_hora_aut, fecha_aut, hora_aut, direccion, nombre_dispositivo, sn_dispositivo, nombre_persona, no_tarjeta, justificacion, final_justificacion) VALUES ('$id', '$date', '0000-00-00', '12:56:01.000000', 'IN', '', '', '', '', '$justification', '$finalDay')");
    }

    public function queryUpdate($id, $date, $justification)
    {
        $sql = $this->db->query("UPDATE adtlog SET justificacion = '$justification' WHERE empleadoID = '$id' AND fecha_hora_aut = '$date'");
    }

    public function queryDelete($id, $date)
    {
        $sql = $this->db->query("DELETE FROM adtlog WHERE empleadoID = '$id' AND fecha_hora_aut = '$date'");
    }

    public function rotations()
    {
        $sql = $this->db->query("SELECT * FROM rotaciones");
        if ($this->db->rows($sql) > 0) {
            while ($data = $this->db->recorrer($sql)) {
                $respuesta[] = $data;
            }
        } else {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function changeNomina($nomina, $oldPayroll, $reason, $dataDay, $id)
    {
        $sql = $this->db->query("INSERT INTO cambios (cedula, fecha, nomina, antigua_nomina, motivo) VALUES ('$id', '$dataDay', '$nomina', '$oldPayroll', '$reason')");
    }

    public function changeCargo($cargo, $oldPosition, $dataDay, $id)
    {
        $sql = $this->db->query("INSERT INTO cambios (cedula, fecha, cargo, antiguo_cargo) VALUES ('$id', '$dataDay', '$cargo', '$oldPosition')");
    }

    public function changeTurno($turno, $oldTurn, $dataDay, $id)
    {
        $sql = $this->db->query("INSERT INTO cambios (cedula, fecha, turno, antiguo_turno) VALUES ('$id', '$dataDay', '$turno', '$oldTurn')");
    }

    public function changeRot($rotation, $oldRotation, $dataDay, $id)
    {
        $sql = $this->db->query("INSERT INTO cambios (cedula, fecha, rotacion, antigua_rotacion ) VALUES ('$id', '$dataDay', '$rotation', '$oldRotation')");
    }

    public function queryChangesData($id, $date)
    {
        $sql = $this->db->query("SELECT * FROM `cambios` WHERE cedula = '$id' AND fecha LIKE '$date%'");
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
