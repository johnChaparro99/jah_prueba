$(function () {
	$("#btn_guardar_hotel").click(function(){
		guardarHoteles();
	});

	$("#btn_editar_hotel").click(function(){
		editarHoteles();
	});

	cargarHoteles();
});

function cargarHoteles(){
	$.post('../controller/ctrl_hoteles.php', {accion:'cargarHoteles'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_hoteles').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function guardarHoteles(){
	let nombre_hotel = $('#nombre_hotel').val();
	let direccion_hotel = $('#direccion_hotel').val();
	let ciudad_hotel = $('#ciudad_hotel').val();
	let nit = $('#nit').val();
	let numero_cuartos = $('#numero_cuartos').val();

	if (nombre_hotel != '' && direccion_hotel != '' && ciudad_hotel != '' && nit != '' && numero_cuartos != '') {
		$.post('../controller/ctrl_hoteles.php', 
			{
				accion:'guardarHoteles',
				nombre_hotel: nombre_hotel,
				direccion_hotel: direccion_hotel,
				ciudad_hotel: ciudad_hotel,
				nit: nit,
				numero_cuartos: numero_cuartos
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	limpiarFormHoteles();
			    	cargarHoteles();
			    }else{
			    	Swal.fire(
					  'Error!',
					  respuesta.message,
					  'error'
					);
			    }
		});
	} else {
		Swal.fire(
		  'Ojo!',
		  'Los campos de Nombre del hotel, Dirección, Ciudad, Nit y Numero de cuartos son obligatorios',
		  'warning'
		);
	}
}

function seleccionarHotel(id_hotel){

	$.post('../controller/ctrl_hoteles.php', 
		{
			accion:'seleccionarHotel',
			id_hotel: id_hotel,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	$('#id_hotel').val(respuesta.data[0]['id']);
				$('#nombre_hotel').val(respuesta.data[0]['name']);
		    	$('#direccion_hotel').val(respuesta.data[0]['address']);
				$('#ciudad_hotel').val(respuesta.data[0]['city']);
				$('#nit').val(respuesta.data[0]['nit']);
				$('#numero_cuartos').val(respuesta.data[0]['number_of_rooms']);

				$('#btn_guardar_hotel').addClass('oculto');
				$('#btn_editar_hotel').removeClass('oculto');

				Swal.fire(
				  'Hecho!',
				  'Registro cargado',
				  'success'
				);
		    }else{
		    	Swal.fire(
				  'Error!',
				  respuesta.message,
				  'error'
				);
		    }
	});
	
}

function editarHoteles(){
	let id_hotel = $('#id_hotel').val();
	let nombre_hotel = $('#nombre_hotel').val();
	let direccion_hotel = $('#direccion_hotel').val();
	let ciudad_hotel = $('#ciudad_hotel').val();
	let nit = $('#nit').val();
	let numero_cuartos = $('#numero_cuartos').val();

	if (nombre_hotel != '' && direccion_hotel != '' && ciudad_hotel != '' && nit != '' && numero_cuartos != '') {
		$.post('../controller/ctrl_hoteles.php', 
			{
				accion:'editarHoteles',
				id_hotel: id_hotel,
				nombre_hotel: nombre_hotel,
				direccion_hotel: direccion_hotel,
				ciudad_hotel: ciudad_hotel,
				nit: nit,
				numero_cuartos: numero_cuartos
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	$('#btn_guardar_hotel').removeClass('oculto');
					$('#btn_editar_hotel').addClass('oculto');
			    	limpiarFormHoteles();
			    	cargarHoteles();
			    }else{
			    	Swal.fire(
					  'Error!',
					  respuesta.message,
					  'error'
					);
			    }
		});
	} else {
		Swal.fire(
		  'Ojo!',
		  'Los campos de Nombre del hotel, Dirección, Ciudad, Nit y Numero de cuartos son obligatorios',
		  'warning'
		);
	}
}

function eliminarHotel(id_hotel){

	$.post('../controller/ctrl_hoteles.php', 
		{
			accion:'eliminarHotel',
			id_hotel: id_hotel,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	cargarHoteles();
				Swal.fire(
				  'Hecho!',
				  'Registro Eliminado',
				  'success'
				);
		    }else{
		    	Swal.fire(
				  'Error!',
				  respuesta.message,
				  'error'
				);
		    }
	});
	
}

function limpiarFormHoteles(){
	$('#id_hotel').val('');
	$('#nombre_hotel').val('');
	$('#direccion_hotel').val('');
	$('#ciudad_hotel').val('');
	$('#nit').val('');
	$('#numero_cuartos').val('');
}