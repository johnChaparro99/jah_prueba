<?php 
include ('../conexion/conectar.php');
include('../model/mdl_valoracion_mesual.php');


$accion = $_POST['accion'];

switch ($accion) {
	case 'cargarValoracionMensual':
		cargarValoracionMensual();
		break;

		case 'guardarValoracionMensual':
		guardarValoracionMensual();
		break;

		case 'seleccionarValoracionMensual':
		seleccionarValoracionMensual();
		break;
	
		case 'editarValoracionMensual':
		editarValoracionMensual();
		break;

		case 'eliminarValoracionMensual':
		eliminarValoracionMensual();
		break;

		case 'cargarAvances':
		cargarAvances();
		break;
	
}

function cargarValoracionMensual(){
	$ValoracionMensual = new ValoracionMensual;
	$datos = json_decode($ValoracionMensual->cargarValoracionMensual());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->id_valoracion_mensual.'</th>';
				$tabla .= '<td>'.$value->nombre_usuario.'</td>';
				$tabla .= '<td>'.$value->fecha_valoracion_mensual.'</td>';
				$tabla .= '<td>';
					$tabla .= '<i class="fa fa-pencil" aria-hidden="true" style="margin-right: 15px;" onclick="seleccionarValoracionMensual('.$value->id_valoracion_mensual.')"></i>';
			        $tabla .= '<i class="fa fa-trash" aria-hidden="true" onclick="eliminarValoracionMensual('.$value->id_valoracion_mensual.')"></i>';
				$tabla .= '</td>';
			$tabla .= '</tr>';
		}

		$respuesta['success'] = true;
		$respuesta['tabla'] = $tabla;
	} else {
		$respuesta['success'] = false;
		$respuesta['message'] = $datos->message;
	}

	echo json_encode($respuesta);
}

function guardarValoracionMensual(){
	$ValoracionMensual = new ValoracionMensual;

	$cedula = $_POST['cedula'];
	$indice_masa_muscular = $_POST['indice_masa_muscular'];
	$cuello = $_POST['cuello'];
	$deltoides = $_POST['deltoides'];
	$torax = $_POST['torax'];
	$cintura = $_POST['cintura'];
	$abdomen = $_POST['abdomen'];
	$cadera = $_POST['cadera'];
	$muslo = $_POST['muslo'];
	$pantorrilla = $_POST['pantorrilla'];
	$brazo = $_POST['brazo'];
	$antebrazo = $_POST['antebrazo'];
	$espalda = $_POST['espalda'];
	$peso = $_POST['peso'];
	$estatura = $_POST['estatura'];
	$evaluacion_postural = $_POST['evaluacion_postural'];
	$somatotipo = $_POST['somatotipo'];
	$frecuencia_cardiaca_basal = $_POST['frecuencia_cardiaca_basal'];
	$presion_arterial = $_POST['presion_arterial'];
	$sistole = $_POST['sistole'];
	$subcapular = $_POST['subcapular'];
	$triceps = $_POST['triceps'];
	$test_cinco_minutos = $_POST['test_cinco_minutos'];
	$test_wells = $_POST['test_wells'];
	$test_brazos = $_POST['test_brazos'];

	$datos = json_decode($ValoracionMensual->guardarValoracionMensual($cedula,$indice_masa_muscular,$cuello,$deltoides,$torax,$cintura,$abdomen,$cadera,$muslo,$pantorrilla,$brazo,$antebrazo,$espalda,$peso,$estatura,$evaluacion_postural,$somatotipo,$frecuencia_cardiaca_basal,$presion_arterial,$sistole,$subcapular,$triceps,$test_cinco_minutos,$test_wells,$test_brazos));
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		$respuesta['success'] = true;
		$respuesta['message'] = $datos->message;
	} else {
		$respuesta['success'] = false;
		$respuesta['message'] = $datos->message;
	}

	echo json_encode($respuesta);
}

function seleccionarValoracionMensual(){
	$ValoracionMensual = new ValoracionMensual;

	$id_valoracion_mensual = $_POST['id_valoracion_mensual'];

	$datos = json_decode($ValoracionMensual->seleccionarValoracionMensual($id_valoracion_mensual));
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {

		$respuesta['success'] = true;
		$respuesta['data'] = $datos->data;
	} else {
		$respuesta['success'] = false;
		$respuesta['message'] = $datos->message;
	}

	echo json_encode($respuesta);
}

function editarValoracionMensual(){
	$ValoracionMensual = new ValoracionMensual;

	$id_valoracion_mensual = $_POST['id_valoracion_mensual'];
	$cedula = $_POST['cedula'];
	$indice_masa_muscular = $_POST['indice_masa_muscular'];
	$cuello = $_POST['cuello'];
	$deltoides = $_POST['deltoides'];
	$torax = $_POST['torax'];
	$cintura = $_POST['cintura'];
	$abdomen = $_POST['abdomen'];
	$cadera = $_POST['cadera'];
	$muslo = $_POST['muslo'];
	$pantorrilla = $_POST['pantorrilla'];
	$brazo = $_POST['brazo'];
	$antebrazo = $_POST['antebrazo'];
	$espalda = $_POST['espalda'];
	$peso = $_POST['peso'];
	$estatura = $_POST['estatura'];
	$evaluacion_postural = $_POST['evaluacion_postural'];
	$somatotipo = $_POST['somatotipo'];
	$frecuencia_cardiaca_basal = $_POST['frecuencia_cardiaca_basal'];
	$presion_arterial = $_POST['presion_arterial'];
	$sistole = $_POST['sistole'];
	$subcapular = $_POST['subcapular'];
	$triceps = $_POST['triceps'];
	$test_cinco_minutos = $_POST['test_cinco_minutos'];
	$test_wells = $_POST['test_wells'];
	$test_brazos = $_POST['test_brazos'];

	$datos = json_decode($ValoracionMensual->editarValoracionMensual($id_valoracion_mensual,$cedula,$indice_masa_muscular,$cuello,$deltoides,$torax,$cintura,$abdomen,$cadera,$muslo,$pantorrilla,$brazo,$antebrazo,$espalda,$peso,$estatura,$evaluacion_postural,$somatotipo,$frecuencia_cardiaca_basal,$presion_arterial,$sistole,$subcapular,$triceps,$test_cinco_minutos,$test_wells,$test_brazos));
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		$respuesta['success'] = true;
		$respuesta['message'] = $datos->message;
	} else {
		$respuesta['success'] = false;
		$respuesta['message'] = $datos->message;
	}

	echo json_encode($respuesta);
}

