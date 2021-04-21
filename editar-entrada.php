<?php require_once 'includes/redireccion.php'; ?>  

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

<div id="principal">
        <h1>Editar entrada</h1>
        <p>
            Edita tu entrada <?=$entradaActual['titulo']?>
        </p>
        <br>
        <form action="guardar-entradas.php?editar=<?=$entradaActual['id']?>" method="POST">     
            <label for="titulo">Título:</label> 
            <input type="text" name="titulo" value="<?=$entradaActual['titulo']?>">
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '' ?>

            <label for="descripcion">Descripción:</label> 
            <textarea type="text" name="descripcion"><?=$entradaActual['descripcion']?></textarea>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '' ?>

            <label for="continente">Continente:</label> 
            <select name="continente">
            <?php 
                $continentes = conseguirContinentes($db);
                if(!empty($continentes)):
                    while($continente = mysqli_fetch_assoc($continentes)):
            ?>
               
                <option value="<?=$continente['id']?>" <?=($continente['id'] == $entradaActual['continente_id']) ? 'selected="selected"' : '' ?>>
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

<?php 
    $entradaActual = conseguirEntrada($db, $_GET['id']);
    if(!isset($entradaActual['id'])){
        header("Location: index.php");
    }
?>




<?php require_once 'includes/pie.php';  ?>