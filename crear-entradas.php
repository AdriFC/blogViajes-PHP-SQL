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
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '' ?>

            <label for="descripcion">Descripción:</label> 
            <textarea type="text" name="descripcion"></textarea>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '' ?>

            <label for="continente">Continente:</label> 
            <select name="continente">
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
            </select>

            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'continente') : '' ?>

            <input type="submit" value="Guardar">
        </form> 
        <?php borrarErrores(); ?>
</div>      

<?php require_once 'includes/pie.php';  ?>