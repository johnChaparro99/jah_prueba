<?php 
include ('../conexion/conectar.php');
include('../model/mdl_maquinas.php');


$accion = $_POST['accion'];

switch ($accion) {
	case 'cargarMaquinas':
		cargarMaquinas();
		break;

		case 'guardarMaquinas':
		guardarMaquinas();
		break;

		case 'seleccionarMaquina':
		seleccionarMaquina();
		break;
	
		case 'editarMaquinas':
		editarMaquinas();
		break;

		case 'eliminarMaquina':
		eliminarMaquina();
		break;
	
}

function cargarMaquinas(){
	$maquinas = new Maquinas;
	$datos = json_decode($maquinas->cargarMaquinas());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->id_maquinas.'</th>';
				$tabla .= '<td>'.$value->nombre_maquina.'</td>';
				$tabla .= '<td>'.$value->estado.'</td>';
				$tabla .= '<td>';
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="seleccionarMaquina('.$value->id_maquinas.')"></i>';
			        $tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="eliminarMaquina('.$value->id_maquinas.')"></i>';
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

function guardarMaquinas(){
	$maquinas = new Maquinas;

	$nombre_maquina = $_POST['nombre_maquina'];
	$estado = $_POST['estado'];	

	$datos = json_decode($maquinas->guardarMaquinas($nombre_maquina,$estado));
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

function seleccionarMaquina(){
	$maquinas = new Maquinas;

	$id_maquina = $_POST['id_maquina'];

	$datos = json_decode($maquinas->seleccionarMaquina($id_maquina));
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

function editarMaquinas(){
	$maquinas = new Maquinas;

	$id_maquinas = $_POST['id_maquinas'];
	$nombre_maquina = $_POST['nombre_maquina'];
	$estado = $_POST['estado'];

	$datos = json_decode($maquinas->editarMaquinas($id_maquinas,$nombre_maquina,$estado));
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

function eliminarMaquina(){
	$maquinas = new Maquinas;

	$id_maquinas = $_POST['id_maquinas'];

	$datos = json_decode($maquinas->eliminarMaquina($id_maquinas));
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