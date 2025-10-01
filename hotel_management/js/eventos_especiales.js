$(function () {
	$("#btn_guardar_esp").click(function(){
		guardarEventosEspeciales();
	});

	$("#btn_editar_esp").click(function(){
		editarEventosEspeciales();
	});

	cargarEventosEspeciales();
	cargarInstructores();
});

function cargarEventosEspeciales(){
	$.post('../controller/ctrl_eventos_especiales.php', {accion:'cargarEventosEspeciales'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_eventos_especiales').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function guardarEventosEspeciales(){
	let nombre_evento = $('#nombre_evento').val();
	let descripcion = $('#descripcion').val();
	let fecha_evento = $('#fecha_evento').val();
	let hora_inicio = $('#hora_inicio').val();
	let hora_fin = $('#hora_fin').val();
	let cupo = $('#cupo').val();
	let estado = $('#estado_esp').val();
	let instructor = $('#instructor').val();

	if (nombre_evento != '' && fecha_evento != '' && hora_inicio != '' && instructor != '') {
		$.post('../controller/ctrl_eventos_especiales.php', 
			{
				accion:'guardarEventosEspeciales',
				nombre_evento: nombre_evento,
				descripcion: descripcion,
				fecha_evento: fecha_evento,
				hora_inicio: hora_inicio,
				hora_fin: hora_fin,
				cupo: cupo,
				estado: estado,
				instructor: instructor
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	limpiarFormEventosEspeciales();
			    	cargarEventosEspeciales();
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
		  'Los campos de Nombre del evento, Fecha de realización, Hora inicio y Instructor a cargo son obligatorios',
		  'warning'
		);
	}
}

function seleccionarEventoEspecial(id_evento){

	$.post('../controller/ctrl_eventos_especiales.php', 
		{
			accion:'seleccionarEventoEspecial',
			id_evento: id_evento,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	$('#id_evento').val(respuesta.data[0]['id_evento']);
				$('#nombre_evento').val(respuesta.data[0]['nombre_evento']);
				$('#descripcion').val(respuesta.data[0]['descripcion']);
				$('#fecha_evento').val(respuesta.data[0]['fecha_evento']);
				$('#hora_inicio').val(respuesta.data[0]['hora_inicio']);
				$('#hora_fin').val(respuesta.data[0]['hora_fin']);
				$('#cupo').val(respuesta.data[0]['cupo']);
				$('#estado_esp').val(respuesta.data[0]['estado']);
				$('#instructor').val(respuesta.data[0]['instructor']);

				$('#btn_guardar_esp').addClass('oculto');
				$('#btn_editar_esp').removeClass('oculto');

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

function editarEventosEspeciales(){
	let id_evento = $('#id_evento').val();
	let nombre_evento = $('#nombre_evento').val();
	let descripcion = $('#descripcion').val();
	let fecha_evento = $('#fecha_evento').val();
	let hora_inicio = $('#hora_inicio').val();
	let hora_fin = $('#hora_fin').val();
	let cupo = $('#cupo').val();
	let estado = $('#estado_esp').val();
	let instructor = $('#instructor').val();

	if (nombre_evento != '' && fecha_evento != '' && hora_inicio != '' && instructor != '') {
		$.post('../controller/ctrl_eventos_especiales.php', 
			{
				accion:'editarEventosEspeciales',
				id_evento: id_evento,
				nombre_evento: nombre_evento,
				descripcion: descripcion,
				fecha_evento: fecha_evento,
				hora_inicio: hora_inicio,
				hora_fin: hora_fin,
				cupo: cupo,
				estado: estado,
				instructor: instructor
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	$('#btn_guardar_esp').removeClass('oculto');
					$('#btn_editar_esp').addClass('oculto');
			    	limpiarFormEventosEspeciales();
			    	cargarEventosEspeciales();
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
		  'Los campos de Nombre del evento, Fecha de realización, Hora inicio y Instructor a cargo son obligatorios',
		  'warning'
		);
	}
}

function eliminarEventoEspecial(id_evento){

	$.post('../controller/ctrl_eventos_especiales.php', 
		{
			accion:'eliminarEventoEspecial',
			id_evento: id_evento
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	cargarEventosEspeciales();
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

function limpiarFormEventosEspeciales(){
	$('#id_evento').val('');
	$('#nombre_evento').val('');
	$('#descripcion').val('');
	$('#fecha_evento').val('');
	$('#hora_inicio').val('');
	$('#hora_fin').val('');
	$('#cupo').val('');
	$('#estado_esp').val('');
	$('#instructor').val('');
}

function cargarInstructores(){
	$.post('../controller/ctrl_usuarios.php', {accion:'cargarUsuariosRol', rol: 'Instructor'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);
	    let option = '';

	    if(respuesta.success){
	    	//console.log(respuesta.data);
	    	$.each( respuesta.data, function( key, value ) {
			  option += '<option value="'+value.cedula+'">'+(value.nombres+' '+value.apellidos)+'</option>';
			});
			$('#instructor').append(option);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}