function eliminarValoracionMensual(){
	$ValoracionMensual = new ValoracionMensual;

	$id_valoracion_mensual = $_POST['id_valoracion_mensual'];

	$datos = json_decode($ValoracionMensual->eliminarValoracionMensual($id_valoracion_mensual));
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {

		$respuesta['success'] = true;
	} else {
		$respuesta['success'] = false;
		$respuesta['message'] = $datos->message;
	}

	echo json_encode($respuesta);
}

function cargarAvances(){
	$ValoracionMensual = new ValoracionMensual;

	$cedula = $_POST['cedula'];

	$datos = json_decode($ValoracionMensual->cargarAvances($cedula));
	$tabla = '';
	$fechas = '';
	$contenido = '';
	$cuello = '';
	$deltoides = '';
	$torax = '';
	$cintura = '';
	$abdomen = '';
	$cadera = '';
	$muslo = '';
	$pantorrilla = '';
	$brazo = '';
	$antebrazo = '';
	$espalda = '';
	$triceps = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {

		foreach ($datos->data as $key => $value) {
			$cuello .= '<td>'.$value->cuello.'</td>';
			$deltoides .= '<td>'.$value->deltoides.'</td>';
			$torax .= '<td>'.$value->torax.'</td>';
			$cintura .= '<td>'.$value->cintura.'</td>';
			$abdomen .= '<td>'.$value->abdomen.'</td>';
			$cadera .= '<td>'.$value->cadera.'</td>';
			$muslo .= '<td>'.$value->muslo.'</td>';
			$pantorrilla .= '<td>'.$value->pantorrilla.'</td>';
			$brazo .= '<td>'.$value->brazo.'</td>';
			$antebrazo .= '<td>'.$value->antebrazo.'</td>';
			$espalda .= '<td>'.$value->espalda.'</td>';
			$triceps .= '<td>'.$value->triceps.'</td>';	
		}

		foreach ($datos->data as $key => $value) {
			$fechas .= '<th scope="col">'.$value->fecha_valoracion_mensual.'</th>';

			$contenido .= '<tr>';
				$contenido .= '<th scope="row">Cuello</th>';
				$contenido .= $cuello;
			$contenido .= '</tr>';
			$contenido .= '<tr>';
				$contenido .= '<th scope="row">Deltoides</th>';
				$contenido .= $deltoides;
			$contenido .= '</tr>';
			$contenido .= '<tr>';
				$contenido .= '<th scope="row">Torax</th>';
				$contenido .= $torax;
			$contenido .= '</tr>';
			$contenido .= '<tr>';
				$contenido .= '<th scope="row">Cintura</th>';
				$contenido .= $cintura;
			$contenido .= '</tr>';
			$contenido .= '<tr>';
				$contenido .= '<th scope="row">Abdomen</th>';
				$contenido .= $abdomen;
			$contenido .= '</tr>';
			$contenido .= '<tr>';
				$contenido .= '<th scope="row">Cadera</th>';
				$contenido .= $cadera;
			$contenido .= '</tr>';
			$contenido .= '<tr>';
				$contenido .= '<th scope="row">Muslo</th>';
				$contenido .= $muslo;
			$contenido .= '</tr>';
			$contenido .= '<tr>';
				$contenido .= '<th scope="row">Pantorrilla</th>';
				$contenido .= $pantorrilla;
			$contenido .= '</tr>';
			$contenido .= '<tr>';
				$contenido .= '<th scope="row">Brazo</th>';
				$contenido .= $brazo;
			$contenido .= '</tr>';
			$contenido .= '<tr>';
				$contenido .= '<th scope="row">Antebrazo</th>';
				$contenido .= $antebrazo;
			$contenido .= '</tr>';
			$contenido .= '<tr>';
				$contenido .= '<th scope="row">Espalda</th>';
				$contenido .= $espalda;
			$contenido .= '</tr>';
			$contenido .= '<tr>';
				$contenido .= '<th scope="row">Triceps</th>';
				$contenido .= $triceps;
			$contenido .= '</tr>';
		}


		$tabla .= '<table class="table table-striped">';
          $tabla .= '<thead>';
            $tabla .= '<tr>';
              $tabla .= '<th scope="col">Musculo</th>';
              $tabla .= $fechas;
            $tabla .= '</tr>';
          $tabla .= '</thead>';
          $tabla .= '<tbody id="tb_ver_avances">';
          $tabla .= $contenido;
          $tabla .= '</tbody>';
        $tabla .= '</table>';

		$respuesta['success'] = true;
		$respuesta['tabla'] = $tabla;
	} else {
		$respuesta['success'] = false;
		$respuesta['message'] = $datos->message;
	}

	echo json_encode($respuesta);
}

?>