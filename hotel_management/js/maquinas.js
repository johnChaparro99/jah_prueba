$(function () {
	$("#btn_guardar_maq").click(function(){
		guardarMaquinas();
	});

	$("#btn_editar_maq").click(function(){
		editarMaquinas();
	});

	cargarMaquinas();
});

function cargarMaquinas(){
	$.post('../controller/ctrl_maquinas.php', {accion:'cargarMaquinas'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_maquinas').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function guardarMaquinas(){
	let nombre_maquina = $('#nombre_maquina').val();
	let estado = $('#estado_m').val();

	if (nombre_maquina != '' && estado != '') {
		$.post('../controller/ctrl_maquinas.php', 
			{
				accion:'guardarMaquinas',
				nombre_maquina: nombre_maquina,
				estado: estado
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	limpiarFormMaquina();
			    	cargarMaquinas();
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
		  'Los campos de Nombre de la máquina y estado son obligatorios',
		  'warning'
		);
	}
}

function seleccionarMaquina(id_maquina){

	$.post('../controller/ctrl_maquinas.php', 
		{
			accion:'seleccionarMaquina',
			id_maquina: id_maquina,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	$('#id_maquinas').val(respuesta.data[0]['id_maquinas']);
				$('#nombre_maquina').val(respuesta.data[0]['nombre_maquina']);
				$('#estado_m').val(respuesta.data[0]['estado']);

				$('#btn_guardar_maq').addClass('oculto');
				$('#btn_editar_maq').removeClass('oculto');

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

function editarMaquinas(){
	let id_maquinas = $('#id_maquinas').val();
	let nombre_maquina = $('#nombre_maquina').val();
	let estado = $('#estado_m').val();

	if (nombre_maquina != '' && estado != '') {
		$.post('../controller/ctrl_maquinas.php', 
			{
				accion:'editarMaquinas',
				id_maquinas: id_maquinas,
				nombre_maquina: nombre_maquina,
				estado: estado
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	$('#btn_guardar_maq').removeClass('oculto');
					$('#btn_editar_maq').addClass('oculto');
			    	limpiarFormMaquina();
			    	cargarMaquinas();
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
		  'Los campos de Nombre de la máquina y estado son obligatorios',
		  'warning'
		);
	}
}

function eliminarMaquina(id_maquinas){

	$.post('../controller/ctrl_maquinas.php', 
		{
			accion:'eliminarMaquina',
			id_maquinas: id_maquinas,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	cargarMaquinas();
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

function limpiarFormMaquina(){
	$('#id_maquinas').val('');
	$('#nombre_maquina').val('');
	$('#estado_m').val('');
}