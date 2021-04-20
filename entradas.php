<?php require_once 'includes/cabecera.php' ?>
   
<?php require_once 'includes/lateral.php'; ?>

    <!--MAIN-->
    <div id="principal">
        <h1>Todas las entradas</h1>

    <?php 
        $entradas = conseguirEntradas($db);
        if(!empty($entradas)):
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
        endif;
    ?>


    </div> <!-- fin principal-->      

<?php require_once 'includes/pie.php';  ?>