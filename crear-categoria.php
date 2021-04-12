<?php require_once 'includes/redireccion.php'; ?>  
<?php require_once 'includes/cabecera.php'; ?>  
<?php require_once 'includes/lateral.php'; ?>

<div id="principal">
        <h1>Crear continentes</h1>
        <p>
            Añade nuevos continentes al blog para que los usuarios puedan usarlos.
        </p>
        <form action="guardar-categoria.php" method="POST">     
            <label for="nombre">Nombre del continente:</label> 
            <input type="text" name="nombre">
            <input type="submit" value="Guardar">
        </form> 
</div>      

<?php require_once 'includes/pie.php';  ?>