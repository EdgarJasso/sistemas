<?php 
ob_start();
function conectar(){
 
	/*$user="reliabl1";
	$db="reliabl1_pruebas";
	$pass="6kdT2k9cJ2";
	$server="67.227.144.72";
	$con=mysqli_connect($server,$user,$pass,$db) or die("Error".mysql_error());
    */
//    $user="YhqF5BBmwH";
//	$db="YhqF5BBmwH";
//	$pass="ArhDcwsUBQ";
//	$server="remotemysql.com";
//	$con=mysqli_connect($server,$user, $pass,$db) or die("Error".mysql_error());
	
	$user="root";
	$db="sistemas";
	$server="localhost";
    
	$con=mysqli_connect($server,$user,"",$db) or die("Error".mysqli_connect_error());
	$base=mysqli_set_charset($con,"utf8")or die ("Error".mysqli_connect_error());
    
    //echo "Connected successfully";
	return $con;
}
function desconectar(){
   		$con= null;
    return $con;
 	}
 ?>  