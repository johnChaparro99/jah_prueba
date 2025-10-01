<?php
class Diagnostico {
    
    function cargarDiagnostico(){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT dg.id_diagnostico,
					dg.fecha_valoracion, 
				    usu.nombres AS nombre_usuario
				FROM diagnosticos dg
				INNER JOIN usuarios usu ON usu.cedula = dg.cedula";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar los diagnosticos, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function guardarDiagnostico($cedula,$enfermedad_dermatologica,$diabetes,$vena_varice,$problemas_circulatorios,$hernias,$hipertencion_arterial,$tiroides,$alergias,$cuales_alergias,$toma_alcohol,$fuma,$tumores,$cancer,$implantes_metalicos,$marca_pasos,$problemas_columna,$cirugias,$cuales_cirugias,$toma_medicamentos,$cuales_medicamentos){
		$conexion = f_conectar();

		$sql = "INSERT INTO diagnosticos(cedula, fecha_valoracion, enfermedad_dermatologica, diabetes, vena_varice, problemas_circulatorios, hernias, hipertencion_arterial, tiroides, alergias, cuales_alergias, toma_alcohol, fuma, tumores, cancer, implantes_metalicos, marca_pasos, problemas_columna, cirugias, cuales_cirugias, toma_medicamentos, cuales_medicamentos) VALUES ($cedula,sysdate(),'$enfermedad_dermatologica','$diabetes','$vena_varice','$problemas_circulatorios','$hernias','$hipertencion_arterial','$tiroides','$alergias','$cuales_alergias','$toma_alcohol','$fuma','$tumores','$cancer','$implantes_metalicos','$marca_pasos','$problemas_columna','$cirugias','$cuales_cirugias','$toma_medicamentos','$cuales_medicamentos')";


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

	function seleccionarDiagnostico($id_diagnostico){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM diagnosticos WHERE id_diagnostico = $id_diagnostico";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar el diagnostico, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function editarDiagnostico($id_diagnostico,$cedula,$enfermedad_dermatologica,$diabetes,$vena_varice,$problemas_circulatorios,$hernias,$hipertencion_arterial,$tiroides,$alergias,$cuales_alergias,$toma_alcohol,$fuma,$tumores,$cancer,$implantes_metalicos,$marca_pasos,$problemas_columna,$cirugias,$cuales_cirugias,$toma_medicamentos,$cuales_medicamentos){
		$conexion = f_conectar();

		$sql = "UPDATE diagnosticos SET cedula=$cedula,enfermedad_dermatologica='$enfermedad_dermatologica',diabetes='$diabetes',vena_varice='$vena_varice',problemas_circulatorios='$problemas_circulatorios',hernias='$hernias',hipertencion_arterial='$hipertencion_arterial',tiroides='$tiroides',alergias='$alergias',cuales_alergias='$cuales_alergias',toma_alcohol='$toma_alcohol',fuma='$fuma',tumores='$tumores',cancer='$cancer',implantes_metalicos='$implantes_metalicos',marca_pasos='$marca_pasos',problemas_columna='$problemas_columna',cirugias='$cirugias',cuales_cirugias='$cuales_cirugias',toma_medicamentos='$toma_medicamentos',cuales_medicamentos='$cuales_medicamentos' WHERE id_diagnostico = $id_diagnostico";


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

	function eliminarDiagnostico($id_diagnostico){
		$conexion = f_conectar();
		$data = array();

		$sql = "DELETE FROM diagnosticos WHERE id_diagnostico = $id_diagnostico";
		$query = $conexion->query($sql);

		$respuesta['success'] = true;
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}
}


?>