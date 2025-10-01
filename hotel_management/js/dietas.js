$(function () {
	$("#btn_guardar_dt").click(function(){
		guardarDietas();
	});

	$("#btn_editar_dt").click(function(){
		guardarDietas();
	});

	cargarListaAlimentosDt();
	cargarListaUsuariosDt();
	cargarDietas();
});

function cargarDietas(){
	$.post('../controller/ctrl_dietas.php', {accion:'cargarDietas'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_dieta').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function guardarDietas(){
	let cedula = $('#cedula_dt').val();
	let alimento_dt_1 = $('#alimento_dt_1').val();
	let porcion_1 = $('#porcion_1').val();
	let cantidad_1 = $('#cantidad_1').val();
	let alimento_dt_2 = $('#alimento_dt_2').val();
	let porcion_2 = $('#porcion_2').val();
	let cantidad_2 = $('#cantidad_2').val();
	let alimento_dt_3 = $('#alimento_dt_3').val();
	let porcion_3 = $('#porcion_3').val();
	let cantidad_3 = $('#cantidad_3').val();
	let alimento_dt_4 = $('#alimento_dt_4').val();
	let porcion_4 = $('#porcion_4').val();
	let cantidad_4 = $('#cantidad_4').val();
	let alimento_dt_5 = $('#alimento_dt_5').val();
	let porcion_5 = $('#porcion_5').val();
	let cantidad_5 = $('#cantidad_5').val();

	if (nombre_maquina != '' && estado != '') {
		$.post('../controller/ctrl_dietas.php', 
			{
				accion:'guardarDietas',
				cedula: cedula,
				alimento_dt_1: alimento_dt_1,
				porcion_1: porcion_1,
				cantidad_1: cantidad_1,
				alimento_dt_2: alimento_dt_2,
				porcion_2: porcion_2,
				cantidad_2: cantidad_2,
				alimento_dt_3: alimento_dt_3,
				porcion_3: porcion_3,
				cantidad_3: cantidad_3,
				alimento_dt_4: alimento_dt_4,
				porcion_4: porcion_4,
				cantidad_4: cantidad_4,
				alimento_dt_5: alimento_dt_5,
				porcion_5: porcion_5,
				cantidad_5: cantidad_5
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	limpiarFormDieta();
			    	cargarDietas();
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

function seleccionarDieta(cedula){

	$.post('../controller/ctrl_dietas.php', 
		{
			accion:'seleccionarDieta',
			cedula: cedula,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){

		    	$contador = 1;
		    	$('#cedula_dt').val(respuesta.data[0]['cedula']);

		    	for (var i = 0; i <= 4; i++) {
		    		$('#alimento_dt_'+$contador).val(respuesta.data[i]['id_alimento']);
					$('#porcion_'+$contador).val(respuesta.data[i]['porciones']);
					$('#cantidad_'+$contador).val(respuesta.data[i]['cantidad']);

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


function eliminarDieta(cedula){

	$.post('../controller/ctrl_dietas.php', 
		{
			accion:'eliminarDieta',
			cedula: cedula,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	cargarDietas();
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

function limpiarFormDieta(){
	$('#cedula_dt').val('');
	$('#alimento_dt_1').val('');
	$('#porcion_1').val('');
	$('#cantidad_1').val('');
	$('#alimento_dt_2').val('');
	$('#porcion_2').val('');
	$('#cantidad_2').val('');
	$('#alimento_dt_3').val('');
	$('#porcion_3').val('');
	$('#cantidad_3').val('');
	$('#alimento_dt_4').val('');
	$('#porcion_4').val('');
	$('#cantidad_4').val('');
	$('#alimento_dt_5').val('');
	$('#porcion_5').val('');
	$('#cantidad_5').val('');
}

function cargarListaUsuariosDt(){
	$.post('../controller/ctrl_usuarios.php', {accion:'cargarUsuariosRol', rol: 'Usuario'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);
	    let option = '';

	    if(respuesta.success){
	    	//console.log(respuesta.data);
	    	$.each( respuesta.data, function( key, value ) {
			  option += '<option value="'+value.cedula+'">'+(value.nombres+' '+value.apellidos)+'</option>';
			});
			$('#cedula_dt').append(option);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function cargarListaAlimentosDt(){
	$.post('../controller/ctrl_alimentos.php', {accion:'cargarListaAlimentos'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);
	    let option = '';

	    if(respuesta.success){
	    	//console.log(respuesta.data);
	    	$.each( respuesta.data, function( key, value ) {
			  option += '<option value="'+value.id_alimentos+'">'+value.alimento+'</option>';
			});
			$('#alimento_dt_1').append(option);
			$('#alimento_dt_2').append(option);
			$('#alimento_dt_3').append(option);
			$('#alimento_dt_4').append(option);
			$('#alimento_dt_5').append(option);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}