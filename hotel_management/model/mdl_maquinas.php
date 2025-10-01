<?php
class Maquinas {
    
    function cargarMaquinas(){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM maquinas";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar las maquinas, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function guardarMaquinas($nombre_maquina,$estado){
		$conexion = f_conectar();

		$sql = "INSERT INTO maquinas(nombre_maquina, estado) VALUES ('$nombre_maquina','$estado')";


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

	function seleccionarMaquina($id_maquina){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM maquinas WHERE id_maquinas = $id_maquina";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar la maquina, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function editarMaquinas($id_maquinas,$nombre_maquina,$estado){
		$conexion = f_conectar();

		$sql = "UPDATE maquinas SET nombre_maquina='$nombre_maquina',estado='$estado' WHERE id_maquinas = $id_maquinas";


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

	function eliminarMaquina($id_maquinas){
		$conexion = f_conectar();
		$data = array();

		$sql = "DELETE FROM maquinas WHERE id_maquinas = $id_maquinas";
		$query = $conexion->query($sql);

		$respuesta['success'] = true;
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}
}


?>