<div class="navBuscador">
    <h1 class="titleBuscador">Buscar productos Reyes</h1>
</div>


<div class="contenedor">

    <div class="verProductos">
        <i class="bi-i bi-arrow-left-square-fill"></i>
        <a href="/manager-reyes">Ver todos los productos</a>
    </div>

    <form class="formulario" method="POST">
        
        <div class="contenedorBuscador">
            <label for="busqueda">Buscar:</label>
            <input class="widthInput" type="text" name="busqueda" id="busqueda" placeholder="Buscar Producto">
            <input type="submit" value="Buscar">
        </div>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>PrecioCliente</th>
                </tr>
            </thead>

            <tbody> <!--  Mostrar los Resultados -->
                <?php if (!empty($resultado)): ?>
                    <?php foreach ($resultado as $propiedad): ?>
                        <tr>
                            <td><?php echo $propiedad->id; ?></td>
                            <td><?php echo $propiedad->nombre_producto; ?></td>
                            <td><?php echo $propiedad->descripcion; ?></td>
                            <td>Q <?php echo $propiedad->precio; ?></td>
                            <td>Q <?php echo $propiedad->precioCliente; ?></td>
                            <td>
                                <a href="/productos/actualizar?id=<?php echo $propiedad->id; ?>&tabla=<?php echo $propiedad->tabla_origen; ?>" class="boton-amarillo-actualizar">Actualizar</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No se encontraron resultados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </form>

</div>