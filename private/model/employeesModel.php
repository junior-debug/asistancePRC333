<?php
class database
{
    private $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function registro(
        $business,
        $payroll,
        $id,
        $birthDate,
        $email,
        $name,
        $dateAdmission,
        $dueDate,
        $position,
        $campus,
        $turn,
        $rotation,
        $workingHours,
        $exceptionLevel,
        $file,
        $bank,
        $accType,
        $accNumber,
        $salary,
        $manualDexterity,
        $address,
        $phone1,
        $phone2,
        $feeding,
        $vacationBonus,
        $utilities
    ) {
        $sql = $this->db->query("INSERT INTO empleados (empresa, nomina_cliente, cedula, fecha_nacimiento, correo, nombre_apellido, fecha_ingreso, fecha_egreso, finalizacion_contrato, cargo, unidad_organizativa, turno, rotacion, horario, excepcion, ficha, banco, tipo_cuenta, numero_cuenta, sueldo, destreza, direccion, telefono_1, telefono_2, tickets, bono, utilidades, estatus) VALUES ('$business', '$payroll', '$id', '$birthDate', '$email', '$name', '$dateAdmission','0000-00-00', '$dueDate', '$position', '$campus', '$turn', '$rotation', '$workingHours', '$exceptionLevel', '$file', '$bank', '$accType', '$accNumber', '$salary', '$manualDexterity', '$address', '$phone1', '$phone2', '$feeding', '$vacationBonus', '$utilities', 'activo')");
    }

    public function queryEmployee($id)
    {
        $sql = $this->db->query("SELECT * FROM empleados WHERE cedula = '$id'");
        if ($this->db->rows($sql) > 0) {
            while ($data = $this->db->recorrer($sql)) {
                $respuesta[] = $data;
            }
        } else {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function updateEmployee(
        $business,
        $payroll,
        $id,
        $birthDate,
        $email,
        $name,
        $dateAdmission,
        $dueDate,
        $disqualificationDate,
        $position,
        $campus,
        $turn,
        $rotation,
        $workingHours,
        $exceptionLevel,
        $file,
        $bank,
        $accType,
        $accNumber,
        $salary,
        $manualDexterity,
        $address,
        $phone1,
        $phone2,
        $feeding,
        $vacationBonus,
        $utilities,
        $status
    ) {
        $sql = $this->db->query("UPDATE empleados SET empresa = '$business', nomina_cliente = '$payroll', cedula = '$id', fecha_nacimiento = '$birthDate', correo = '$email', nombre_apellido = '$name', fecha_ingreso = '$dateAdmission', fecha_egreso = '$dueDate', fecha_egreso = '$disqualificationDate',cargo = '$position', unidad_organizativa = '$campus', turno = '$turn', rotacion = '$rotation', horario = '$workingHours', excepcion = '$exceptionLevel', ficha = '$file', banco = '$bank', tipo_cuenta = '$accType', numero_cuenta = '$accNumber', sueldo = '$salary', destreza = '$manualDexterity', direccion = '$address', telefono_1 = '$phone1', telefono_2 = '$phone2', tickets = '$feeding', bono = '$vacationBonus', utilidades = '$utilities', estatus = '$status' WHERE cedula = '$id'");
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

    public function position()
    {
        $sql = $this->db->query("SELECT * FROM cargos");
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
        $sql = $this->db->query("SELECT * FROM horarios");
        if ($this->db->rows($sql) > 0) {
            while ($data = $this->db->recorrer($sql)) {
                $respuesta[] = $data;
            }
        } else {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function payroll()
    {
        $sql = $this->db->query("SELECT * FROM nominas");
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
