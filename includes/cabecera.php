<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog viajes</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!--CABECERA-->
    <header id="cabecera">
        <!--LOGO-->
        <div id="logo">
            <a href="index.php">
                Blog de viajes
            </a>
        </div>

        <!--MENU-->
        
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>

                <?php 
                    $continentes = conseguirContinentes($db);
                    if(!empty($continentes)):
  
                            while($continente = mysqli_fetch_assoc($continentes)) :
                ?>
                            <li>
                                <a href="continente.php?id=<?=$continente['id']?>"><?=$continente['nombre']?></a>
                            </li>

                <?php 
                            endwhile; 
                    endif;
                ?>
                <li>
                    <a href="index.php">Sobre nosotros</a>
                </li>
                <li>
                    <a href="index.php">Contacto</a>
                </li>
            </ul>
        </nav>

        <div class="clearfix"></div>

    </header>

    <div id="contenedor">