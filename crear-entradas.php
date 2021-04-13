<?php require_once 'includes/redireccion.php'; ?>  
<?php require_once 'includes/cabecera.php'; ?>  
<?php require_once 'includes/lateral.php'; ?>

<div id="principal">
        <h1>Crear entradas</h1>
        <p>
            Añade nuevas entradas al blog para que los usuarios puedan leerlas.
        </p>
        <br>
        <form action="guardar-entradas.php" method="POST">     
            <label for="titulo">Título:</label> 
            <input type="text" name="titulo">

            <label for="descripcion">Descripción:</label> 
            <textarea type="text" name="descripcion"></textarea>

            <label for="continente">Continente:</label> 
            <input name="continente">
            <?php 
                $continentes = conseguirContinentes($db);
                if(!empty($continentes)):
                    while($continente = mysqli_fetch_assoc($continentes)):
            ?>
               
                <option value="<?=$continente['id']?>">
                        <?=$continente['nombre']?>
                </option>
                
            <?php
                endwhile;
                endif;
            ?>

            <input type="submit" value="Guardar">
        </form> 
</div>      

<?php require_once 'includes/pie.php';  ?>