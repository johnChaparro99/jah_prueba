$(function () {
	$("#enviar").click(function(){
		iniciarSession();
	});

	$("#cerrarSession").click(function(){
		cerrarSession();
	});

	$('#nav_usuarios').click(function(){
		$('#usuarios_form').removeClass('oculto');
		$('#clientes_form').addClass('oculto');
		$('#produtos_form').addClass('oculto');
		$('#ordenes_form').addClass('oculto');
		$('#dashboard_form').addClass('oculto');
	});


	$('#nav_clientes').click(function(){
		$('#usuarios_form').addClass('oculto');
		$('#clientes_form').removeClass('oculto');
		$('#produtos_form').addClass('oculto');
		$('#ordenes_form').addClass('oculto');
		$('#dashboard_form').addClass('oculto');
		
	});

	$('#nav_productos').click(function(){
		$('#usuarios_form').addClass('oculto');
		$('#clientes_form').addClass('oculto');
		$('#produtos_form').removeClass('oculto');
		$('#ordenes_form').addClass('oculto');
		$('#dashboard_form').addClass('oculto');
		
	});

	

});

function iniciarSession(){
	let email = $('#email').val();
	let contrasenia = $('#contrasenia').val();

	if (email != '' && contrasenia != '') {
		$.post('controller/general.php', {email : email, contrasenia: contrasenia, accion:'login'}, function(resp) {
		    let respuesta = jQuery.parseJSON(resp);
		    
		    if(respuesta.success){

		    	location.href = 'view/principal.php';
		    }else{
		    	$('#email').val('');
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
  		case 'gerente':
		case 'admin':
		    $('#administracion').removeClass('oculto');
		    $('#nav_clientes').removeClass('oculto');
		    $('#nav_productos').removeClass('oculto');
		    $('#nav_usuarios').removeClass('oculto');
		    
		    $('#operacion').removeClass('oculto');
		    $('#nav_orden').removeClass('oculto');
		    break;

		case 'cajero':
		    $('#operacion').removeClass('oculto');
			$('#nav_orden').removeClass('oculto');
	}
}