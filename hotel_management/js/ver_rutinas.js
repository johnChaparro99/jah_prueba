$(function () {
	cargarRutinaAsignada();
});

function cargarRutinaAsignada(){
	let cedula = $('#cedula_usuario_rt').val();

	$.post('../controller/ctrl_rutinas.php', {accion:'cargarRutinaAsignada', cedula: cedula}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_ver_rutina').html(respuesta.tabla);
	    }
	});
}
