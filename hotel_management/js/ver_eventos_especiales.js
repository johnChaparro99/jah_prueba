$(function () {
	cargarEventEsp();
});

function cargarEventEsp(){
	$.post('../controller/ctrl_eventos_especiales.php', {accion:'cargarEventEsp'}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_ver_eventos_especiales').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}

function inscribirEventoEspecial(cedula, id_evento){
	Swal.fire({
	  title: 'Esta seguro que quiere inscribirse a este evento especial?',
	  //text: "",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, inscribirme!'
	}).then((result) => {
	  if (result.isConfirmed) {
	  	$.post('../controller/ctrl_eventos_especiales.php', 
	  		{
	  			accion:'inscribirEventoEspecial', 
	  			cedula:cedula, 
	  			id_evento: id_evento
	  		}, function(resp) {

		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	Swal.fire(
			      'Inscrito!',
			      'Se ha inscrito exitosamente.',
			      'success'
			    );
			    cargarEventEsp();
		    }else{
		    	Swal.fire(
				  'Error!',
				  respuesta.message,
				  'error'
				);
		    }
		});

	  }
	})
}

function cancelarEventoEspecial(cedula, id_evento){
	Swal.fire({
	  title: 'Esta seguro que quiere cancelar la inscripcion a este evento especial?',
	  //text: "",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, cancelar inscripcion!'
	}).then((result) => {
	  if (result.isConfirmed) {
	  	$.post('../controller/ctrl_eventos_especiales.php', 
	  		{
	  			accion:'cancelarEventoEspecial', 
	  			cedula:cedula, 
	  			id_evento: id_evento
	  		}, function(resp) {
	  			
		    let respuesta = jQuery.parseJSON(resp);

		    if(respuesta.success){
		    	Swal.fire(
			      'cancelada!',
			      'Inscripcion cancelada exitosamente.',
			      'success'
			    );
			    cargarEventEsp();
		    }else{
		    	Swal.fire(
				  'Error!',
				  respuesta.message,
				  'error'
				);
		    }
		});

	  }
	})
}