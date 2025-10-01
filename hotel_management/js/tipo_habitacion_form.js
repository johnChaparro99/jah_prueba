$(function () {
	$("#btn_guardar_tipo_hab").click(function(){
		guardarTipoHabitacion();
	});

	$("#btn_editar_tipo_hab").click(function(){
		editarTipoHabitacion();
	});

	cargarTipoHabitacion();
});

function cargarTipoHabitacion(){
	$.post('../controller/ctrl_tipo_habitacion.php', {accion:'cargarTipoHabitacion'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_tipo_habitacion').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function guardarTipoHabitacion(){
	let tipo = $('#tipo').val();
	let descripcion = $('#descripcion').val();

	if (tipo != '' && descripcion != '') {
		$.post('../controller/ctrl_tipo_habitacion.php', 
			{
				accion:'guardarTipoHabitacion',
				tipo: tipo,
				descripcion: descripcion
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	limpiarFormTipoHabitacion();
			    	cargarTipoHabitacion();
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
		  'Los campos de Tipo de habitación y Descripción son obligatorios',
		  'warning'
		);
	}
}

function seleccionarTipoHabitacion(id_tipo_habitacion){

	$.post('../controller/ctrl_tipo_habitacion.php', 
		{
			accion:'seleccionarTipoHabitacion',
			id_tipo_habitacion: id_tipo_habitacion,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	$('#id_tipo_habitacion').val(respuesta.data[0]['id']);
				$('#tipo').val(respuesta.data[0]['type']);
		    	$('#descripcion').val(respuesta.data[0]['description']);

				$('#btn_guardar_tipo_hab').addClass('oculto');
				$('#btn_editar_tipo_hab').removeClass('oculto');

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

function editarTipoHabitacion(){
	let id_tipo_habitacion = $('#id_tipo_habitacion').val();
	let tipo = $('#tipo').val();
	let descripcion = $('#descripcion').val();

	if (tipo != '' && descripcion != '') {
		$.post('../controller/ctrl_tipo_habitacion.php', 
			{
				accion:'editarTipoHabitacion',
				id_tipo_habitacion: id_tipo_habitacion,
				tipo: tipo,
				descripcion: descripcion
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	$('#btn_guardar_tipo_hab').removeClass('oculto');
					$('#btn_editar_tipo_hab').addClass('oculto');
			    	limpiarFormTipoHabitacion();
			    	cargarTipoHabitacion();
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
		  'Los Tipo de habitación y Descripción son obligatorios',
		  'warning'
		);
	}
}

function eliminarTipoHabitacion(id_tipo_habitacion){

	$.post('../controller/ctrl_tipo_habitacion.php', 
		{
			accion:'eliminarTipoHabitacion',
			id_tipo_habitacion: id_tipo_habitacion,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	cargarTipoHabitacion();
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

function limpiarFormTipoHabitacion(){
	$('#id_tipo_habitacion').val('');
	$('#tipo').val('');
	$('#descripcion').val('');
}