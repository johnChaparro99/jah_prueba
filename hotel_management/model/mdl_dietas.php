<?php
class Dietas {
    
    function cargarDietas(){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT dt.cedula,
					usu.nombres,
				    usu.apellidos
				FROM dietas dt
				INNER JOIN usuarios usu ON usu.cedula = dt.cedula
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
			$respuesta['message'] = 'Ha ocurrido un error al consultar las Dietas, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function guardarDietas($cedula,$alimento_dt_1,$porcion_1,$cantidad_1,$alimento_dt_2,$porcion_2,$cantidad_2,$alimento_dt_3,$porcion_3,$cantidad_3,$alimento_dt_4,$porcion_4,$cantidad_4,$alimento_dt_5,$porcion_5,$cantidad_5){
		$conexion = f_conectar();
		$sql = "";

		for ($i=1; $i <= 5; $i++) { 
			if ($i == 1) {
				$sql = "DELETE FROM dietas WHERE cedula = $cedula";
				$query = $conexion->query($sql);
			}

			switch ($i) {
				case 1:
					$sql = "INSERT INTO dietas(cedula, id_alimento, porciones, cantidad) VALUES ($cedula,$alimento_dt_1, $porcion_1, $cantidad_1)";
					break;

				case 2:
					$sql = "INSERT INTO dietas(cedula, id_alimento, porciones, cantidad) VALUES ($cedula,$alimento_dt_2, $porcion_2, $cantidad_2)";
					break;

				case 3:
					$sql = "INSERT INTO dietas(cedula, id_alimento, porciones, cantidad) VALUES ($cedula,$alimento_dt_3, $porcion_3, $cantidad_3)";
					break;

				case 4:
					$sql = "INSERT INTO dietas(cedula, id_alimento, porciones, cantidad) VALUES ($cedula,$alimento_dt_4, $porcion_4, $cantidad_4)";
					break;

				case 5:
					$sql = "INSERT INTO dietas(cedula, id_alimento, porciones, cantidad) VALUES ($cedula,$alimento_dt_5, $porcion_5, $cantidad_5)";
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

	function seleccionarDieta($cedula){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM dietas WHERE cedula = $cedula";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar la dieta, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function eliminarDieta($cedula){
		$conexion = f_conectar();
		$data = array();

		$sql = "DELETE FROM dietas WHERE cedula = $cedula";
		$query = $conexion->query($sql);

		$respuesta['success'] = true;
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function cargarDietaAsignada($cedula){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT al.grupo_alimenticio,
					al.alimento,
				    dt.porciones,
				    dt.cantidad
				FROM dietas dt
				INNER JOIN usuarios usu ON usu.cedula = dt.cedula
				INNER JOIN alimentos al ON al.id_alimentos = dt.id_alimento
				WHERE dt.cedula = $cedula";

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