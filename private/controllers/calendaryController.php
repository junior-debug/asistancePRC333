<?php
include(PUBLIC_DIR . 'general/session.php');
if (empty($_SESSION)) {
	header('location:index.php');
} else {
	include_once(MODEL_DIR . 'calendarioModel.php');
	$conexion = new database();
	if (isset($_GET['mode'])) {
		switch ($_GET['mode']) {
			case 'index':
				$data = $conexion->queryAllEmployee();
				include(PUBLIC_DIR . 'general/header.php');
				include(PUBLIC_DIR . 'general/navbar.php');
				include(HTML_DIR . 'calendary/index.php');
				include(PUBLIC_DIR . 'general/footer.php');
				break;
				#------------------------------------------------------------------------------------
			case 'asistanceData':
				$employeData = $conexion->employe();
				echo json_encode($employeData);
				break;
				#------------------------------------------------------------------------------------
			case 'asistance':

				$id = $_POST['id'];
				$dataDay = $_POST['dataDay'];
				$asistance = $conexion->asistance($id, $dataDay);
				echo json_encode($asistance);
				break;
				#------------------------------------------------------------------------------------
			default:
				header('location:' . HTML_DIR . 'error.html');
				break;
		}
	}
}
