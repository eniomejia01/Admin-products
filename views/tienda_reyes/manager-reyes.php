<header class="navegation-n">
    <div class="buscadorProductos">
        <a href="/buscadorReyes">Buscar Productos Reyes</a>
    </div>
</header>

<main class="contenedor">

    <div class="verProductos">
        <i class="bi-i bi-arrow-left-square-fill"></i>
        <a href="/admin">Inicio</a>
    </div>

    <h1>Administrador de Tienda Reyes Magos</h1>

    <?php
        if ($resultado) {
            $mensaje = mostrarNotificacion(intval($resultado));

            if ($mensaje) { ?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p>
        <?php }
        }
    ?>


    <a href="/tienda_reyes/crear" class="boton boton-verde">Agregar Producto</a>

    <h2 class="botons" id="mostrar"><span class="alinear">Productos Estanteria 1</span>
        <i class="bi bi-dash-circle-fill"></i>
    </h2>

    <table class="propiedades oculto" id="mostrarlistaactive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>PrecioCliente</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!--  Mostrar los Resultados -->
            <?php foreach ($tienda_reyes_productos as $tienda_r): ?>
                <tr>
                    <td> <?php echo $tienda_r->id; ?> </td>
                    <td> <?php echo $tienda_r->nombre_producto;  ?> </td>
                    <td> <?php echo $tienda_r->descripcion ?></td>
                    <td>Q <?php echo $tienda_r->precio ?></td>
                    <td>Q <?php echo $tienda_r->precioCliente ?></td>
                    <td>

                        <a href="/tienda_reyes/actualizar?id=<?php echo $tienda_r->id; ?>" class="boton-amarillo-actualizar">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</main>

<footer class="footer seccion">
    <p class="copyright">Todos los derechos reservados
        <?php echo date('Y') ?> &copy;</p>
</footer>