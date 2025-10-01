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

	$email = $_POST['email'];
	$contrasenia = $_POST['contrasenia'];
	$respuesta = array();

	$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$contrasenia'";
	$query = $conexion->query($sql);
	if ($query->num_rows > 0) {
		while ( $row = mysqli_fetch_array($query)) {
			$_SESSION["name"]=$row['name'];
			$_SESSION["email "]=$row['email'];
			$_SESSION["role"]=$row['role'];

			$respuesta['success'] = true;
			$respuesta['rol'] = $row['role'];
			
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