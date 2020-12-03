<?php 
ob_start();
function conectar(){
 
	$user="epiz_27376931";
	$db="epiz_27376931_sistemas";
	$pass = "hj7CPr92l7K";
	$server="sql302.epizy.com";
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