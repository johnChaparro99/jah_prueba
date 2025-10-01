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
	let cedula = $('#cedula').val();
	let tipo_documento = $('#tipo_documento').val();
	let nombres = $('#nombres').val();
	let apellidos = $('#apellidos').val();
	let fecha_nacimiento = $('#fecha_nacimiento').val();
	let direccion = $('#direccion').val();
	let telefono = $('#telefono').val();
	let email = $('#email').val();
	let genero = $('#genero').val();
	let contrasena = $('#contrasena').val();
	let estado = $('#estado').val();
	let rol = $('#rol').val();

	if (cedula != '' && nombres != '' && contrasena != '' && tipo_documento != '') {
		$.post('../controller/ctrl_usuarios.php', 
			{
				accion:'guardarUsuarios',
				cedula: cedula,
				tipo_documento: tipo_documento,
				nombres: nombres,
				apellidos: apellidos,
				fecha_nacimiento: fecha_nacimiento,
				direccion: direccion,
				telefono: telefono,
				email: email,
				genero: genero,
				contrasena: contrasena,
				estado: estado,
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
		  'Los campos de Número de documento, Tipo de documento, Nombres cliente y contraseña son obligatorios',
		  'warning'
		);
	}
}

function seleccionarUsuario(cedula){

	$.post('../controller/ctrl_usuarios.php', 
		{
			accion:'seleccionarUsuario',
			cedula: cedula,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	$('#cedula').val(respuesta.data[0]['cedula']);
				$('#tipo_documento').val(respuesta.data[0]['tipo_documento']);
				$('#nombres').val(respuesta.data[0]['nombres']);
				$('#apellidos').val(respuesta.data[0]['apellidos']);
				$('#fecha_nacimiento').val(respuesta.data[0]['fecha_nacimiento']);
				$('#direccion').val(respuesta.data[0]['direccion']);
				$('#telefono').val(respuesta.data[0]['telefono']);
				$('#email').val(respuesta.data[0]['email']);
				$('#genero').val(respuesta.data[0]['genero']);
				$('#contrasena').val(respuesta.data[0]['contrasena']);
				$('#estado').val(respuesta.data[0]['estado']);
				$('#rol').val(respuesta.data[0]['rol']);

				$('#btn_guardar_usu').addClass('oculto');
				$('#btn_editar_usu').removeClass('oculto');
				$('#cedula').prop('readonly', true);

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
	let cedula = $('#cedula').val();
	let tipo_documento = $('#tipo_documento').val();
	let nombres = $('#nombres').val();
	let apellidos = $('#apellidos').val();
	let fecha_nacimiento = $('#fecha_nacimiento').val();
	let direccion = $('#direccion').val();
	let telefono = $('#telefono').val();
	let email = $('#email').val();
	let genero = $('#genero').val();
	let contrasena = $('#contrasena').val();
	let estado = $('#estado').val();
	let rol = $('#rol').val();

	if (cedula != '' && nombres != '' && contrasena != '' && tipo_documento != '') {
		$.post('../controller/ctrl_usuarios.php', 
			{
				accion:'editarUsuarios',
				cedula: cedula,
				tipo_documento: tipo_documento,
				nombres: nombres,
				apellidos: apellidos,
				fecha_nacimiento: fecha_nacimiento,
				direccion: direccion,
				telefono: telefono,
				email: email,
				genero: genero,
				contrasena: contrasena,
				estado: estado,
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
		  'Los campos de Número de documento, Tipo de documento, Nombres cliente y contraseña son obligatorios',
		  'warning'
		);
	}
}

function eliminarUsuario(cedula){

	$.post('../controller/ctrl_usuarios.php', 
		{
			accion:'eliminarUsuario',
			cedula: cedula,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	cargarUsuarios();
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
	$('#cedula').val('');
	$('#tipo_documento').val('');
	$('#nombres').val('');
	$('#apellidos').val('');
	$('#fecha_nacimiento').val('');
	$('#direccion').val('');
	$('#telefono').val('');
	$('#email').val('');
	$('#genero').val('');
	$('#contrasena').val('');
	$('#estado').val('');
	$('#rol').val('');
}