$(function () {
	$("#btn_guardar_rt").click(function(){
		guardarRutinas();
	});

	$("#btn_editar_rt").click(function(){
		guardarRutinas();
	});

	cargarListaEjerciciosRt();
	cargarListaUsuariosRt();
	cargarRutinas();
});

function cargarRutinas(){
	$.post('../controller/ctrl_rutinas.php', {accion:'cargarRutinas'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_rutina').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function guardarRutinas(){
	let cedula = $('#cedula_rt').val();
	let ejercicio_rt_1 = $('#ejercicio_rt_1').val();
	let repeticiones_1 = $('#repeticiones_1').val();
	let series_1 = $('#series_1').val();
	let ejercicio_rt_2 = $('#ejercicio_rt_2').val();
	let repeticiones_2 = $('#repeticiones_2').val();
	let series_2 = $('#series_2').val();
	let ejercicio_rt_3 = $('#ejercicio_rt_3').val();
	let repeticiones_3 = $('#repeticiones_3').val();
	let series_3 = $('#series_3').val();
	let ejercicio_rt_4 = $('#ejercicio_rt_4').val();
	let repeticiones_4 = $('#repeticiones_4').val();
	let series_4 = $('#series_4').val();
	let ejercicio_rt_5 = $('#ejercicio_rt_5').val();
	let repeticiones_5 = $('#repeticiones_5').val();
	let series_5 = $('#series_5').val();

	if (nombre_maquina != '' && estado != '') {
		$.post('../controller/ctrl_rutinas.php', 
			{
				accion:'guardarRutinas',
				cedula: cedula,
				ejercicio_rt_1: ejercicio_rt_1,
				repeticiones_1: repeticiones_1,
				series_1: series_1,
				ejercicio_rt_2: ejercicio_rt_2,
				repeticiones_2: repeticiones_2,
				series_2: series_2,
				ejercicio_rt_3: ejercicio_rt_3,
				repeticiones_3: repeticiones_3,
				series_3: series_3,
				ejercicio_rt_4: ejercicio_rt_4,
				repeticiones_4: repeticiones_4,
				series_4: series_4,
				ejercicio_rt_5: ejercicio_rt_5,
				repeticiones_5: repeticiones_5,
				series_5: series_5
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	limpiarFormRutina();
			    	cargarRutinas();
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

function seleccionarRutina(cedula){

	$.post('../controller/ctrl_rutinas.php', 
		{
			accion:'seleccionarRutina',
			cedula: cedula,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){

		    	$contador = 1;
		    	$('#cedula_rt').val(respuesta.data[0]['cedula']);

		    	for (var i = 0; i <= 4; i++) {
		    		$('#ejercicio_rt_'+$contador).val(respuesta.data[i]['id_ejercicio']);
					$('#repeticiones_'+$contador).val(respuesta.data[i]['repeticiones']);
					$('#series_'+$contador).val(respuesta.data[i]['series']);

					$contador++;
		    	}

				$('#btn_guardar_dt').addClass('oculto');
				$('#btn_editar_dt').removeClass('oculto');

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

function eliminarRutina(cedula){

	$.post('../controller/ctrl_rutinas.php', 
		{
			accion:'eliminarRutina',
			cedula: cedula,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	cargarRutinas();
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

function limpiarFormRutina(){
	$('#cedula_rt').val('');
	$('#ejercicio_rt_1').val('');
	$('#repeticiones_1').val('');
	$('#series_1').val('');
	$('#ejercicio_rt_2').val('');
	$('#repeticiones_2').val('');
	$('#series_2').val('');
	$('#ejercicio_rt_3').val('');
	$('#repeticiones_3').val('');
	$('#series_3').val('');
	$('#ejercicio_rt_4').val('');
	$('#repeticiones_4').val('');
	$('#series_4').val('');
	$('#ejercicio_rt_5').val('');
	$('#repeticiones_5').val('');
	$('#series_5').val('');
}

function cargarListaUsuariosRt(){
	$.post('../controller/ctrl_usuarios.php', {accion:'cargarUsuariosRol', rol: 'Usuario'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);
	    let option = '';

	    if(respuesta.success){
	    	//console.log(respuesta.data);
	    	$.each( respuesta.data, function( key, value ) {
			  option += '<option value="'+value.cedula+'">'+(value.nombres+' '+value.apellidos)+'</option>';
			});
			$('#cedula_rt').append(option);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function cargarListaEjerciciosRt(){
	$.post('../controller/ctrl_ejercicios.php', {accion:'cargarListaEjercicios'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);
	    let option = '';

	    if(respuesta.success){
	    	//console.log(respuesta.data);
	    	$.each( respuesta.data, function( key, value ) {
			  option += '<option value="'+value.id_ejercicio+'">'+value.ejercicio+'</option>';
			});
			$('#ejercicio_rt_1').append(option);
			$('#ejercicio_rt_2').append(option);
			$('#ejercicio_rt_3').append(option);
			$('#ejercicio_rt_4').append(option);
			$('#ejercicio_rt_5').append(option);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}