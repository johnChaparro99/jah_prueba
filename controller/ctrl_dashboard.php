<?php 
include ('../conexion/conectar.php');
include('../model/mdl_dashboard.php');


$accion = $_POST['accion'];

switch ($accion) {
	case 'cargarVentasTotales':
		cargarVentasTotales();
		break;

	case 'cargarNumeroOrdenes':
		cargarNumeroOrdenes();
		break;

	case 'cargarTicketPromedio':
		cargarTicketPromedio();
		break;

	case 'cargarTopProductos':
		cargarTopProductos();
		break;
	
}

function cargarVentasTotales(){
	$Dashboard = new Dashboard;
	$datos = json_decode($Dashboard->cargarVentasTotales());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->ventas_totales.'</th>';
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

function cargarNumeroOrdenes(){
	$Dashboard = new Dashboard;
	$datos = json_decode($Dashboard->cargarNumeroOrdenes());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->numero_ordenes.'</th>';
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

function cargarTicketPromedio(){
	$Dashboard = new Dashboard;
	$datos = json_decode($Dashboard->cargarTicketPromedio());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->ticket_promedio .'</th>';
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

function cargarTopProductos(){
	$Dashboard = new Dashboard;
	$datos = json_decode($Dashboard->cargarTopProductos());
	$tabla = '';
	$respuesta = array();

	//var_dump($datos->data);
	if ($datos->success) {
		foreach ($datos->data as $key => $value) {
			$tabla .= '<tr>';
				$tabla .= '<th scope="row">'.$value->name .'</th>';
				$tabla .= '<th scope="row">'.$value->total_vendidos .'</th>';
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

?>