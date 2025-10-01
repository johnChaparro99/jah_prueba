$(function () {
	$("#btn_guardar_dg").click(function(){
		guardarDiagnostico();
	});

	$("#btn_editar_dg").click(function(){
		editarDiagnostico();
	});

	$("#alergias").change(function(){
		let valor = $(this).val();

		if (valor == 'Si') {
			$('#div_alergias').removeClass('oculto');
		}else{
			$('#div_alergias').addClass('oculto');
		}
	});

	$("#cirugias").change(function(){
		let valor = $(this).val();

		if (valor == 'Si') {
			$('#div_cirugias').removeClass('oculto');
		}else{
			$('#div_cirugias').addClass('oculto');
		}
	});

	$("#toma_medicamentos").change(function(){
		let valor = $(this).val();

		if (valor == 'Si') {
			$('#div_medicamentos').removeClass('oculto');
		}else{
			$('#div_medicamentos').addClass('oculto');
		}
	});

	cargarDiagnostico();
	cargarListaUsuariosDg();
});

function cargarDiagnostico(){
	$.post('../controller/ctrl_diagnosticos.php', {accion:'cargarDiagnostico'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_diagnosticos').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function guardarDiagnostico(){
	let cedula = $('#cedula_dg').val();
	let enfermedad_dermatologica = $('#enfermedad_dermatologica').val(); 
	let diabetes = $('#diabetes').val(); 
	let vena_varice = $('#vena_varice').val(); 
	let problemas_circulatorios = $('#problemas_circulatorios').val(); 
	let hernias = $('#hernias').val(); 
	let hipertencion_arterial = $('#hipertencion_arterial').val(); 
	let tiroides = $('#tiroides').val(); 
	let alergias = $('#alergias').val(); 
	let cuales_alergias = $('#cuales_alergias').val(); 
	let toma_alcohol = $('#toma_alcohol').val(); 
	let fuma = $('#fuma').val(); 
	let tumores = $('#tumores').val(); 
	let cancer = $('#cancer').val(); 
	let implantes_metalicos = $('#implantes_metalicos').val();
	let marca_pasos = $('#marca_pasos').val(); 
	let problemas_columna = $('#problemas_columna').val(); 
	let cirugias = $('#cirugias').val(); 
	let cuales_cirugias = $('#cuales_cirugias').val(); 
	let toma_medicamentos = $('#toma_medicamentos').val(); 
	let cuales_medicamentos = $('#cuales_medicamentos').val();

	if (cedula != '') {
		$.post('../controller/ctrl_diagnosticos.php', 
			{
				accion:'guardarDiagnostico',
				cedula: cedula,
				enfermedad_dermatologica: enfermedad_dermatologica,
				diabetes: diabetes,
				vena_varice: vena_varice,
				problemas_circulatorios: problemas_circulatorios,
				hernias: hernias,
				hipertencion_arterial: hipertencion_arterial,
				tiroides: tiroides,
				alergias: alergias,
				cuales_alergias: cuales_alergias,
				toma_alcohol: toma_alcohol,
				fuma: fuma,
				tumores: tumores,
				cancer: cancer,
				implantes_metalicos: implantes_metalicos,
				marca_pasos: marca_pasos,
				problemas_columna: problemas_columna,
				cirugias: cirugias,
				cuales_cirugias: cuales_cirugias,
				toma_medicamentos: toma_medicamentos,
				cuales_medicamentos: cuales_medicamentos
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	limpiarFormDiagnostico();
			    	cargarDiagnostico();
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

function seleccionarDiagnostico(id_diagnostico){

	$.post('../controller/ctrl_diagnosticos.php', 
		{
			accion:'seleccionarDiagnostico',
			id_diagnostico: id_diagnostico,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	$('#id_diagnostico').val(respuesta.data[0]['id_diagnostico']);
		    	$('#cedula_dg').val(respuesta.data[0]['cedula']);
				$('#enfermedad_dermatologica').val(respuesta.data[0]['enfermedad_dermatologica']); 
				$('#diabetes').val(respuesta.data[0]['diabetes']); 
				$('#vena_varice').val(respuesta.data[0]['vena_varice']); 
				$('#problemas_circulatorios').val(respuesta.data[0]['problemas_circulatorios']); 
				$('#hernias').val(respuesta.data[0]['hernias']); 
				$('#hipertencion_arterial').val(respuesta.data[0]['hipertencion_arterial']); 
				$('#tiroides').val(respuesta.data[0]['tiroides']); 
				$('#alergias').val(respuesta.data[0]['alergias']); 
				$('#cuales_alergias').val(respuesta.data[0]['cuales_alergias']); 
				$('#toma_alcohol').val(respuesta.data[0]['toma_alcohol']); 
				$('#fuma').val(respuesta.data[0]['fuma']); 
				$('#tumores').val(respuesta.data[0]['tumores']); 
				$('#cancer').val(respuesta.data[0]['cancer']); 
				$('#implantes_metalicos').val(respuesta.data[0]['implantes_metalicos']);
				$('#marca_pasos').val(respuesta.data[0]['marca_pasos']); 
				$('#problemas_columna').val(respuesta.data[0]['problemas_columna']); 
				$('#cirugias').val(respuesta.data[0]['cirugias']); 
				$('#cuales_cirugias').val(respuesta.data[0]['cuales_cirugias']); 
				$('#toma_medicamentos').val(respuesta.data[0]['toma_medicamentos']); 
				$('#cuales_medicamentos').val(respuesta.data[0]['cuales_medicamentos']);

				if (respuesta.data[0]['alergias'] == 'Si') {
					$('#div_alergias').removeClass('oculto');
				}
				if (respuesta.data[0]['cirugias'] == 'Si') {
					$('#div_cirugias').removeClass('oculto');
				}
				if (respuesta.data[0]['toma_medicamentos'] == 'Si') {
					$('#div_medicamentos').removeClass('oculto');
				}

				$('#btn_guardar_dg').addClass('oculto');
				$('#btn_editar_dg').removeClass('oculto');

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

function editarDiagnostico(){
	let id_diagnostico = $('#id_diagnostico').val();
	let cedula = $('#cedula_dg').val();
	let enfermedad_dermatologica = $('#enfermedad_dermatologica').val(); 
	let diabetes = $('#diabetes').val(); 
	let vena_varice = $('#vena_varice').val(); 
	let problemas_circulatorios = $('#problemas_circulatorios').val(); 
	let hernias = $('#hernias').val(); 
	let hipertencion_arterial = $('#hipertencion_arterial').val(); 
	let tiroides = $('#tiroides').val(); 
	let alergias = $('#alergias').val(); 
	let cuales_alergias = $('#cuales_alergias').val(); 
	let toma_alcohol = $('#toma_alcohol').val(); 
	let fuma = $('#fuma').val(); 
	let tumores = $('#tumores').val(); 
	let cancer = $('#cancer').val(); 
	let implantes_metalicos = $('#implantes_metalicos').val();
	let marca_pasos = $('#marca_pasos').val(); 
	let problemas_columna = $('#problemas_columna').val(); 
	let cirugias = $('#cirugias').val(); 
	let cuales_cirugias = $('#cuales_cirugias').val(); 
	let toma_medicamentos = $('#toma_medicamentos').val(); 
	let cuales_medicamentos = $('#cuales_medicamentos').val();

	if (cedula != '') {
		$.post('../controller/ctrl_diagnosticos.php', 
			{
				accion:'editarDiagnostico',
				id_diagnostico: id_diagnostico,
				cedula: cedula,
				enfermedad_dermatologica: enfermedad_dermatologica,
				diabetes: diabetes,
				vena_varice: vena_varice,
				problemas_circulatorios: problemas_circulatorios,
				hernias: hernias,
				hipertencion_arterial: hipertencion_arterial,
				tiroides: tiroides,
				alergias: alergias,
				cuales_alergias: cuales_alergias,
				toma_alcohol: toma_alcohol,
				fuma: fuma,
				tumores: tumores,
				cancer: cancer,
				implantes_metalicos: implantes_metalicos,
				marca_pasos: marca_pasos,
				problemas_columna: problemas_columna,
				cirugias: cirugias,
				cuales_cirugias: cuales_cirugias,
				toma_medicamentos: toma_medicamentos,
				cuales_medicamentos: cuales_medicamentos
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
			    	limpiarFormDiagnostico();
			    	cargarDiagnostico();
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

function eliminarDiagnostico(id_diagnostico){

	$.post('../controller/ctrl_diagnosticos.php', 
		{
			accion:'eliminarDiagnostico',
			id_diagnostico: id_diagnostico
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	cargarDiagnostico();
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

function limpiarFormDiagnostico(){
	$('#cedula_dg').val('');
	$('#enfermedad_dermatologica').val(''); 
	$('#diabetes').val(''); 
	$('#vena_varice').val(''); 
	$('#problemas_circulatorios').val(''); 
	$('#hernias').val(''); 
	$('#hipertencion_arterial').val(''); 
	$('#tiroides').val(''); 
	$('#alergias').val(''); 
	$('#cuales_alergias').val(''); 
	$('#toma_alcohol').val(''); 
	$('#fuma').val(''); 
	$('#tumores').val(''); 
	$('#cancer').val(''); 
	$('#implantes_metalicos').val('');
	$('#marca_pasos').val(''); 
	$('#problemas_columna').val(''); 
	$('#cirugias').val(''); 
	$('#cuales_cirugias').val(''); 
	$('#toma_medicamentos').val(''); 
	$('#cuales_medicamentos').val('');
	$('#div_alergias').addClass('oculto');
	$('#div_cirugias').addClass('oculto');
	$('#div_medicamentos').addClass('oculto');
}

function cargarListaUsuariosDg(){
	$.post('../controller/ctrl_usuarios.php', {accion:'cargarUsuariosRol', rol: 'Usuario'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);
	    let option = '';

	    if(respuesta.success){
	    	//console.log(respuesta.data);
	    	$.each( respuesta.data, function( key, value ) {
			  option += '<option value="'+value.cedula+'">'+(value.nombres+' '+value.apellidos)+'</option>';
			});
			$('#cedula_dg').append(option);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}