<?php 
include ('../conexion/conectar.php');
include('../model/mdl_usuarios.php');


$accion = $_POST['accion'];

switch ($accion) {
	case 'cargarUsuarios':
		cargarUsuarios();
		break;

		case 'guardarUsuarios':
		guardarUsuarios();
		break;

		case 'seleccionarUsuario':
		seleccionarUsuario();
		break;
	
		case 'editarUsuarios':
		editarUsuarios();
		break;

		case 'eliminarUsuario':
		eliminarUsuario();
		break;
	
}

function cargarUsuarios(){
	$usuarios = new Usuarios;
	$datos = json_decode($usuarios->cargarUsuarios());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->id.'</th>';
				$tabla .= '<td>'.$value->name.'</td>';
				$tabla .= '<td>'.$value->email.'</td>';
				$tabla .= '<td>'.$value->role.'</td>';
				$tabla .= '<td>';
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="seleccionarUsuario('.$value->id.')"></i>';
			        $tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="eliminarUsuario('.$value->id.')"></i>';
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

function guardarUsuarios(){
	$usuarios = new Usuarios;

	$nombres = $_POST['nombres'];
	$email = $_POST['email'];
	$contrasena = $_POST['contrasena'];
	$rol = $_POST['rol'];

	$datos = json_decode($usuarios->guardarUsuarios($nombres,$email,$contrasena,$rol));
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

function seleccionarUsuario(){
	$usuarios = new Usuarios;

	$id = $_POST['id'];

	$datos = json_decode($usuarios->seleccionarUsuario($id));
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

function editarUsuarios(){
	$usuarios = new Usuarios;

	$id = $_POST['id'];
	$nombres = $_POST['nombres'];
	$email = $_POST['email'];
	$contrasena = $_POST['contrasena'];
	$rol = $_POST['rol'];

	$datos = json_decode($usuarios->editarUsuarios($id,$nombres,$email,$contrasena,$rol));
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

function eliminarUsuario(){
	$usuarios = new Usuarios;

	$id = $_POST['id'];

	$datos = json_decode($usuarios->eliminarUsuario($id));
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