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
            $data = $conexion->queyUser($id);
            echo json_encode($data);
            break;
        default:
            header('location:' . HTML_DIR . 'error.html');
            break;
    }
} else {
    include(HTML_DIR . 'login/index.php');
}
