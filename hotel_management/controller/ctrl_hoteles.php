<?php 
include ('../conexion/conectar.php');
include('../model/mdl_hoteles.php');


$accion = $_POST['accion'];

switch ($accion) {
	case 'cargarHoteles':
		cargarHoteles();
		break;

		case 'guardarHoteles':
		guardarHoteles();
		break;

		case 'seleccionarHotel':
		seleccionarHotel();
		break;
	
		case 'editarHoteles':
		editarHoteles();
		break;

		case 'eliminarHotel':
		eliminarHotel();
		break;

		case 'cargarListaAlimentos':
		cargarListaAlimentos();
		break;
	
}

function cargarHoteles(){
	$hoteles = new Hoteles;
	$datos = json_decode($hoteles->cargarHoteles());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->id.'</th>';
				$tabla .= '<td>'.$value->name.'</td>';
				$tabla .= '<td>'.$value->address.'</td>';
				$tabla .= '<td>'.$value->city.'</td>';
				$tabla .= '<td>'.$value->nit .'</td>';
				$tabla .= '<td>'.$value->number_of_rooms .'</td>';
				$tabla .= '<td>';
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="seleccionarHotel('.$value->id.')"></i>';
			        $tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="eliminarHotel('.$value->id.')"></i>';
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

function guardarHoteles(){
	$hoteles = new Hoteles;

	$nombre_hotel = $_POST['nombre_hotel'];
	$direccion_hotel = $_POST['direccion_hotel'];	
	$ciudad_hotel = $_POST['ciudad_hotel'];
	$nit = $_POST['nit'];	
	$numero_cuartos = $_POST['numero_cuartos'];	

	$datos = json_decode($hoteles->guardarHoteles($nombre_hotel,$direccion_hotel,$ciudad_hotel,$nit,$numero_cuartos));
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

function seleccionarHotel(){
	$hoteles = new Hoteles;

	$id_hotel = $_POST['id_hotel'];

	$datos = json_decode($hoteles->seleccionarHotel($id_hotel));
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

function editarHoteles(){
	$hoteles = new Hoteles;

	$id_hotel = $_POST['id_hotel'];
	$nombre_hotel = $_POST['nombre_hotel'];
	$direccion_hotel = $_POST['direccion_hotel'];
	$ciudad_hotel = $_POST['ciudad_hotel'];
	$nit = $_POST['nit'];
	$numero_cuartos = $_POST['numero_cuartos'];

	$datos = json_decode($hoteles->editarHoteles($id_hotel,$nombre_hotel,$direccion_hotel,$ciudad_hotel,$nit,$numero_cuartos));
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

function eliminarHotel(){
	$hoteles = new Hoteles;

	$id_hotel = $_POST['id_hotel'];

	$datos = json_decode($hoteles->eliminarHotel($id_hotel));
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

function cargarListaAlimentos(){
	$usuarios = new Alimentos;
	
	$datos = json_decode($usuarios->cargarListaAlimentos());
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

?>