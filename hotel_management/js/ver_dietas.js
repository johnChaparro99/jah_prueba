$(function () {
	cargarDietaAsignada();
});

function cargarDietaAsignada(){
	let cedula = $('#cedula_usuario_dt').val();

	$.post('../controller/ctrl_dietas.php', {accion:'cargarDietaAsignada', cedula: cedula}, function(resp) {
	    let respuesta = jQuery.parseJSON(resp);

	    if(respuesta.success){
	    	//console.log(respuesta.tabla);
	    	$('#tb_ver_dieta').html(respuesta.tabla);
	    }
	});
}
