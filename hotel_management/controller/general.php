<?php 
include ('../conexion/conectar.php');


$accion = $_POST['accion'];

switch ($accion) {
	case 'login':
		login();
		break;

	case 'cerrarSession':
		cerrarSession();
		break;
	
}

function login(){
	$conexion = f_conectar();
	session_start();

	$cedula = $_POST['cedula'];
	$contrasenia = $_POST['contrasenia'];
	$respuesta = array();

	$sql = "SELECT * FROM usuarios WHERE cedula = $cedula AND contrasena = '$contrasenia'";
	$query = $conexion->query($sql);
	if ($query->num_rows > 0) {
		while ( $row = mysqli_fetch_array($query)) {
			if ($row['estado'] == 'Activo') {
				$_SESSION["cedula"]=$row['cedula'];
				$_SESSION["tipo_documento"]=$row['tipo_documento'];
				$_SESSION["nombres"]=$row['nombres'];
				$_SESSION["apellidos"]=$row['apellidos'];
				$_SESSION["fecha_nacimiento"]=$row['fecha_nacimiento'];
				$_SESSION["direccion"]=$row['direccion'];
				$_SESSION["telefono"]=$row['telefono'];
				$_SESSION["email"]=$row['email'];
				$_SESSION["genero"]=$row['genero'];
				$_SESSION["rol"]=$row['rol'];

				$respuesta['success'] = true;
				$respuesta['rol'] = $row['rol'];
			}else{
				$respuesta['success'] = false;
				$respuesta['message'] = 'El usuario que esta ingresando se encuentra inactivo, por favor comuníquese con el administrador del sistema.';
			}
			
		}
	}else{
		$respuesta['success'] = false;
		$respuesta['message'] = 'El usuario con el que esta intentando ingresar no existe, por favor comuníquese con el administrador del sistema.';
	}
	
	mysqli_close($conexion);
	//var_dump($respuesta);
	echo json_encode($respuesta);
}

function cerrarSession(){
	session_start();

	session_destroy();

	$respuesta['success'] = true;

	echo json_encode($respuesta);
}

?>