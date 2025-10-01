$(function () {
	$("#btn_guardar_prod").click(function(){
		guardarProductos();
	});

	$("#btn_editar_prod").click(function(){
		editarProductos();
	});

	validarRolUsuario();
	cargarProductos();
});

function cargarProductos(){
	$.post('../controller/ctrl_productos.php', {accion:'cargarProductos'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_productos').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function guardarProductos(){
	let nombres = $('#nombre_prod').val();
	let precio = $('#precio_prod').val();
	let stock = $('#stock_prod').val();

	if (nombres != '' && precio != '' && stock != '') {
		$.post('../controller/ctrl_productos.php', 
			{
				accion:'guardarProductos',
				nombres: nombres,
				precio: precio,
				stock: stock
			}, 
			function(resp) {
			    let respuesta = jQuery.parseJSON(resp);

			    if(respuesta.success){
			    	Swal.fire(
					  'Hecho!',
					  respuesta.message,
					  'success'
					);
			    	
			    	limpiarFormProducto();
			    	cargarProductos();
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
		  'Los campos de Nombre producto, precio y stock son obligatorios',
		  'warning'
		);
	}
}

function seleccionarProducto(id){

	$.post('../controller/ctrl_productos.php', 
		{
			accion:'seleccionarProducto',
			id: id,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	$('#nombre_prod').val(respuesta.data[0]['name']);
				$('#precio_prod').val(respuesta.data[0]['price']);
				$('#stock_prod').val(respuesta.data[0]['stock']);
				$('#id_producto').val(respuesta.data[0]['id']);
				

				$('#btn_guardar_prod').addClass('oculto');
				$('#btn_editar_prod').removeClass('oculto');

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

function editarProductos(){
	let id = $('#id_producto').val();
	let nombres = $('#nombre_prod').val();
	let precio = $('#precio_prod').val();
	let stock = $('#stock_prod').val();

	if (nombres != '' && precio != '' && stock != '') {
		$.post('../controller/ctrl_productos.php', 
			{
				accion:'editarProductos',
				id: id,
				nombres: nombres,
				precio: precio,
				stock: stock
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
			    	limpiarFormProducto();
			    	cargarProductos();
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
		  'Los campos de Nombre producto, precio y stock son obligatorios',
		  'warning'
		);
	}
}

function eliminarProducto(id){

	$.post('../controller/ctrl_productos.php', 
		{
			accion:'eliminarProducto',
			id: id,
		}, 
		function(resp) {
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	cargarProductos();
		    	limpiarFormProducto();
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

function limpiarFormProducto(){
	$('#id_producto').val('');
	$('#nombre_prod').val('');
	$('#precio_prod').val('');
	$('#stock_prod').val('');
}