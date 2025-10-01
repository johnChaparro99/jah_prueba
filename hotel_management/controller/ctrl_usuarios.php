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

		case 'cargarInstructores':
		cargarInstructores();
		break;

		case 'cargarUsuariosRol':
		cargarUsuariosRol();
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
				$tabla .= '<th scope="row">'.$value->cedula.'</th>';
				$tabla .= '<td>'.$value->tipo_documento.'</td>';
				$tabla .= '<td>'.$value->nombres.'</td>';
				$tabla .= '<td>'.$value->apellidos.'</td>';
				$tabla .= '<td>'.$value->rol.'</td>';
				$tabla .= '<td>'.$value->estado.'</td>';
				$tabla .= '<td>';
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="seleccionarUsuario('.$value->cedula.')"></i>';
			        $tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="eliminarUsuario('.$value->cedula.')"></i>';
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

	$cedula = $_POST['cedula'];
	$tipo_documento = $_POST['tipo_documento'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	$genero = $_POST['genero'];
	$contrasena = $_POST['contrasena'];
	$estado = $_POST['estado'];	
	$rol = $_POST['rol'];	

	$datos = json_decode($usuarios->guardarUsuarios($cedula,$tipo_documento,$nombres,$apellidos,$fecha_nacimiento,$direccion,$telefono,$email,$genero,$contrasena,$estado,$rol));
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

	$cedula = $_POST['cedula'];

	$datos = json_decode($usuarios->seleccionarUsuario($cedula));
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

	$cedula = $_POST['cedula'];
	$tipo_documento = $_POST['tipo_documento'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	$genero = $_POST['genero'];
	$contrasena = $_POST['contrasena'];
	$estado = $_POST['estado'];	
	$rol = $_POST['rol'];	

	$datos = json_decode($usuarios->editarUsuarios($cedula,$tipo_documento,$nombres,$apellidos,$fecha_nacimiento,$direccion,$telefono,$email,$genero,$contrasena,$estado,$rol));
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

	$cedula = $_POST['cedula'];

	$datos = json_decode($usuarios->eliminarUsuario($cedula));
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

function cargarUsuariosRol(){
	$usuarios = new Usuarios;
	$rol = $_POST['rol'];
	
	$datos = json_decode($usuarios->cargarUsuariosRol($rol));
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