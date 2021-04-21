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

function conseguirContinente($conexion, $id){

    $sql = "SELECT * FROM continentes WHERE id = $id;";
    $continentes = mysqli_query($conexion, $sql);

    $resultado = array();
    if ($continentes && mysqli_num_rows($continentes) >= 1){
        $resultado = mysqli_fetch_assoc($continentes);
    }

    return $resultado;
}

function conseguirEntradas($conexion, $limit = null, $continente = null, $busqueda = null){
    $sql="SELECT e.*, c.nombre AS 'continente' FROM entradas e ".
         "INNER JOIN continentes c ON e.continente_id = c.id ";
         

         if(!empty($continente)){
             $sql .= "WHERE e.continente_id = $continente ";
         }

         if(!empty($busqueda)){
            $sql .= "WHERE e.titulo LIKE '%$busqueda%'";
        }

         $sql .= "ORDER BY e.id DESC ";

         if($limit){
             $sql .="LIMIT 4";
         }

        //  echo $sql;
        //  die();

         $entradas = mysqli_query($conexion, $sql);
         $resultado = array();

         if($entradas && mysqli_num_rows($entradas) >=1){
             $resultado = $entradas;
         }

         return $entradas;
}

function conseguirEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre AS 'continente', CONCAT(u.nombre, ' ', u.apellidos) AS usuario" 
            . " FROM entradas e ".
           "INNER JOIN continentes c ON e.continente_id = c.id ".
           "INNER JOIN usuarios u ON e.usuario_id = u.id ".
           "WHERE e.id = $id";
           
    $entrada = mysqli_query($conexion, $sql);

    $resultado = array();
    if($entrada && mysqli_num_rows($entrada) >= 1){
        $resultado = mysqli_fetch_assoc($entrada);
    }

    return $resultado;

}

function conseguiTodasEntradas($conexion){
    $sql="SELECT e.*, c.nombre AS 'continente' FROM entradas e ".
         "INNER JOIN continentes c ON e.continente_id = c.id ".
         "ORDER BY e.id DESC";
         $entradas = mysqli_query($conexion, $sql);
         $resultado = array();
         if($entradas && mysqli_num_rows($entradas) >=1){
             $resultado = $entradas;
         }

         return $entradas;
}

?>