<?php

//Comprobar que llegan datos por POST
if(isset($_POST)){

    //Conexión a la bbdd
    require_once 'includes/conexion.php';

    //Iniciar sesión si no está iniciada
    if(!isset($_SESSION)){
        session_start();
    }
    
    //Recoger los valores del formulario de registro con operador ternario
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    //Aray de errores
    $errores = array();

    //Validar los datos antes de guardarlos en la bbdd
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido";
    }

    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son válidos";
    }

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El email no es válido";
    }

    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "La contraseña está vacía";
    }

    //var_dump($errores);

    $guardar_usuario = false;

    if(count($errores) == 0){
        $guardar_usuario = true;
        //Cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['COST'=>4]);

        //Insertar usuario en la tabla usuarios de la bbdd
        $sql = "INSERT INTO usuarios VALUES (null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql);

        // var_dump(mysqli_error($db));
        // die();

        if($guardar){
            $_SESSION['completado'] = "El registro se ha completado con éxito!!";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar usuario!!";
        }
    }else{
        $_SESSION['errores'] = $errores;
    }
}

header('Location: index.php');

?>