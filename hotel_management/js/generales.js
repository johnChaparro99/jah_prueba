$(function () {
	$("#enviar").click(function(){
		iniciarSession();
	});

	$("#cerrarSession").click(function(){
		cerrarSession();
	});

	$('#nav_usuarios').click(function(){
		$('#usuarios_form').removeClass('oculto');
		$('#hoteles_form').addClass('oculto');
		$('#tipo_habitacion_form').addClass('oculto');
	});


	$('#nav_hoteles').click(function(){
		$('#hoteles_form').removeClass('oculto');
		$('#tipo_habitacion_form').addClass('oculto');
		$('#usuarios_form').addClass('oculto');
		
	});

	$('#nav_tipo_habitacion').click(function(){
		$('#tipo_habitacion_form').removeClass('oculto');
		$('#usuarios_form').addClass('oculto');
		$('#hoteles_form').addClass('oculto');
	});

	

});

function iniciarSession(){
	let cedula = $('#cedula').val();
	let contrasenia = $('#contrasenia').val();

	if (cedula != '' && contrasenia != '') {
		$.post('controller/general.php', {cedula : cedula, contrasenia: contrasenia, accion:'login'}, function(resp) {
		    let respuesta = jQuery.parseJSON(resp);
		    
		    if(respuesta.success){

		    	location.href = 'view/principal.php';
		    }else{
		    	$('#cedula').val('');
				$('#contrasenia').val('');

		    	Swal.fire(
				  'Error!',
				  respuesta.message,
				  'error'
				);
		    }
		});
	}else{
		Swal.fire(
		  'Error!',
		  'los campos deben estar diligenciados',
		  'error'
		)
	}
}

function cerrarSession(){
	$.post('../controller/general.php', {accion:'cerrarSession'}, function(resp) {
		console.log(resp);
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	

	    	location.href = '../index.html';
	    }else{
	    	$('#cedula').val('');
			$('#contrasenia').val('');

	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function validarRolUsuario(){
	
	let rol = $('#rolSession').val();

	switch(rol) {
  		case 'Usuario':
		    $('#segumiento').removeClass('oculto');
		    $('#nav_ver_rutinas').removeClass('oculto');
		    $('#nav_ver_dietas').removeClass('oculto');
		    $('#nav_ver_event_esp').removeClass('oculto');
		    $('#nav_ver_avance').removeClass('oculto');
		break;

	  	case 'Administrador':
		    $('#administracion').removeClass('oculto');
		    $('#nav_hoteles').removeClass('oculto');
		    $('#nav_tipo_habitacion').removeClass('oculto');
		    $('#nav_event_esp').removeClass('oculto');
		    $('#nav_maquinas').removeClass('oculto');
		    $('#nav_usuarios').removeClass('oculto');
		    
		    $('#operacion').removeClass('oculto');
		    $('#nav_diagnosticos').removeClass('oculto');
		    $('#nav_dietas').removeClass('oculto');
		    $('#nav_rutinas').removeClass('oculto');
		    $('#nav_valoraciones').removeClass('oculto');
		    break;

		case 'Instructor':
		    $('#administracion').removeClass('oculto');
		    $('#nav_usuarios').removeClass('oculto');

		    $('#operacion').removeClass('oculto');
			$('#nav_diagnosticos').removeClass('oculto');
			$('#nav_dietas').removeClass('oculto');
			$('#nav_rutinas').removeClass('oculto');
			$('#nav_valoraciones').removeClass('oculto');
		    break;
	}
}