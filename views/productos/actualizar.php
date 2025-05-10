<main class="contenedor seccion">
    <h1>Actualizar Producto</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <div class="product">
        <a href="/buscadorAdmin" class="boton boton-verde">Volver</a>

        <form action="/productos/actualizar?id=<?php echo $propiedad->id; ?>&tabla=<?php echo $tabla; ?>" class="formulario" method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>
            <input type="submit" value="Actualizar Producto" class="boton boton-verde">
        </form>
    </div>
</main>