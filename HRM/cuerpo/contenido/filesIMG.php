<?php
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

include_once("../../php/connection.php");  
/*
$files_post = $_FILES['file'];
echo "<br>";
print_r($files_post);echo "<br>";
echo "Succefull";echo "<br>";
var_dump($_POST);echo "<br>";
echo "Succefull";echo "<br>";

$files = array();
$file_count = count($files_post['name']);
$file_keys = array_keys($files_post);

for ($i=0; $i < $file_count; $i++) 
{ 
	foreach ($file_keys as $key) 
	{
		$files[$i][$key] = $files_post[$key][$i];
	}
}


foreach ($files as $fileID => $file)
{
	$fileContent = file_get_contents($file['tmp_name']);

	file_put_contents($file['name'], $fileContent);
}
*/

$carpeta = 'Archivos';
    
    $id_empleado = $_POST['id_empleadoND'];
    $titulo = "Imagen de Perfil";
    $desc = "Imagen de Perfil";
    $tipo = $_FILES['archivo']['type'];
    $tamano = $_FILES['archivo']['size'];
           
    $nombre = $_FILES['archivo']['name'];
    $tmp = $_FILES['archivo']['tmp_name'];
    
    $PATH = $carpeta.'/'.$id_empleado;
    $path = $PATH.'/'.$nombre;

    
if(!file_exists($carpeta)){
    mkdir($carpeta,0777, true);
    if(file_exists($carpeta)){

       if(!file_exists($PATH)){
           mkdir($PATH, 0777, true);
           if(file_exists($PATH)){

               if(move_uploaded_file($tmp, $path)){
                   $database = new Connection();
                   $db = $database->open();
                   try {
                       $stmt = $db->prepare(
                           "insert into hrm_documentos
                           (id_empleado, titulo, descripcion, tipo,  tamano, ruta)
                           values
                           (:id_empleado, :titulo, :descripcion, :tipo,  :tamano, :ruta)");
                           $result= ($stmt->execute(array(
                            ':id_empleado' => $id_empleado,
                            ':titulo' => $titulo,
                            ':descripcion' => $desc,
                            ':tipo' => $tipo,
                            ':tamano' => $tamano,
                            ':ruta' => $path
                           )) ) ? '1' : '0';
                         echo $result;
                          // echo "archivo guardado con exito";
            
                   } catch (PDOException $e) {
                       echo $e->getMessage;
                   }
               }
           }
       }else{
        if(move_uploaded_file($tmp, $path)){
           
            $database = new Connection();
            $db = $database->open();
            try {
                $stmt = $db->prepare(
                    "insert into hrm_documentos
                    (id_empleado, titulo, descripcion, tipo,  tamano, ruta)
                           values
                           (:id_empleado, :titulo, :descripcion, :tipo,  :tamano, :ruta)");
                           $result= ($stmt->execute(array(
                            ':id_empleado' => $id_empleado,
                            ':titulo' => $titulo,
                            ':descripcion' => $desc,
                            ':tipo' => $tipo,
                     ':tamano' => $tamano,
                     ':ruta' => $path
                    )) ) ? '1' : '0';
                    echo $result;
                    //echo "archivo guardado con exito";
                    
            } catch (PDOException $e) {
                echo $e->getMessage;
            }
        }
       }  
    }
}else{

    if(!file_exists($PATH)){
        mkdir($PATH, 0777, true);
        if(file_exists($PATH)){

            if(move_uploaded_file($tmp, $path)){
               
                $database = new Connection();
                $db = $database->open();
                try {
                    $stmt = $db->prepare(
                        "insert into hrm_documentos
                        (id_empleado, titulo, descripcion, tipo,  tamano, ruta)
                           values
                           (:id_empleado, :titulo, :descripcion, :tipo,  :tamano, :ruta)");
                           $result= ($stmt->execute(array(
                            ':id_empleado' => $id_empleado,
                            ':titulo' => $titulo,
                            ':descripcion' => $desc,
                            ':tipo' => $tipo,
                         ':tamano' => $tamano,
                         ':ruta' => $path
                        )) ) ? '1' : '0';
                       echo $result;
                       // echo "archivo guardado con exito";
                } catch (PDOException $e) {
                    echo $e->getMessage;
                }
            }
        }
    }else{
    if(file_exists($PATH)){
     if(move_uploaded_file($tmp, $path)){
       
         $database = new Connection();
         $db = $database->open();
         try {
             $stmt = $db->prepare(
                 "insert into hrm_documentos
                 (id_empleado, titulo, descripcion, tipo,  tamano, ruta)
                           values
                           (:id_empleado,:titulo, :descripcion, :tipo,  :tamano, :ruta)");
                           $result= ($stmt->execute(array(
                            ':id_empleado' => $id_empleado,
                            ':titulo' => $titulo,
                            ':descripcion' => $desc,
                            ':tipo' => $tipo,
                  ':tamano' => $tamano,
                  ':ruta' => $path
                 )) ) ? '1' : '0';
                 echo $result;
                 //echo "archivo guardado con exito";
         } catch (PDOException $e) {
             echo $e;
         }
     }
    }  
}

}
}else {
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
    exit;
  }
?>