<?php
include(PUBLIC_DIR . 'general/session.php');
if (empty($_SESSION)) {
    header('location:index.php');
} else {
    include_once(MODEL_DIR . 'adminModel.php');
    $conexion = new database();
    if (isset($_GET['mode'])) {
        switch ($_GET['mode']) {
            case 'createData':
                include(PUBLIC_DIR . 'general/header.php');
                include(PUBLIC_DIR . 'general/navbar.php');
                include(HTML_DIR . 'admin/createData.php');
                include(PUBLIC_DIR . 'general/footer.php');
                break;
                #------------------------------------------------------------------------------------
            case 'newData':
                $payroll = $_POST['payroll'];
                $position = $_POST['position'];
                $turnOn =  $_POST['turnOn'];
                $turnOff =  $_POST['turnOff'];

                if ($payroll != "") {
                    $data = $conexion->newPayroll($payroll);
                } else if ($position != "") {
                    $data = $conexion->newPosition($position);
                } else if ($turnOn != "" && $turnOff != "") {
                    $turn = $turnOn . " " . "a" . " " . $turnOff;
                    $data = $conexion->newTimeTable($turn);
                }
                break;
                #------------------------------------------------------------------------------------
            case 'editData':
                include(PUBLIC_DIR . 'general/header.php');
                include(PUBLIC_DIR . 'general/navbar.php');
                include(HTML_DIR . 'admin/editData.php');
                include(PUBLIC_DIR . 'general/footer.php');
                break;
                #------------------------------------------------------------------------------------
            case 'queryData':
                $dataUser = $_POST['dataUser'];
                if ($dataUser == "payroll") {
                    $data = $conexion->payRoll();
                    echo json_encode($data);
                } else if ($dataUser == "position") {
                    $data = $conexion->position();
                    echo json_encode($data);
                } else if ($dataUser == "turn") {
                    $data = $conexion->timetable();
                    echo json_encode($data);
                }
                break;
                #------------------------------------------------------------------------------------
            case 'payrollUpd':
                $inputUpdate = $_POST['inputUpdate'];
                $id = $_POST['id'];
                if ($inputUpdate != "") {
                    $data = $conexion->payrollUpd($inputUpdate, $id);
                } else {
                    $data = $conexion->payrollDisable($id);
                }
                break;
                #------------------------------------------------------------------------------------
            case 'positionUpd':
                $inputUpdate = $_POST['inputUpdate'];
                $id = $_POST['id'];
                if ($inputUpdate != "") {
                    $data = $conexion->positionUpd($inputUpdate, $id);
                } else {
                    $data = $conexion->positionDisable($id);
                }
                break;
                #------------------------------------------------------------------------------------
            case 'timeTableUpd':
                $inputUpdate = $_POST['inputUpdate'];
                $id = $_POST['id'];
                if ($inputUpdate != "") {
                    $data = $conexion->timeTableUpd($inputUpdate, $id);
                } else {
                    $data = $conexion->timeTableDisable($id);
                }
                break;
                #------------------------------------------------------------------------------------
            default:
                header('location:' . HTML_DIR . 'error.html');
                break;
        }
    }
}
