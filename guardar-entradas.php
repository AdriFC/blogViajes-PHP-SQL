<?php

//Comprobar que llegan datos por POST
if(isset($_POST)){

    //Conexión a la bbdd
    require_once 'includes/conexion.php';

    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $continente = isset($_POST['continente']) ? (int)$_POST['continente'] : false;
    $usuario = $_SESSION['usuario']['id'];

       //Validación
       $errores = array();

       //Validar el continente antes de guardarlo en la bbdd
       if(empty($titulo)){
           $errores['titulo'] = 'El título no es válido';
       }

       if(empty($descripcion)){
        $errores['descripcion'] = 'La descripción no es válida';
    }

    if(empty($continente) && !is_numeric($continente)){
        $errores['continente'] = 'El continente no es válido';
    }


       if(count($errores) == 0){
           if(isset($_GET['editar'])){
               $entrada_id = $_GET['editar'];
               $usuario_id = $_SESSION['usuario']['id'];

                $sql = "UPDATE entradas SET titulo='$titulo', descripcion='$descripcion', continente_id=$continente ".
                        "WHERE id= $entrada_id AND usuario_id = $usuario_id";
            }else{
                    $sql = "INSERT INTO entradas VALUES (null, $usuario, $continente, '$titulo', '$descripcion', CURDATE());";
            }
           
           $guardar = mysqli_query($db, $sql);
           header("Location: index.php");

       }else{
           $_SESSION["errores_entrada"] = $errores;
           
           if(isset($_GET['editar'])){
                header("Location: crear-entradas.php?id=".$_GET['editar']);
           }else{
                 header("Location: crear-entradas.php");
           }
           
       }
}



?>