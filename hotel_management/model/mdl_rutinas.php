<?php
class Rutinas {
    
    function cargarRutinas(){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT rt.cedula,
					usu.nombres,
				    usu.apellidos
				FROM rutinas rt
				INNER JOIN usuarios usu ON usu.cedula = rt.cedula
				GROUP BY usu.cedula";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar las Rutinas, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function guardarRutinas($cedula,$ejercicio_rt_1,$repeticiones_1,$series_1,$ejercicio_rt_2,$repeticiones_2,$series_2,$ejercicio_rt_3,$repeticiones_3,$series_3,$ejercicio_rt_4,$repeticiones_4,$series_4,$ejercicio_rt_5,$repeticiones_5,$series_5){
		$conexion = f_conectar();
		$sql = "";

		for ($i=1; $i <= 5; $i++) { 
			if ($i == 1) {
				$sql = "DELETE FROM rutinas WHERE cedula = $cedula";
				$query = $conexion->query($sql);
			}

			switch ($i) {
				case 1:
					$sql = "INSERT INTO rutinas(cedula, id_ejercicio, repeticiones, series) VALUES ($cedula,$ejercicio_rt_1, $repeticiones_1, $series_1)";
					break;

				case 2:
					$sql = "INSERT INTO rutinas(cedula, id_ejercicio, repeticiones, series) VALUES ($cedula,$ejercicio_rt_2, $repeticiones_2, $series_2)";
					break;

				case 3:
					$sql = "INSERT INTO rutinas(cedula, id_ejercicio, repeticiones, series) VALUES ($cedula,$ejercicio_rt_3, $repeticiones_3, $series_3)";
					break;

				case 4:
					$sql = "INSERT INTO rutinas(cedula, id_ejercicio, repeticiones, series) VALUES ($cedula,$ejercicio_rt_4, $repeticiones_4, $series_4)";
					break;

				case 5:
					$sql = "INSERT INTO rutinas(cedula, id_ejercicio, repeticiones, series) VALUES ($cedula,$ejercicio_rt_5, $repeticiones_5, $series_5)";
					break;
				
				
			}

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

		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function seleccionarRutina($cedula){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM rutinas WHERE cedula = $cedula";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar la rutina, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function eliminarRutina($cedula){
		$conexion = f_conectar();
		$data = array();

		$sql = "DELETE FROM rutinas WHERE cedula = $cedula";
		$query = $conexion->query($sql);

		$respuesta['success'] = true;
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function cargarRutinaAsignada($cedula){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT ej.grupo_muscular,
					ej.ejercicio,
				    rt.repeticiones,
				    rt.series
				FROM rutinas rt
				INNER JOIN usuarios usu ON usu.cedula = rt.cedula
				INNER JOIN ejercicios ej ON ej.id_ejercicio = rt.id_ejercicio
				WHERE rt.cedula = $cedula";

		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar la Dieta asignada, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}
}


?>