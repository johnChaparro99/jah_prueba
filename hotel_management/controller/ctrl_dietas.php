<?php 
include ('../conexion/conectar.php');
include('../model/mdl_dietas.php');


$accion = $_POST['accion'];

switch ($accion) {
	case 'cargarDietas':
		cargarDietas();
		break;

		case 'guardarDietas':
		guardarDietas();
		break;

		case 'seleccionarDieta':
		seleccionarDieta();
		break;
	
		case 'editarDietas':
		editarDietas();
		break;

		case 'eliminarDieta':
		eliminarDieta();
		break;

		case 'cargarDietaAsignada':
		cargarDietaAsignada();
		break;
	
}

function cargarDietas(){
	$Dietas = new Dietas;
	$datos = json_decode($Dietas->cargarDietas());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->cedula.'</th>';
				$tabla .= '<td>'.$value->nombres.' '.$value->apellidos.'</td>';
				$tabla .= '<td>';
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="seleccionarDieta('.$value->cedula.')"></i>';
			        $tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="eliminarDieta('.$value->cedula.')"></i>';
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

function guardarDietas(){
	$Dietas = new Dietas;

	$cedula = $_POST['cedula'];
	$alimento_dt_1 = $_POST['alimento_dt_1'];	
	$porcion_1 = $_POST['porcion_1'];	
	$cantidad_1 = $_POST['cantidad_1'];	
	$alimento_dt_2 = $_POST['alimento_dt_2'];	
	$porcion_2 = $_POST['porcion_2'];	
	$cantidad_2 = $_POST['cantidad_2'];	
	$alimento_dt_3 = $_POST['alimento_dt_3'];	
	$porcion_3 = $_POST['porcion_3'];	
	$cantidad_3 = $_POST['cantidad_3'];	
	$alimento_dt_4 = $_POST['alimento_dt_4'];	
	$porcion_4 = $_POST['porcion_4'];	
	$cantidad_4 = $_POST['cantidad_4'];	
	$alimento_dt_5 = $_POST['alimento_dt_5'];	
	$porcion_5 = $_POST['porcion_5'];	
	$cantidad_5 = $_POST['cantidad_5'];	

	$datos = json_decode($Dietas->guardarDietas($cedula,$alimento_dt_1,$porcion_1,$cantidad_1,$alimento_dt_2,$porcion_2,$cantidad_2,$alimento_dt_3,$porcion_3,$cantidad_3,$alimento_dt_4,$porcion_4,$cantidad_4,$alimento_dt_5,$porcion_5,$cantidad_5));
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

function seleccionarDieta(){
	$Dietas = new Dietas;

	$cedula = $_POST['cedula'];

	$datos = json_decode($Dietas->seleccionarDieta($cedula));
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

function eliminarDieta(){
	$Dietas = new Dietas;

	$cedula = $_POST['cedula'];

	$datos = json_decode($Dietas->eliminarDieta($cedula));
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

function cargarDietaAsignada(){
	$Dietas = new Dietas;

	$cedula = $_POST['cedula'];

	$datos = json_decode($Dietas->cargarDietaAsignada($cedula));
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->grupo_alimenticio.'</th>';
				$tabla .= '<td>'.$value->alimento.'</td>';
				$tabla .= '<td>'.$value->porciones.'</td>';
				$tabla .= '<td>'.$value->cantidad.'</td>';
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