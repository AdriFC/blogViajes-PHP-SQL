<?php require_once 'includes/conexion.php' ?>
<?php require_once 'includes/helpers.php' ?>

<?php 
    $continenteActual = conseguirContinente($db, $_GET['id']);
    if(!isset($continenteActual['id'])){
        header("Location: index.php");
    }
?>

<?php require_once 'includes/cabecera.php' ?>
<?php require_once 'includes/lateral.php'; ?>

    <!--MAIN-->
    <div id="principal">

        <h1>Entradas de <?=$continenteActual['nombre']?></h1>

    <?php 
        $entradas = conseguirEntradas($db, null, $_GET['id']);
        if(!empty($entradas) && mysqli_num_rows($entradas) >=1):
            while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
                <article class="entrada">
                    <!--<?php var_dump($entrada); ?>-->
                    <a href="entrada.php?id=<?=$entrada['id']?>">
                        <h2><?=$entrada['titulo']?></h2>
                        <span class="fecha"><?= $entrada['continente'].' | '.$entrada['fecha']?></span>
                        <p><?=substr($entrada['descripcion'], 0, 180). "..."?></p>
                    </a>
                </article>

    <?php
            endwhile;
        else:
    ?>
        <div class="alerta">No hay entradas en este continente</div>
    <?php endif; ?>

    </div> <!-- fin principal-->      

<?php require_once 'includes/pie.php';  ?>