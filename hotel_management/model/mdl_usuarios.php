<?php
class Usuarios {
    
    function cargarUsuarios(){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM usuarios";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar los usuarios, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function guardarUsuarios($cedula,$tipo_documento,$nombres,$apellidos,$fecha_nacimiento,$direccion,$telefono,$email,$genero,$contrasena,$estado,$rol){
		$conexion = f_conectar();

		$sql = "INSERT INTO usuarios(cedula, tipo_documento, nombres, apellidos, fecha_nacimiento, direccion, telefono, email, genero, contrasena, estado, rol) VALUES ($cedula,'$tipo_documento','$nombres','$apellidos','$fecha_nacimiento','$direccion','$telefono','$email','$genero','$contrasena','$estado', '$rol')";


		if(mysqli_query($conexion,$sql))
		{
			$respuesta['success'] = true;
			$respuesta['message'] = "registro insertado";
		}
		else
		{
			$respuesta['success'] = false;
			$respuesta['message'] = "error insertando: ".$sql.mysqli_error($conexion);
		}
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function seleccionarUsuario($cedula){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM usuarios WHERE cedula = $cedula";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar el usuario, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function editarUsuarios($cedula,$tipo_documento,$nombres,$apellidos,$fecha_nacimiento,$direccion,$telefono,$email,$genero,$contrasena,$estado,$rol){
		$conexion = f_conectar();

		$sql = "UPDATE usuarios SET tipo_documento='$tipo_documento',nombres='$nombres',apellidos='$apellidos',fecha_nacimiento='$fecha_nacimiento',direccion='$direccion',telefono='$telefono',email='$email',genero='$genero',contrasena='$contrasena',estado='$estado', rol='$rol' WHERE cedula = $cedula";


		if(mysqli_query($conexion,$sql))
		{
			$respuesta['success'] = true;
			$respuesta['message'] = "registro actualizado";
		}
		else
		{
			$respuesta['success'] = false;
			$respuesta['message'] = "error actualizando: ".$sql.mysqli_error($conexion);
		}
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function eliminarUsuario($cedula){
		$conexion = f_conectar();
		$data = array();

		$sql = "DELETE FROM usuarios WHERE cedula = $cedula";
		$query = $conexion->query($sql);

		$respuesta['success'] = true;
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function cargarUsuariosRol($rol){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM usuarios WHERE rol = '$rol' AND estado = 'Activo'";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultsar los $rol, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}
}


?>