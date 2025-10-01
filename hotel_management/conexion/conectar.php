<?php
function f_conectar(){
	$clave = "";
	$servidor = "localhost";
	$usuario = "root";
	$bd = "hotel_management"; 
	$con = mysqli_connect($servidor,$usuario,$clave) or die ("error conectando".mysqli_error());
	mysqli_select_db($con,$bd);
	return $con;
}

?>