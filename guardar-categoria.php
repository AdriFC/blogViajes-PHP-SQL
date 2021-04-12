<?php

//Comprobar que llegan datos por POST
if(isset($_POST)){

    //Conexión a la bbdd
    require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

       //Aray de errores
       $errores = array();

       //Validar el continente antes de guardarlo en la bbdd
       if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
           $nombre_validado = true;
       }else{
           $nombre_validado = false;
           $errores['nombre'] = "El continente no es válido";
       }

       if(count($errores) == 0){
           $sql = "INSERT INTO continentes VALUES (NULL, '$nombre');";
           $guardar = mysqli_query($db, $sql);
       }
}

header("Location: index.php");

?>