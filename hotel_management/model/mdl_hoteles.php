<?php
class Hoteles {
    
    function cargarHoteles(){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM hotels";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar los hoteles, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function guardarHoteles($nombre_hotel,$direccion_hotel,$ciudad_hotel,$nit,$numero_cuartos){
		$conexion = f_conectar();

		$sql = "INSERT INTO hotels (name, address, city, nit, number_of_rooms) VALUES ('$nombre_hotel', '$direccion_hotel','$ciudad_hotel', '$nit',$numero_cuartos)";


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

	function seleccionarHotel($id_hotel){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM hotels WHERE id = $id_hotel";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar el hotel, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function editarHoteles($id_hotel,$nombre_hotel,$direccion_hotel,$ciudad_hotel,$nit,$numero_cuartos){
		$conexion = f_conectar();

		$sql = "UPDATE hotels SET name='$nombre_hotel',address='$direccion_hotel',city='$ciudad_hotel',nit='$nit',number_of_rooms=$numero_cuartos WHERE id = $id_hotel";

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

	function eliminarHotel($id_hotel){
		$conexion = f_conectar();
		$data = array();

		$sql = "DELETE FROM hotels WHERE id = $id_hotel";
		$query = $conexion->query($sql);

		$respuesta['success'] = true;
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function cargarListaAlimentos(){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM alimentos WHERE estado = 'Activo'";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultsar los alimentos, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}
}


?>