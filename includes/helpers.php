<?php

function mostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }

    return $alerta;
}

function borrarErrores(){
    
    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        $borrado = true;
    }

    if(isset($_SESSION['errores_entrada'])){
        $_SESSION['errores_entrada'] = null;
        $borrado = true;
        
    }

    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        $borrado = true;
    }
}

function conseguirContinentes($conexion){

    $sql = "SELECT * FROM continentes ORDER BY id ASC;";
    $continentes = mysqli_query($conexion, $sql);

    $resultado = array();
    if ($continentes && mysqli_num_rows($continentes) >= 1){
        $resultado = $continentes;
    }

    return $resultado;
}

function conseguirUltimasEntradas($conexion){
    $sql="SELECT e.*, c.nombre AS 'continente' FROM entradas e ".
         "INNER JOIN continentes c ON e.continente_id = c.id ".
         "ORDER BY e.id DESC LIMIT 4";
         $entradas = mysqli_query($conexion, $sql);
         $resultado = array();
         if($entradas && mysqli_num_rows($entradas) >=1){
             $resultado = $entradas;
         }

         return $entradas;
}
?>