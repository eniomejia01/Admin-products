<header class="navegation-n">
        <div class="buscadorProductos">
            <a href="/buscadorNutri">Buscar Productos Nutri Animal</a>
        </div>
</header>

<main class="contenedor">

    <div class="verProductos">
        <i class="bi-i bi-arrow-left-square-fill"></i>
        <a href="/admin">Inicio</a>
    </div>

    <h1>Administrador de Concentrados Nutri-Animal</h1>

    <!-- <?php
            if ($resultado) {
                $mensaje = mostrarNotificacion(intval($resultado));

                if ($mensaje) { ?>
                        <p class="alerta exito"><?php echo s($mensaje) ?></p>
                    <?php }
            }
                    ?> -->

    <a href="/concentrados-nutri/crear" class="boton boton-verde">Agregar Producto</a>

    <h2 class="botons" id="mostrar"><span class="alinear">Productos Nutri-Animal</span>
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
            <?php foreach ($nutri_productos as $nutri_c): ?>
                <tr>
                    <td> <?php echo $nutri_c->id; ?> </td>
                    <td> <?php echo $nutri_c->nombre_producto;  ?> </td>
                    <td> <?php echo $nutri_c->descripcion ?></td>
                    <td>Q <?php echo $nutri_c->precio ?></td>
                    <td>Q <?php echo $nutri_c->precioCliente ?></td>
                    <td>

                        <a href="/concentrados-nutri/actualizar?id=<?php echo $nutri_c->id; ?>" class="boton-amarillo-actualizar">Actualizar</a>
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