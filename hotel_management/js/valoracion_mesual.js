$(function () {
	$("#btn_guardar_vm").click(function(){
		guardarValoracionMensual();
	});

	$("#btn_editar_vm").click(function(){
		editarValoracionMensual();
	});

	cargarValoracionMensual();
	cargarListaUsuarios();
});

function cargarValoracionMensual(){
	$.post('../controller/ctrl_valoracion_mesual.php', {accion:'cargarValoracionMensual'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_valoracion_mesual').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function guardarValoracionMensual(){
	let cedula = $('#cedula_vm').val();
	let indice_masa_muscular = $('#indice_masa_muscular').val();
	let cuello = $('#cuello').val();
	let deltoides = $('#deltoides').val();
	let torax = $('#torax').val();
	let cintura = $('#cintura').val();
	let abdomen = $('#abdomen').val();
	let cadera = $('#cadera').val();
	let muslo = $('#muslo').val();
	let pantorrilla = $('#pantorrilla').val();
	let brazo = $('#brazo').val();
	let antebrazo = $('#antebrazo').val();
	let espalda = $('#espalda').val();
	let peso = $('#peso').val();
	let estatura = $('#estatura').val();
	let evaluacion_postural = $('#evaluacion_postural').val();
	let somatotipo = $('#somatotipo').val();
	let frecuencia_cardiaca_basal = $('#frecuencia_cardiaca_basal').val();
	let presion_arterial = $('#presion_arterial').val();
	let sistole = $('#sistole').val();
	let subcapular = $('#subcapular').val();
	let triceps = $('#triceps').val();
	let test_cinco_minutos = $('#test_cinco_minutos').val();
	let test_wells = $('#test_wells').val();
	let test_brazos = $('#test_brazos').val();



	if (cedula != '') {
		$.post('../controller/ctrl_valoracion_mesual.php', 
			{
				accion:'guardarValoracionMensual',
				cedula: cedula,
				indice_masa_muscular: indice_masa_muscular,
				cuello: cuello,
				deltoides: deltoides,
				torax: torax,
				cintura: cintura,
				abdomen: abdomen,
				cadera: cadera,
				muslo: muslo,
				pantorrilla: pantorrilla,
				brazo: brazo,
				antebrazo: antebrazo,
				espalda: espalda,
				peso: peso,
				estatura: estatura,
				evaluacion_postural: evaluacion_postural,
				somatotipo: somatotipo,
				frecuencia_cardiaca_basal: frecuencia_cardiaca_basal,
				presion_arterial: presion_arterial,
				sistole: sistole,
				subcapular: subcapular,
				triceps: triceps,
				test_cinco_minutos: test_cinco_minutos,
				test_wells: test_wells,
				test_brazos: test_brazos
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	limpiarFormValoracionMensual();
			    	cargarValoracionMensual();
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
		  'El campo de Cliente es obligatorio',
		  'warning'
		);
	}
}

function seleccionarValoracionMensual(id_valoracion_mensual){

	$.post('../controller/ctrl_valoracion_mesual.php', 
		{
			accion:'seleccionarValoracionMensual',
			id_valoracion_mensual: id_valoracion_mensual,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	$('#id_valoracion_mensual').val(respuesta.data[0]['id_valoracion_mensual']);
				$('#cedula_vm').val(respuesta.data[0]['cedula']);
				$('#indice_masa_muscular').val(respuesta.data[0]['indice_masa_muscular']);
				$('#cuello').val(respuesta.data[0]['cuello']);
				$('#deltoides').val(respuesta.data[0]['deltoides']);
				$('#torax').val(respuesta.data[0]['torax']);
				$('#cintura').val(respuesta.data[0]['cintura']);
				$('#abdomen').val(respuesta.data[0]['abdomen']);
				$('#cadera').val(respuesta.data[0]['cadera']);
				$('#muslo').val(respuesta.data[0]['muslo']);
				$('#pantorrilla').val(respuesta.data[0]['pantorrilla']);
				$('#brazo').val(respuesta.data[0]['brazo']);
				$('#antebrazo').val(respuesta.data[0]['antebrazo']);
				$('#espalda').val(respuesta.data[0]['espalda']);
				$('#peso').val(respuesta.data[0]['peso']);
				$('#estatura').val(respuesta.data[0]['estatura']);
				$('#evaluacion_postural').val(respuesta.data[0]['evaluacion_postural']);
				$('#somatotipo').val(respuesta.data[0]['somatotipo']);
				$('#frecuencia_cardiaca_basal').val(respuesta.data[0]['frecuencia_cardiaca_basal']);
				$('#presion_arterial').val(respuesta.data[0]['presion_arterial']);
				$('#sistole').val(respuesta.data[0]['sistole']);
				$('#subcapular').val(respuesta.data[0]['subcapular']);
				$('#triceps').val(respuesta.data[0]['triceps']);
				$('#test_cinco_minutos').val(respuesta.data[0]['test_cinco_minutos']);
				$('#test_wells').val(respuesta.data[0]['test_wells']);
				$('#test_brazos').val(respuesta.data[0]['test_brazos']);

				$('#btn_guardar_vm').addClass('oculto');
				$('#btn_editar_vm').removeClass('oculto');

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

function editarValoracionMensual(){
	let id_valoracion_mensual = $('#id_valoracion_mensual').val();
	let cedula = $('#cedula_vm').val();
	let indice_masa_muscular = $('#indice_masa_muscular').val();
	let cuello = $('#cuello').val();
	let deltoides = $('#deltoides').val();
	let torax = $('#torax').val();
	let cintura = $('#cintura').val();
	let abdomen = $('#abdomen').val();
	let cadera = $('#cadera').val();
	let muslo = $('#muslo').val();
	let pantorrilla = $('#pantorrilla').val();
	let brazo = $('#brazo').val();
	let antebrazo = $('#antebrazo').val();
	let espalda = $('#espalda').val();
	let peso = $('#peso').val();
	let estatura = $('#estatura').val();
	let evaluacion_postural = $('#evaluacion_postural').val();
	let somatotipo = $('#somatotipo').val();
	let frecuencia_cardiaca_basal = $('#frecuencia_cardiaca_basal').val();
	let presion_arterial = $('#presion_arterial').val();
	let sistole = $('#sistole').val();
	let subcapular = $('#subcapular').val();
	let triceps = $('#triceps').val();
	let test_cinco_minutos = $('#test_cinco_minutos').val();
	let test_wells = $('#test_wells').val();
	let test_brazos = $('#test_brazos').val();

	if (cedula != '') {
		$.post('../controller/ctrl_valoracion_mesual.php', 
			{
				accion:'editarValoracionMensual',
				id_valoracion_mensual: id_valoracion_mensual,
				cedula: cedula,
				indice_masa_muscular: indice_masa_muscular,
				cuello: cuello,
				deltoides: deltoides,
				torax: torax,
				cintura: cintura,
				abdomen: abdomen,
				cadera: cadera,
				muslo: muslo,
				pantorrilla: pantorrilla,
				brazo: brazo,
				antebrazo: antebrazo,
				espalda: espalda,
				peso: peso,
				estatura: estatura,
				evaluacion_postural: evaluacion_postural,
				somatotipo: somatotipo,
				frecuencia_cardiaca_basal: frecuencia_cardiaca_basal,
				presion_arterial: presion_arterial,
				sistole: sistole,
				subcapular: subcapular,
				triceps: triceps,
				test_cinco_minutos: test_cinco_minutos,
				test_wells: test_wells,
				test_brazos: test_brazos
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
			    	limpiarFormValoracionMensual();
			    	cargarValoracionMensual();
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
		  'El campo de Cliente es obligatorio',
		  'warning'
		);
	}
}

function eliminarValoracionMensual(id_valoracion_mensual){

	$.post('../controller/ctrl_valoracion_mesual.php', 
		{
			accion:'eliminarValoracionMensual',
			id_valoracion_mensual: id_valoracion_mensual
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	cargarValoracionMensual();
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

function limpiarFormValoracionMensual(){
	$('#id_valoracion_mensual').val('');
	$('#cedula_vm').val('');
	$('#indice_masa_muscular').val('');
	$('#cuello').val('');
	$('#deltoides').val('');
	$('#torax').val('');
	$('#cintura').val('');
	$('#abdomen').val('');
	$('#cadera').val('');
	$('#muslo').val('');
	$('#pantorrilla').val('');
	$('#brazo').val('');
	$('#antebrazo').val('');
	$('#espalda').val('');
	$('#peso').val('');
	$('#estatura').val('');
	$('#evaluacion_postural').val('');
	$('#somatotipo').val('');
	$('#frecuencia_cardiaca_basal').val('');
	$('#presion_arterial').val('');
	$('#sistole').val('');
	$('#subcapular').val('');
	$('#triceps').val('');
	$('#test_cinco_minutos').val('');
	$('#test_wells').val('');
	$('#test_brazos').val('');
}

function cargarListaUsuarios(){
	$.post('../controller/ctrl_usuarios.php', {accion:'cargarUsuariosRol', rol: 'Usuario'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);
	    let option = '';

	    if(respuesta.success){
	    	//console.log(respuesta.data);
	    	$.each( respuesta.data, function( key, value ) {
			  option += '<option value="'+value.cedula+'">'+(value.nombres+' '+value.apellidos)+'</option>';
			});
			$('#cedula_vm').append(option);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}