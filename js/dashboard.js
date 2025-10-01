$(function () {
	validarRolUsuario();
	cargarVentasTotales();
	cargarNumeroOrdenes();
	cargarTicketPromedio();
	cargarTopProductos();
});

function cargarVentasTotales(){
	$.post('../controller/ctrl_dashboard.php', {accion:'cargarVentasTotales'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_ventas_totales').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function cargarNumeroOrdenes(){
	$.post('../controller/ctrl_dashboard.php', {accion:'cargarNumeroOrdenes'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_numero_ordenes').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function cargarTicketPromedio(){
	$.post('../controller/ctrl_dashboard.php', {accion:'cargarTicketPromedio'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_ticket_promedio').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function cargarTopProductos(){
	$.post('../controller/ctrl_dashboard.php', {accion:'cargarTopProductos'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_top_productos').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

