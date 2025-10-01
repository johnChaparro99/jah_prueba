<?php
class ValoracionMensual {
    
    function cargarValoracionMensual(){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT vm.id_valoracion_mensual,
					vm.fecha_valoracion_mensual, 
				    usu.nombres AS nombre_usuario
				FROM valoracion_mesual vm
				INNER JOIN usuarios usu ON usu.cedula = vm.cedula";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar las valoraciones mensuales, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function guardarValoracionMensual($cedula,$indice_masa_muscular,$cuello,$deltoides,$torax,$cintura,$abdomen,$cadera,$muslo,$pantorrilla,$brazo,$antebrazo,$espalda,$peso,$estatura,$evaluacion_postural,$somatotipo,$frecuencia_cardiaca_basal,$presion_arterial,$sistole,$subcapular,$triceps,$test_cinco_minutos,$test_wells,$test_brazos){
		$conexion = f_conectar();

		$sql = "INSERT INTO valoracion_mesual(cedula, fecha_valoracion_mensual, indice_masa_muscular, cuello, deltoides, torax, cintura, abdomen, cadera, muslo, pantorrilla, brazo, antebrazo, espalda, peso, estatura, evaluacion_postural, somatotipo, frecuencia_cardiaca_basal, presion_arterial, sistole, subcapular, triceps, test_cinco_minutos, test_wells, test_brazos) VALUES ($cedula,sysdate(),'$indice_masa_muscular',$cuello,$deltoides,$torax,$cintura,$abdomen,$cadera,$muslo,$pantorrilla,$brazo,$antebrazo,$espalda,$peso,$estatura,'$evaluacion_postural','$somatotipo',$frecuencia_cardiaca_basal,$presion_arterial,$sistole,$subcapular,$triceps,'$test_cinco_minutos','$test_wells','$test_brazos')";


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

	function seleccionarValoracionMensual($id_valoracion_mensual){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM valoracion_mesual WHERE id_valoracion_mensual = $id_valoracion_mensual";
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

	function editarValoracionMensual($id_valoracion_mensual,$cedula,$indice_masa_muscular,$cuello,$deltoides,$torax,$cintura,$abdomen,$cadera,$muslo,$pantorrilla,$brazo,$antebrazo,$espalda,$peso,$estatura,$evaluacion_postural,$somatotipo,$frecuencia_cardiaca_basal,$presion_arterial,$sistole,$subcapular,$triceps,$test_cinco_minutos,$test_wells,$test_brazos){
		$conexion = f_conectar();

		$sql = "UPDATE valoracion_mesual SET cedula=$cedula,indice_masa_muscular='$indice_masa_muscular',cuello=$cuello,deltoides=$deltoides,torax=$torax,cintura=$cintura,abdomen=$abdomen,cadera=$cadera,muslo=$muslo,pantorrilla=$pantorrilla,brazo=$brazo,antebrazo=$antebrazo,espalda=$espalda,peso=$peso,estatura=$estatura,evaluacion_postural='$evaluacion_postural',somatotipo='$somatotipo',frecuencia_cardiaca_basal=$frecuencia_cardiaca_basal,presion_arterial=$presion_arterial,sistole=$sistole,subcapular=$subcapular,triceps=$triceps,test_cinco_minutos='$test_cinco_minutos',test_wells='$test_wells',test_brazos='$test_brazos' WHERE id_valoracion_mensual = $id_valoracion_mensual";


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

	function eliminarValoracionMensual($id_valoracion_mensual){
		$conexion = f_conectar();
		$data = array();

		$sql = "DELETE FROM valoracion_mesual WHERE id_valoracion_mensual = $id_valoracion_mensual";
		$query = $conexion->query($sql);

		$respuesta['success'] = true;
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}

	function cargarAvances($cedula){
		$conexion = f_conectar();
		$data = array();

		$sql = "SELECT * FROM valoracion_mesual WHERE cedula = 111111";
		$query = $conexion->query($sql);
		if ($query->num_rows > 0) {
			while ( $row = mysqli_fetch_assoc($query)) {
				array_push($data, $row);				
			}
			$respuesta['success'] = true;
			$respuesta['data'] = $data;
		}else{
			$respuesta['success'] = false;
			$respuesta['message'] = 'Ha ocurrido un error al consultar la valoracion mensual, por favor comuníquese con el administrador del sistema.';
		}
		
		mysqli_close($conexion);
		//var_dump($respuesta);
		return json_encode($respuesta);
	}
}


?>