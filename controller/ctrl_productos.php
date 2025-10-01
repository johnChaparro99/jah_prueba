<?php 
include ('../conexion/conectar.php');
include('../model/mdl_productos.php');


$accion = $_POST['accion'];

switch ($accion) {
	case 'cargarProductos':
		cargarProductos();
		break;

		case 'guardarProductos':
		guardarProductos();
		break;

		case 'seleccionarProducto':
		seleccionarProducto();
		break;
	
		case 'editarProductos':
		editarProductos();
		break;

		case 'eliminarProducto':
		eliminarProducto();
		break;	
}

function cargarProductos(){
	$Productos = new Productos;
	$datos = json_decode($Productos->cargarProductos());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->id.'</th>';
				$tabla .= '<td>'.$value->name.'</td>';
				$tabla .= '<td>'.$value->price.'</td>';
				$tabla .= '<td>'.$value->stock.'</td>';
				$tabla .= '<td>';
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="seleccionarProducto('.$value->id.')"></i>';
			        $tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="eliminarProducto('.$value->id.')"></i>';
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

function guardarProductos(){
	$Productos = new Productos;

	$nombres = $_POST['nombres'];
	$precio = $_POST['precio'];
	$stock = $_POST['stock'];

	$datos = json_decode($Productos->guardarProductos($nombres,$precio,$stock));
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

function seleccionarProducto(){
	$Productos = new Productos;

	$id = $_POST['id'];

	$datos = json_decode($Productos->seleccionarProducto($id));
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

function editarProductos(){
	$Productos = new Productos;

	$id = $_POST['id'];
	$nombres = $_POST['nombres'];
	$precio = $_POST['precio'];
	$stock = $_POST['stock'];

	$datos = json_decode($Productos->editarProductos($id,$nombres,$precio,$stock));
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

function eliminarProducto(){
	$Productos = new Productos;

	$id = $_POST['id'];

	$datos = json_decode($Productos->eliminarProducto($id));
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