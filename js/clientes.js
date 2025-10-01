$(function () {
	$("#btn_guardar_cli").click(function(){
		guardarClientes();
	});

	$("#btn_editar_cli").click(function(){
		editarClientes();
	});

	validarRolUsuario();
	cargarClientes();
});

function cargarClientes(){
	$.post('../controller/ctrl_clientes.php', {accion:'cargarClientes'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_clientes').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function guardarClientes(){
	let nombres = $('#nombres_cli').val();
	let email = $('#email_cli').val();
	let telefono = $('#telefono_cli').val();

	if (nombres != '' && telefono != '' && email != '') {
		$.post('../controller/ctrl_clientes.php', 
			{
				accion:'guardarClientes',
				nombres: nombres,
				email: email,
				telefono: telefono
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	limpiarFormCliente();
			    	cargarClientes();
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
		  'Los campos de Nombre cliente, Correo electrónico y telefono son obligatorios',
		  'warning'
		);
	}
}

function seleccionarCliente(id){

	$.post('../controller/ctrl_clientes.php', 
		{
			accion:'seleccionarCliente',
			id: id,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	$('#nombres_cli').val(respuesta.data[0]['name']);
				$('#email_cli').val(respuesta.data[0]['email']);
				$('#telefono_cli').val(respuesta.data[0]['phone']);
				$('#id_cliente').val(respuesta.data[0]['id']);
				

				$('#btn_guardar_cli').addClass('oculto');
				$('#btn_editar_cli').removeClass('oculto');

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

function editarClientes(){
	let id = $('#id_cliente').val();
	let nombres = $('#nombres_cli').val();
	let email = $('#email_cli').val();
	let telefono = $('#telefono_cli').val();

	if (nombres != '' && email != '' && telefono != '') {
		$.post('../controller/ctrl_clientes.php', 
			{
				accion:'editarClientes',
				id: id,
				nombres: nombres,
				email: email,
				telefono: telefono
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	$('#btn_guardar_cli').removeClass('oculto');
					$('#btn_editar_cli').addClass('oculto');
			    	limpiarFormCliente();
			    	cargarClientes();
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
		  'Los campos de Nombre cliente, Correo electrónico y telefono son obligatorios',
		  'warning'
		);
	}
}

function eliminarCliente(id){

	$.post('../controller/ctrl_clientes.php', 
		{
			accion:'eliminarCliente',
			id: id,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	cargarClientes();
		    	limpiarFormCliente();
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

function limpiarFormCliente(){
	$('#id_cliente').val('');
	$('#nombres_cli').val('');
	$('#email_cli').val('');
	$('#telefono_cli').val('');
}