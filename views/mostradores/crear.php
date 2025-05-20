<main class="contenedor seccion">

    <h1>Crear Producto | Mostradores</h1>

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
        <a href="/admin" class="boton boton-verde">Volver</a>

        <form action="" class="formulario" method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>
            <input type="submit" value="Agregar Producto" class="boton boton-verde">
        </form>
    </div>


</main>