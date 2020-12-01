<?php 
ob_start();
function conectar(){
 
	$user="3571327_sistemas";
	$db="3571327_sistemas";
	$pass = "alohomora_5246";
	$server="fdb29.awardspace.net";
/*
	$user="root";
	$db="sistemas";
	$pass = "";
	$server="localhost";
*/
	
	
    
	$con=mysqli_connect($server,$user,$pass,$db) or die("Error".mysqli_connect_error());
	$base=mysqli_set_charset($con,"utf8")or die ("Error".mysqli_connect_error());
    
    //echo "Connected successfully";
	return $con;
}
function desconectar(){
   		$con= null;
    return $con;
 	}
 ?>  