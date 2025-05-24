<main class="contenedor">

    <h1>Página de Pedidos</h1>

    <div class="verProductos">
        <i class="bi-i bi-arrow-left-square-fill"></i>
        <a href="/admin">Inicio</a>
    </div>

        <h1>Productos</h1>

        <?php
        if (isset($_GET['resultado']) && empty($alertas)) {
            $mensaje = mostrarNotificacion(intval($_GET['resultado']));
            if ($mensaje) {
                echo "<div class='alerta exito'>{$mensaje}</div>";
            }
        }
        ?>

        <a href="/pedidos/crear" class="boton boton-verde">Agregar Producto Medicinas</a>

        <h2 class="botons" id="mostrar"><span class="alinear">Productos Medicina</span>
            <i class="bi bi-dash-circle-fill"></i>
        </h2>

        <table class="propiedades oculto" id="mostrarlistaactive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--  Mostrar los Resultados -->
                <?php foreach ($productos_medicinas as $medicina): ?>
                    <tr>
                        <td> <?php echo $medicina->id; ?> </td>
                        <td> <?php echo $medicina->nombre_producto;  ?> </td>
                        <td> <?php echo $medicina->descripcion ?></td>
                        <td>Q <?php echo $medicina->precio ?></td>


                        <td>
                            <a href="/pedidos/actualizar?id=<?php echo $medicina->id; ?>" class="boton-amarillo-actualizar">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <a href="/pedidosDulceria/crear" class="boton boton-verde">Agregar Producto Dulcería</a>

        <h2 class="botons" id="mostrar"><span class="alinear">Productos Dulcería</span>
            <i class="bi bi-dash-circle-fill"></i>
        </h2>

        <table class="propiedades oculto" id="mostrarlistaactive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--  Mostrar los Resultados -->
                <?php foreach ($productos_dulceria as $dulces): ?>
                    <tr>
                        <td> <?php echo $dulces->id; ?> </td>
                        <td> <?php echo $dulces->nombre_producto;  ?> </td>
                        <td> <?php echo $dulces->descripcion ?></td>
                        <td>Q <?php echo $dulces->precio ?></td>


                        <td>
                            <a href="/pedidosDulceria/actualizar?id=<?php echo $dulces->id; ?>" class="boton-amarillo-actualizar">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <a href="/pedidosDeposito/crear" class="boton boton-verde">Agregar Producto Depósito</a>

        <h2 class="botons" id="mostrar"><span class="alinear">Productos Depósito</span>
            <i class="bi bi-dash-circle-fill"></i>
        </h2>

        <table class="propiedades oculto" id="mostrarlistaactive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--  Mostrar los Resultados -->
                <?php foreach ($productos_deposito as $deposito): ?>
                    <tr>
                        <td> <?php echo $deposito->id; ?> </td>
                        <td> <?php echo $deposito->nombre_producto;  ?> </td>
                        <td> <?php echo $deposito->descripcion ?></td>
                        <td>Q <?php echo $deposito->precio ?></td>


                        <td>
                            <a href="/pedidosDeposito/actualizar?id=<?php echo $deposito->id; ?>" class="boton-amarillo-actualizar">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <a href="/pedidosCohetes/crear" class="boton boton-verde">Agregar Producto Cohetes</a>

        <h2 class="botons" id="mostrar"><span class="alinear">Productos Cohetes</span>
            <i class="bi bi-dash-circle-fill"></i>
        </h2>

        <table class="propiedades oculto" id="mostrarlistaactive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--  Mostrar los Resultados -->
                <?php foreach ($productos_cohetes as $cohete): ?>
                    <tr>
                        <td> <?php echo $cohete->id; ?> </td>
                        <td> <?php echo $cohete->nombre_producto;  ?> </td>
                        <td> <?php echo $cohete->descripcion ?></td>
                        <td>Q <?php echo $cohete->precio ?></td>


                        <td>
                            <a href="/pedidosCohetes/actualizar?id=<?php echo $cohete->id; ?>" class="boton-amarillo-actualizar">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <a href="/pedidosVariedades/crear" class="boton boton-verde">Agregar Producto Variedades</a>
                
        <h2 class="botons" id="mostrar"><span class="alinear">Productos Variedades</span>
            <i class="bi bi-dash-circle-fill"></i>
        </h2>

        <table class="propiedades oculto" id="mostrarlistaactive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--  Mostrar los Resultados -->
                <?php foreach ($productos_variedades as $variedad): ?>
                    <tr>
                        <td> <?php echo $variedad->id; ?> </td>
                        <td> <?php echo $variedad->nombre_producto;  ?> </td>
                        <td> <?php echo $variedad->descripcion ?></td>
                        <td>Q <?php echo $variedad->precio ?></td>


                        <td>
                            <a href="/pedidosVariedades/actualizar?id=<?php echo $variedad->id; ?>" class="boton-amarillo-actualizar">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>



</main>