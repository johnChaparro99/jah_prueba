<?php 
include ('../conexion/conectar.php');
include('../model/mdl_clientes.php');


$accion = $_POST['accion'];

switch ($accion) {
	case 'cargarClientes':
		cargarClientes();
		break;

		case 'guardarClientes':
		guardarClientes();
		break;

		case 'seleccionarCliente':
		seleccionarCliente();
		break;
	
		case 'editarClientes':
		editarClientes();
		break;

		case 'eliminarCliente':
		eliminarCliente();
		break;	
}

function cargarClientes(){
	$Clientes = new Clientes;
	$datos = json_decode($Clientes->cargarClientes());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->id.'</th>';
				$tabla .= '<td>'.$value->name.'</td>';
				$tabla .= '<td>'.$value->email.'</td>';
				$tabla .= '<td>'.$value->phone.'</td>';
				$tabla .= '<td>';
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="seleccionarCliente('.$value->id.')"></i>';
			        $tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="eliminarCliente('.$value->id.')"></i>';
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

function guardarClientes(){
	$Clientes = new Clientes;

	$nombres = $_POST['nombres'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];

	$datos = json_decode($Clientes->guardarClientes($nombres,$email,$telefono));
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

function seleccionarCliente(){
	$Clientes = new Clientes;

	$id = $_POST['id'];

	$datos = json_decode($Clientes->seleccionarCliente($id));
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

function editarClientes(){
	$Clientes = new Clientes;

	$id = $_POST['id'];
	$nombres = $_POST['nombres'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];

	$datos = json_decode($Clientes->editarClientes($id,$nombres,$email,$telefono));
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

function eliminarCliente(){
	$Clientes = new Clientes;

	$id = $_POST['id'];

	$datos = json_decode($Clientes->eliminarCliente($id));
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

function cargarClientesRol(){
	$Clientes = new Clientes;
	$rol = $_POST['rol'];
	
	$datos = json_decode($Clientes->cargarClientesRol($rol));
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