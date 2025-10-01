<?php 
include ('../conexion/conectar.php');
include('../model/mdl_rutinas.php');


$accion = $_POST['accion'];

switch ($accion) {
	case 'cargarRutinas':
		cargarRutinas();
		break;

		case 'guardarRutinas':
		guardarRutinas();
		break;

		case 'seleccionarRutina':
		seleccionarRutina();
		break;
	
		case 'editarRutinas':
		editarRutinas();
		break;

		case 'eliminarRutina':
		eliminarRutina();
		break;

		case 'cargarRutinaAsignada':
		cargarRutinaAsignada();
		break;
	
}

function cargarRutinas(){
	$Rutinas = new Rutinas;
	$datos = json_decode($Rutinas->cargarRutinas());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->cedula.'</th>';
				$tabla .= '<td>'.$value->nombres.' '.$value->apellidos.'</td>';
				$tabla .= '<td>';
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="seleccionarRutina('.$value->cedula.')"></i>';
			        $tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="eliminarRutina('.$value->cedula.')"></i>';
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

function guardarRutinas(){
	$Rutinas = new Rutinas;

	$cedula = $_POST['cedula'];
	$ejercicio_rt_1 = $_POST['ejercicio_rt_1'];	
	$repeticiones_1 = $_POST['repeticiones_1'];	
	$series_1 = $_POST['series_1'];	
	$ejercicio_rt_2 = $_POST['ejercicio_rt_2'];	
	$repeticiones_2 = $_POST['repeticiones_2'];	
	$series_2 = $_POST['series_2'];	
	$ejercicio_rt_3 = $_POST['ejercicio_rt_3'];	
	$repeticiones_3 = $_POST['repeticiones_3'];	
	$series_3 = $_POST['series_3'];	
	$ejercicio_rt_4 = $_POST['ejercicio_rt_4'];	
	$repeticiones_4 = $_POST['repeticiones_4'];	
	$series_4 = $_POST['series_4'];	
	$ejercicio_rt_5 = $_POST['ejercicio_rt_5'];	
	$repeticiones_5 = $_POST['repeticiones_5'];	
	$series_5 = $_POST['series_5'];	

	$datos = json_decode($Rutinas->guardarRutinas($cedula,$ejercicio_rt_1,$repeticiones_1,$series_1,$ejercicio_rt_2,$repeticiones_2,$series_2,$ejercicio_rt_3,$repeticiones_3,$series_3,$ejercicio_rt_4,$repeticiones_4,$series_4,$ejercicio_rt_5,$repeticiones_5,$series_5));
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

function seleccionarRutina(){
	$Rutinas = new Rutinas;

	$cedula = $_POST['cedula'];

	$datos = json_decode($Rutinas->seleccionarRutina($cedula));
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

function eliminarRutina(){
	$Rutinas = new Rutinas;

	$cedula = $_POST['cedula'];

	$datos = json_decode($Rutinas->eliminarRutina($cedula));
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

function cargarRutinaAsignada(){
	$Rutinas = new Rutinas;

	$cedula = $_POST['cedula'];

	$datos = json_decode($Rutinas->cargarRutinaAsignada($cedula));
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->grupo_muscular.'</th>';
				$tabla .= '<td>'.$value->ejercicio.'</td>';
				$tabla .= '<td>'.$value->series.'</td>';
				$tabla .= '<td>'.$value->repeticiones.'</td>';
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

?>