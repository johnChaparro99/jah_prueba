$(function () {
	$("#btn_guardar_usu").click(function(){
		guardarUsuarios();
	});

	$("#btn_editar_usu").click(function(){
		editarUsuarios();
	});

	validarRolUsuario();
	cargarUsuarios();
});

function cargarUsuarios(){
	$.post('../controller/ctrl_usuarios.php', {accion:'cargarUsuarios'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_usuarios').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function guardarUsuarios(){
	let nombres = $('#nombres').val();
	let email = $('#email').val();
	let contrasena = $('#contrasena').val();
	let rol = $('#rol').val();

	if (nombres != '' && email != '' && contrasena != '' && rol != '') {
		$.post('../controller/ctrl_usuarios.php', 
			{
				accion:'guardarUsuarios',
				nombres: nombres,
				email: email,
				contrasena: contrasena,
				rol: rol
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	limpiarFormUsuario();
			    	cargarUsuarios();
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
		  'Los campos de Nombre usuario, Correo electrónico, contraseña y Rol son obligatorios',
		  'warning'
		);
	}
}

function seleccionarUsuario(id){

	$.post('../controller/ctrl_usuarios.php', 
		{
			accion:'seleccionarUsuario',
			id: id,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	$('#nombres').val(respuesta.data[0]['name']);
				$('#email').val(respuesta.data[0]['email']);
				$('#contrasena').val(respuesta.data[0]['password']);
				$('#rol').val(respuesta.data[0]['role']);
				$('#id_usuario').val(respuesta.data[0]['id']);
				

				$('#btn_guardar_usu').addClass('oculto');
				$('#btn_editar_usu').removeClass('oculto');

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

function editarUsuarios(){
	let id = $('#id_usuario').val();
	let nombres = $('#nombres').val();
	let email = $('#email').val();
	let contrasena = $('#contrasena').val();
	let rol = $('#rol').val();

	if (nombres != '' && email != '' && contrasena != '' && rol != '') {
		$.post('../controller/ctrl_usuarios.php', 
			{
				accion:'editarUsuarios',
				id: id,
				nombres: nombres,
				email: email,
				contrasena: contrasena,
				rol: rol
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	$('#btn_guardar_usu').removeClass('oculto');
					$('#btn_editar_usu').addClass('oculto');
			    	limpiarFormUsuario();
			    	cargarUsuarios();
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
		  'Los campos de Nombre usuario, Correo electrónico, contraseña y Rol son obligatorios',
		  'warning'
		);
	}
}

function eliminarUsuario(id){

	$.post('../controller/ctrl_usuarios.php', 
		{
			accion:'eliminarUsuario',
			id: id,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	cargarUsuarios();
		    	limpiarFormUsuario();
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

function limpiarFormUsuario(){
	$('#id_usuario').val('');
	$('#nombres').val('');
	$('#email').val('');
	$('#contrasena').val('');
	$('#rol').val('');
}