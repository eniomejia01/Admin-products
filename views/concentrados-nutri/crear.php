<main class="contenedor seccion">

    <h1>Crear Producto Nutri-Animal</h1>

    <?php foreach($errores  as $error): ?>
        <div class="alerta  error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <div class="product">

        <a href="/manager-nutri-animal" class="boton boton-verde espacio">Volver</a>

        <form action="" class="formulario" method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>
            <input type="submit" value="Agregar Producto" class="boton boton-verde">
        </form>
        
    </div>

</main>