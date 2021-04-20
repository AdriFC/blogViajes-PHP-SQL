<?php require_once 'includes/conexion.php' ?>
<?php require_once 'includes/helpers.php' ?>

<?php 
    $entradaActual = conseguirEntrada($db, $_GET['id']);
    if(!isset($entradaActual['id'])){
        header("Location: index.php");
    }
?>

<?php require_once 'includes/cabecera.php' ?>
<?php require_once 'includes/lateral.php'; ?>

    <!--MAIN-->
    <div id="principal">

        <h1><?=$entradaActual['titulo']?></h1>
        <a href="continente.php?id=<?=$entradaActual['continente_id']?>">
            <h2><?=$entradaActual['continente']?></h2>
        </a>
        <h4><?=$entradaActual['fecha']?></h4>
        <p>
            <?=$entradaActual['descripcion']?>
        </p>

    </div> <!-- fin principal-->      

<?php require_once 'includes/pie.php';  ?>