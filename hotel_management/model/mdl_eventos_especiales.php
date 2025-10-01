<?php
class EventosEspeciales {
    
    function cargarEventosEspeciales(){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT esp.id_evento,
					esp.nombre_evento, 
				    esp.descripcion, 
				    esp.fecha_evento, 
				    esp.hora_inicio, 
				    esp.hora_fin, 
				    esp.cupo, 
				    esp.estado,
				    usu.nombres AS nombre_instructor
				FROM eventos_especiales esp
				INNER JOIN usuarios usu ON usu.cedula = esp.instructor";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar los eventos especiales, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function guardarEventosEspeciales($nombre_evento,$descripcion,$fecha_evento,$hora_inicio,$hora_fin,$cupo,$estado,$instructor){
		$conexion = f_conectar();

		$sql = "INSERT INTO eventos_especiales(nombre_evento, descripcion, fecha_evento, hora_inicio, hora_fin, cupo, estado, instructor) VALUES ('$nombre_evento','$descripcion','$fecha_evento','$hora_inicio','$hora_fin',$cupo,'$estado',$instructor)";


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

	function seleccionarEventoEspecial($id_evento){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM eventos_especiales WHERE id_evento = $id_evento";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar el evento especial, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function editarEventosEspeciales($id_evento,$nombre_evento,$descripcion,$fecha_evento,$hora_inicio,$hora_fin,$cupo,$estado,$instructor){
		$conexion = f_conectar();

		$sql = "UPDATE eventos_especiales SET nombre_evento='$nombre_evento',descripcion='$descripcion',fecha_evento='$fecha_evento',hora_inicio='$hora_inicio',hora_fin='$hora_fin',estado='$estado',cupo=$cupo,estado='$estado',instructor=$instructor WHERE id_evento = $id_evento";


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

	function eliminarEventoEspecial($id_evento){
		$conexion = f_conectar();
		$data = array();

		$sql = "DELETE FROM eventos_especiales WHERE id_evento = $id_evento";
		$query = $conexion->query($sql);

		$sql = "DELETE FROM eventos_usuarios WHERE id_evento = $id_evento";
		$query = $conexion->query($sql);

		$respuesta['success'] = true;
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function cargarEventEsp(){
		$conexion = f_conectar();
		$data = array();

		$usuario_session = $_SESSION["cedula"];

		$sql = "SELECT esp.id_evento,
					esp.nombre_evento, 
					esp.descripcion, 
					esp.fecha_evento, 
					esp.hora_inicio, 
					esp.hora_fin, 
					esp.cupo, 
					esp.estado,
					usu.nombres AS nombre_instructor,
				    (SELECT COUNT(eu.id_evento_usuario) FROM eventos_usuarios eu WHERE eu.cedula = $usuario_session AND esp.id_evento = eu.id_evento) AS inscrito 
				FROM eventos_especiales esp
				INNER JOIN usuarios usu ON usu.cedula = esp.instructor
				WHERE esp.estado = 'Activo'";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar los eventos especiales, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function inscribirEventoEspecial($cedula, $id_evento){
		$conexion = f_conectar();

		$sql = "INSERT INTO eventos_usuarios(cedula, id_evento) VALUES ($cedula, $id_evento)";


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

	function cancelarEventoEspecial($cedula, $id_evento){
		$conexion = f_conectar();
		$data = array();

		$sql = "DELETE FROM eventos_usuarios WHERE id_evento = $id_evento AND cedula = $cedula";
		$query = $conexion->query($sql);

		$respuesta['success'] = true;
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}
}


?>