<main class="contenedor seccion">

    <h1>Crear Producto Nutri-Animal</h1>

    <?php
    if (isset($_GET['resultado']) && empty($alertas)) {
        $mensaje = mostrarNotificacion(intval($_GET['resultado']));
        if ($mensaje) {
            echo "<div class='alerta exito'>{$mensaje}</div>";
        }
    }
    ?>

    <?php include_once __DIR__ . '/../templates/alertas.php' ?>

    <div class="product">

        <a href="/manager-nutri-animal" class="boton boton-verde espacio">Volver</a>

        <form action="" class="formulario" method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>
            <input type="submit" value="Agregar Producto" class="boton boton-verde">
        </form>

    </div>

</main>