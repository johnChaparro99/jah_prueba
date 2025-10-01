<?php 
include ('../conexion/conectar.php');
include('../model/mdl_tipo_habitacion.php');


$accion = $_POST['accion'];

switch ($accion) {
	case 'cargarTipoHabitacion':
		cargarTipoHabitacion();
		break;

		case 'guardarTipoHabitacion':
		guardarTipoHabitacion();
		break;

		case 'seleccionarTipoHabitacion':
		seleccionarTipoHabitacion();
		break;
	
		case 'editarTipoHabitacion':
		editarTipoHabitacion();
		break;

		case 'eliminarTipoHabitacion':
		eliminarTipoHabitacion();
		break;
	
}

function cargarTipoHabitacion(){
	$tipoHabitacion = new tipoHabitacion;
	$datos = json_decode($tipoHabitacion->cargarTipoHabitacion());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->id.'</th>';
				$tabla .= '<td>'.$value->type.'</td>';
				$tabla .= '<td>'.$value->description.'</td>';
				$tabla .= '<td>';
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="seleccionarTipoHabitacion('.$value->id.')"></i>';
			        $tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="eliminarTipoHabitacion('.$value->id.')"></i>';
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

function guardarTipoHabitacion(){
	$tipoHabitacion = new tipoHabitacion;

	$tipo = $_POST['tipo'];
	$descripcion = $_POST['descripcion'];

	$datos = json_decode($tipoHabitacion->guardarTipoHabitacion($tipo,$descripcion));
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

function seleccionarTipoHabitacion(){
	$tipoHabitacion = new tipoHabitacion;

	$id_tipo_habitacion = $_POST['id_tipo_habitacion'];

	$datos = json_decode($tipoHabitacion->seleccionarTipoHabitacion($id_tipo_habitacion));
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

function editarTipoHabitacion(){
	$tipoHabitacion = new tipoHabitacion;

	$id_tipo_habitacion = $_POST['id_tipo_habitacion'];
	$tipo = $_POST['tipo'];
	$descripcion = $_POST['descripcion'];

	$datos = json_decode($tipoHabitacion->editarTipoHabitacion($id_tipo_habitacion,$tipo,$descripcion));
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

function eliminarTipoHabitacion(){
	$tipoHabitacion = new tipoHabitacion;

	$id_tipo_habitacion = $_POST['id_tipo_habitacion'];

	$datos = json_decode($tipoHabitacion->eliminarTipoHabitacion($id_tipo_habitacion));
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