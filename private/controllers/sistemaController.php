<?php
include_once(MODEL_DIR . 'systemModel.php');
include(PUBLIC_DIR . 'general/session.php');
$conexion = new database();
if (isset($_GET['mode'])) {
    switch ($_GET['mode']) {
        case "createRotation":
            include(PUBLIC_DIR . 'general/header.php');
            include(PUBLIC_DIR . 'general/navbar.php');
            include(HTML_DIR . 'system/createRotation.php');
            include(PUBLIC_DIR . 'general/footer.php');
            break;
            #------------------------------------------------------------------------------------
        case "queryRotation":
            $selectedDays = $_POST['selectedDays'];
            $data = $conexion->rotation($selectedDays);
            echo json_encode($data);
            break;
        case "justification":
            include(PUBLIC_DIR . 'general/header.php');
            include(PUBLIC_DIR . 'general/navbar.php');
            include(HTML_DIR . 'system/justification.php');
            include(PUBLIC_DIR . 'general/footer.php');
            break;
            #------------------------------------------------------------------------------------
            break;
        case "queryUser":
            $id = $_POST['id'];
            $data = $conexion->queryUser($id);
            echo json_encode($data);
            break;
        case "queryJustification":
            $id = $_POST['id'];
            $date = $_POST['date'];
            $justification = $_POST['justification'];
            $finalDay = $_POST['finalDay'];
            $data = $conexion->queryJustification($id, $date, $justification, $finalDay);
            echo json_encode($data);
            #------------------------------------------------------------------------------------
            break;
        case "queryUpdate":
            $id = $_POST['id'];
            $date = $_POST['date'];
            $justification = $_POST['justification'];
            $data = $conexion->queryUpdate($id, $date, $justification);
            echo json_encode($data);
            #------------------------------------------------------------------------------------
            break;
        case "queryDelete":
            $id = $_POST['id'];
            $date = $_POST['date'];
            $data = $conexion->queryDelete($id, $date);
            echo json_encode($data);
            #------------------------------------------------------------------------------------
            break;
        case "justifications":
            include(PUBLIC_DIR . 'general/header.php');
            include(PUBLIC_DIR . 'general/navbar.php');
            include(HTML_DIR . 'system/justifications.php');
            include(PUBLIC_DIR . 'general/footer.php');
            #------------------------------------------------------------------------------------
            break;
        case "changeRotation":
            $data = $conexion->rotations();
            include(PUBLIC_DIR . 'general/header.php');
            include(PUBLIC_DIR . 'general/navbar.php');
            include(HTML_DIR . 'system/changeRotations.php');
            include(PUBLIC_DIR . 'general/footer.php');
            #------------------------------------------------------------------------------------
            break;
        case "queryChangeRot":
            $id = $_POST['id'];
            $nomina = $_POST['nomina'];
            $reason = $_POST['reason'];
            $cargo = $_POST['cargo'];
            $oldPosition = $_POST['oldPosition'];
            $turno = $_POST['turno'];
            $oldTurn = $_POST['oldTurn'];
            $rotation = $_POST['rotation'];
            $oldRotation = $_POST['oldRotation'];
            $dataDay = $_POST['date'];
            $oldPayroll = $_POST['oldPayroll'];
            if ($nomina != "" || $oldPayroll != "") {
                $data = $conexion->changeNomina($nomina, $oldPayroll, $reason, $dataDay, $id);
            } else if ($cargo != "" || $oldPosition != "") {
                $data = $conexion->changeCargo($cargo, $oldPosition, $dataDay, $id);
            } else if ($turno != "" || $oldTurn != "") {
                $data = $conexion->changeTurno($turno, $oldTurn, $dataDay, $id);
            } else if ($rotation != "" || $oldRotation != "") {
                $data = $conexion->changeRot($rotation, $oldRotation, $dataDay, $id);
            }
            break;
        case "payrollTransfer":
            include(PUBLIC_DIR . 'general/header.php');
            include(PUBLIC_DIR . 'general/navbar.php');
            include(HTML_DIR . 'system/payrollTransfer.php');
            include(PUBLIC_DIR . 'general/footer.php');
            #------------------------------------------------------------------------------------
            break;
        case "queryChangesData":
            $id = $_POST['id'];
            $date = $_POST['date'];
            $data = $conexion->queryChangesData($id, $date);
            echo json_encode($data);
            #------------------------------------------------------------------------------------
            break;
        default:
            header('location:' . HTML_DIR . 'error.html');
            break;
    }
} else {
    include(HTML_DIR . 'login/index.php');
}
