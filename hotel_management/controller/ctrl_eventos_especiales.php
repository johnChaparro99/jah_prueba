<?php 
include ('../conexion/conectar.php');
include('../model/mdl_eventos_especiales.php');

session_start();
$accion = $_POST['accion'];

switch ($accion) {
	case 'cargarEventosEspeciales':
		cargarEventosEspeciales();
		break;

		case 'guardarEventosEspeciales':
		guardarEventosEspeciales();
		break;

		case 'seleccionarEventoEspecial':
		seleccionarEventoEspecial();
		break;
	
		case 'editarEventosEspeciales':
		editarEventosEspeciales();
		break;

		case 'eliminarEventoEspecial':
		eliminarEventoEspecial();
		break;

		case 'cargarEventEsp':
		cargarEventEsp();
		break;
		
		case 'inscribirEventoEspecial':
		inscribirEventoEspecial();
		break;

		case 'cancelarEventoEspecial':
		cancelarEventoEspecial();
		break;
	
}

function cargarEventosEspeciales(){
	$EventosEspeciales = new EventosEspeciales;
	$datos = json_decode($EventosEspeciales->cargarEventosEspeciales());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->nombre_evento.'</th>';
				$tabla .= '<td>'.$value->fecha_evento.'</td>';
				$tabla .= '<td>'.$value->hora_inicio.'</td>';
				$tabla .= '<td>'.$value->hora_fin.'</td>';
				$tabla .= '<td>'.$value->cupo.'</td>';
				$tabla .= '<td>'.$value->nombre_instructor.'</td>';
				$tabla .= '<td>'.$value->estado.'</td>';
				$tabla .= '<td>';
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="seleccionarEventoEspecial('.$value->id_evento.')"></i>';
			        $tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="eliminarEventoEspecial('.$value->id_evento.')"></i>';
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

function guardarEventosEspeciales(){
	$EventosEspeciales = new EventosEspeciales;

	$nombre_evento = $_POST['nombre_evento'];
	$descripcion = $_POST['descripcion'];
	$fecha_evento = $_POST['fecha_evento'];
	$hora_inicio = $_POST['hora_inicio'];
	$hora_fin = $_POST['hora_fin'];
	$cupo = $_POST['cupo'];
	$estado = $_POST['estado'];
	$instructor = $_POST['instructor'];

	$datos = json_decode($EventosEspeciales->guardarEventosEspeciales($nombre_evento,$descripcion,$fecha_evento,$hora_inicio,$hora_fin,$cupo,$estado,$instructor));
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

function seleccionarEventoEspecial(){
	$EventosEspeciales = new EventosEspeciales;

	$id_evento = $_POST['id_evento'];

	$datos = json_decode($EventosEspeciales->seleccionarEventoEspecial($id_evento));
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

function editarEventosEspeciales(){
	$EventosEspeciales = new EventosEspeciales;

	$id_evento = $_POST['id_evento'];
	$nombre_evento = $_POST['nombre_evento'];
	$descripcion = $_POST['descripcion'];
	$fecha_evento = $_POST['fecha_evento'];
	$hora_inicio = $_POST['hora_inicio'];
	$hora_fin = $_POST['hora_fin'];
	$cupo = $_POST['cupo'];
	$estado = $_POST['estado'];
	$instructor = $_POST['instructor'];

	$datos = json_decode($EventosEspeciales->editarEventosEspeciales($id_evento,$nombre_evento,$descripcion,$fecha_evento,$hora_inicio,$hora_fin,$cupo,$estado,$instructor));
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

function eliminarEventoEspecial(){
	$EventosEspeciales = new EventosEspeciales;

	$id_evento = $_POST['id_evento'];

	$datos = json_decode($EventosEspeciales->eliminarEventoEspecial($id_evento));
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

function cargarEventEsp(){
	$EventosEspeciales = new EventosEspeciales;
	$datos = json_decode($EventosEspeciales->cargarEventEsp());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->nombre_evento.'</th>';
				$tabla .= '<th scope="row">'.$value->descripcion.'</th>';
				$tabla .= '<td>'.$value->fecha_evento.'</td>';
				$tabla .= '<td>'.$value->hora_inicio.'</td>';
				$tabla .= '<td>'.$value->hora_fin.'</td>';
				$tabla .= '<td>'.$value->cupo.'</td>';
				$tabla .= '<td>';
				if ($value->inscrito != 1) {
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="inscribirEventoEspecial('.$_SESSION["cedula"].','.$value->id_evento.')"></i>';
				}else{
					$tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="cancelarEventoEspecial('.$_SESSION["cedula"].','.$value->id_evento.')"></i>';
				}
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

function inscribirEventoEspecial(){
	$EventosEspeciales = new EventosEspeciales;

	$cedula = $_POST['cedula'];
	$id_evento = $_POST['id_evento'];

	$datos = json_decode($EventosEspeciales->inscribirEventoEspecial($cedula, $id_evento));
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

function cancelarEventoEspecial(){
	$EventosEspeciales = new EventosEspeciales;

	$cedula = $_POST['cedula'];
	$id_evento = $_POST['id_evento'];

	$datos = json_decode($EventosEspeciales->cancelarEventoEspecial($cedula, $id_evento));
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