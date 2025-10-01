$(function () {
	cargarAvances();
});

function cargarAvances(){
	let cedula = $('#cedula_usuario_av').val();

	$.post('../controller/ctrl_valoracion_mesual.php', {accion:'cargarAvances', cedula: cedula}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#div_avances').html(respuesta.tabla);
	    }else{
	    	Swal.fire(
			  'Error!',
			  respuesta.message,
			  'error'
			);
	    }
	});
}
