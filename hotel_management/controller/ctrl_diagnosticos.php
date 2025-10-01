<?php 
include ('../conexion/conectar.php');
include('../model/mdl_diagnosticos.php');


$accion = $_POST['accion'];

switch ($accion) {
	case 'cargarDiagnostico':
		cargarDiagnostico();
		break;

		case 'guardarDiagnostico':
		guardarDiagnostico();
		break;

		case 'seleccionarDiagnostico':
		seleccionarDiagnostico();
		break;
	
		case 'editarDiagnostico':
		editarDiagnostico();
		break;

		case 'eliminarDiagnostico':
		eliminarDiagnostico();
		break;
	
}

function cargarDiagnostico(){
	$Diagnostico = new Diagnostico;
	$datos = json_decode($Diagnostico->cargarDiagnostico());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->id_diagnostico.'</th>';
				$tabla .= '<td>'.$value->nombre_usuario.'</td>';
				$tabla .= '<td>'.$value->fecha_valoracion.'</td>';
				$tabla .= '<td>';
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="seleccionarDiagnostico('.$value->id_diagnostico.')"></i>';
			        $tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="eliminarDiagnostico('.$value->id_diagnostico.')"></i>';
				$tabla .= '</td>';
			$tabla .= '</tr>';
		}

		$respuesta['success'] = true;
		$respuesta['tabla'] = $tabla;
	} else {
		$respuesta['success'] = false;
		$respuesta['message'] = $datos->message;
	}

	echo json_encode($respuesta);
}

function guardarDiagnostico(){
	$Diagnostico = new Diagnostico;

	$cedula = $_POST['cedula'];
	$enfermedad_dermatologica = $_POST['enfermedad_dermatologica'];
	$diabetes = $_POST['diabetes'];
	$vena_varice = $_POST['vena_varice'];
	$problemas_circulatorios = $_POST['problemas_circulatorios'];
	$hernias = $_POST['hernias'];
	$hipertencion_arterial = $_POST['hipertencion_arterial'];
	$tiroides = $_POST['tiroides'];
	$alergias = $_POST['alergias'];
	$cuales_alergias = $_POST['cuales_alergias'];
	$toma_alcohol = $_POST['toma_alcohol'];
	$fuma = $_POST['fuma'];
	$tumores = $_POST['tumores'];
	$cancer = $_POST['cancer'];
	$implantes_metalicos = $_POST['implantes_metalicos'];
	$marca_pasos = $_POST['marca_pasos'];
	$problemas_columna = $_POST['problemas_columna'];
	$cirugias = $_POST['cirugias'];
	$cuales_cirugias = $_POST['cuales_cirugias'];
	$toma_medicamentos = $_POST['toma_medicamentos'];
	$cuales_medicamentos = $_POST['cuales_medicamentos'];

	$datos = json_decode($Diagnostico->guardarDiagnostico($cedula,$enfermedad_dermatologica,$diabetes,$vena_varice,$problemas_circulatorios,$hernias,$hipertencion_arterial,$tiroides,$alergias,$cuales_alergias,$toma_alcohol,$fuma,$tumores,$cancer,$implantes_metalicos,$marca_pasos,$problemas_columna,$cirugias,$cuales_cirugias,$toma_medicamentos,$cuales_medicamentos));
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		$respuesta['success'] = true;
		$respuesta['message'] = $datos->message;
	} else {
		$respuesta['success'] = false;
		$respuesta['message'] = $datos->message;
	}

	echo json_encode($respuesta);
}

function seleccionarDiagnostico(){
	$Diagnostico = new Diagnostico;

	$id_diagnostico = $_POST['id_diagnostico'];

	$datos = json_decode($Diagnostico->seleccionarDiagnostico($id_diagnostico));
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {

		$respuesta['success'] = true;
		$respuesta['data'] = $datos->data;
	} else {
		$respuesta['success'] = false;
		$respuesta['message'] = $datos->message;
	}

	echo json_encode($respuesta);
}

function editarDiagnostico(){
	$Diagnostico = new Diagnostico;

	$id_diagnostico = $_POST['id_diagnostico'];
	$cedula = $_POST['cedula'];
	$enfermedad_dermatologica = $_POST['enfermedad_dermatologica'];
	$diabetes = $_POST['diabetes'];
	$vena_varice = $_POST['vena_varice'];
	$problemas_circulatorios = $_POST['problemas_circulatorios'];
	$hernias = $_POST['hernias'];
	$hipertencion_arterial = $_POST['hipertencion_arterial'];
	$tiroides = $_POST['tiroides'];
	$alergias = $_POST['alergias'];
	$cuales_alergias = $_POST['cuales_alergias'];
	$toma_alcohol = $_POST['toma_alcohol'];
	$fuma = $_POST['fuma'];
	$tumores = $_POST['tumores'];
	$cancer = $_POST['cancer'];
	$implantes_metalicos = $_POST['implantes_metalicos'];
	$marca_pasos = $_POST['marca_pasos'];
	$problemas_columna = $_POST['problemas_columna'];
	$cirugias = $_POST['cirugias'];
	$cuales_cirugias = $_POST['cuales_cirugias'];
	$toma_medicamentos = $_POST['toma_medicamentos'];
	$cuales_medicamentos = $_POST['cuales_medicamentos'];

	$datos = json_decode($Diagnostico->editarDiagnostico($id_diagnostico,$cedula,$enfermedad_dermatologica,$diabetes,$vena_varice,$problemas_circulatorios,$hernias,$hipertencion_arterial,$tiroides,$alergias,$cuales_alergias,$toma_alcohol,$fuma,$tumores,$cancer,$implantes_metalicos,$marca_pasos,$problemas_columna,$cirugias,$cuales_cirugias,$toma_medicamentos,$cuales_medicamentos));
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		$respuesta['success'] = true;
		$respuesta['message'] = $datos->message;
	} else {
		$respuesta['success'] = false;
		$respuesta['message'] = $datos->message;
	}

	echo json_encode($respuesta);
}

function eliminarDiagnostico(){
	$Diagnostico = new Diagnostico;

	$id_diagnostico = $_POST['id_diagnostico'];

	$datos = json_decode($Diagnostico->eliminarDiagnostico($id_diagnostico));
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {

		$respuesta['success'] = true;
	} else {
		$respuesta['success'] = false;
		$respuesta['message'] = $datos->message;
	}

	echo json_encode($respuesta);
}

?>