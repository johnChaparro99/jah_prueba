<?php
class tipoHabitacion {
    
    function cargarTipoHabitacion(){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM room_types";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar los tipos de habitacion, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function guardarTipoHabitacion($tipo,$descripcion){
		$conexion = f_conectar();

		$sql = "INSERT INTO room_types (type, description) VALUES ('$tipo', '$descripcion')";


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

	function seleccionarTipoHabitacion($id_tipo_habitacion){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM room_types WHERE id = $id_tipo_habitacion";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar el tipo de habitacion, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function editarTipoHabitacion($id_tipo_habitacion,$tipo,$descripcion){
		$conexion = f_conectar();

		$sql = "UPDATE room_types SET type='$tipo',description='$descripcion' WHERE id = $id_tipo_habitacion";

		//var_dump($sql);
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

	function eliminarTipoHabitacion($id_tipo_habitacion){
		$conexion = f_conectar();
		$data = array();

		$sql = "DELETE FROM room_types WHERE id = $id_tipo_habitacion";
		$query = $conexion->query($sql);

		$respuesta['success'] = true;
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

}


?>