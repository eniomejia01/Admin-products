<?php

if (!isset($_SESSION)) { // si ya estaba arrancada la sesion, entonces no hecemos nada
    session_start(); // si no esta iniciada la session, entonces la vamos a iniciar
}

$auth = $_SESSION['login_copy'] ?? null;

?>


<header class="header <?php echo $inicio  ? 'inicio' : ''; ?>">



    <div class="contenedor contenido-header">
        <div class="barra">

            <div class="nombre-usuario">
                <p><?php echo $nombre ?? ''; ?></p>
            </div>

            <div class="buscadorProductos">
                <a href="/buscador">Buscar Productos</a>
            </div>

            <nav class="navegacion boton-cerrar-sesion">
                <?php if ($auth): ?>
                    <a href="/">Cerrar Sesión</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>




<main class="contenedor">

    <div class="barrita">

        <div class="centrado">
            <h2 class="botons" id="mostrar">

                <span class="alinear">Productos Estanteria 1</span>
                <i class="bi bi-dash-circle-fill"></i>

            </h2>
        </div>

    </div>



    <table class="propiedades oculto" id="mostrarlistaactive">
        <thead>
            <tr>
                <!-- <th>I</th> -->
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>PrecioCliente</th>

            </tr>
        </thead>

        <tbody> <!--  Mostrar los Resultados -->
            <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <!-- <td><input type="text" id="cantidad"></td> -->
                    <td class="pequenio"> <?php echo $propiedad->id; ?> </td>
                    <td> <?php echo $propiedad->nombre_producto;  ?> </td>
                    <td> <?php echo $propiedad->descripcion ?></td>
                    <td>Q <?php echo $propiedad->precio ?></td>
                    <td>Q <?php echo $propiedad->precioCliente ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>

    </table>

    <div class="barrita">

        <div class="centrado">
            <h2 class="botons" id="mostrar2">
                <span class="alinear">Productos Estanteria 2</span>
                <i class="bi bi-dash-circle-fill"></i>
            </h2>
        </div>

    </div>



    <table class="propiedades oculto" id="mostrarEstanteria2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>PrecioCliente</th>
            </tr>
        </thead>

        <tbody> <!--  Mostrar los Resultados -->
            <?php foreach ($estanteria2_productos as $estanteria_2): ?>
                <tr>
                    <td> <?php echo $estanteria_2->id; ?> </td>
                    <td> <?php echo $estanteria_2->nombre_producto;  ?> </td>
                    <td> <?php echo $estanteria_2->descripcion ?></td>
                    <td>Q <?php echo $estanteria_2->precio ?></td>
                    <td>Q <?php echo $estanteria_2->precioCliente ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>


    <div class="barrita">
        <div class="centrado">
            <h2 class="botons" id="botonMostrar3">
                <span class="alinear">Productos Estanteria 3</span>
                <i class="bi bi-dash-circle-fill"></i>
            </h2>
        </div>
    </div>


    <table class="propiedades oculto" id="mostrarEstanteria3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>PrecioCliente</th>
            </tr>
        </thead>

        <tbody> <!--  Mostrar los Resultados -->
            <?php foreach ($estanteria3_productos as $estanteria_3): ?>
                <tr>
                    <td> <?php echo $estanteria_3->id; ?> </td>
                    <td> <?php echo $estanteria_3->nombre_producto;  ?> </td>
                    <td> <?php echo $estanteria_3->descripcion ?></td>
                    <td>Q <?php echo $estanteria_3->precio ?></td>
                    <td>Q <?php echo $estanteria_3->precioCliente ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <div class="barrita">
        <div class="centrado">
            <h2 class="botons" id="botonMostrar4">
                <span class="alinear">Productos Mostradores</span>
                <i class="bi bi-dash-circle-fill"></i>
            </h2>
        </div>
    </div>

    <table class="propiedades oculto" id="mostrarMostradores">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>PrecioCliente</th>
            </tr>
        </thead>

        <tbody> <!--  Mostrar los Resultados -->
            <?php foreach ($mostradores_productos as $mostradores): ?>
                <tr>
                    <td> <?php echo $mostradores->id; ?> </td>
                    <td> <?php echo $mostradores->nombre_producto;  ?> </td>
                    <td> <?php echo $mostradores->descripcion ?></td>
                    <td>Q <?php echo $mostradores->precio ?></td>
                    <td>Q <?php echo $mostradores->precioCliente ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <div class="barrita">
        <div class="centrado">
            <h2 class="botons" id="botonMostrar5">
                <span class="alinear">Productos Camaras</span>
                <i class="bi bi-dash-circle-fill"></i>
            </h2>
        </div>
    </div>

    <table class="propiedades oculto" id="mostrarCamaras">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Precio</th>
            </tr>
        </thead>

        <tbody> <!--  Mostrar los Resultados -->
            <?php foreach ($camaras_productos as $camaras_p): ?>
                <tr>
                    <td> <?php echo $camaras_p->id; ?> </td>
                    <td> <?php echo $camaras_p->nombre_producto;  ?> </td>
                    <td> <?php echo $camaras_p->descripcion ?></td>
                    <td>Q <?php echo $camaras_p->precio ?></td>
                    <td>Q <?php echo $camaras_p->precioCliente ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <div class="barrita">
        <div class="centrado">
            <h2 class="botons" id="botonMostrar6">
                <span class="alinear"> Productos Concentrados</span>
                <i class="bi bi-dash-circle-fill"></i>
            </h2>
        </div>
    </div>

    <table class="propiedades oculto" id="mostrarConcentrados">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>PrecioCliente</th>
            </tr>
        </thead>

        <tbody> <!--  Mostrar los Resultados -->
            <?php foreach ($concentrados_productos as $concentrado_p): ?>
                <tr>
                    <td> <?php echo $concentrado_p->id; ?> </td>
                    <td> <?php echo $concentrado_p->nombre_producto;  ?> </td>
                    <td> <?php echo $concentrado_p->descripcion ?></td>
                    <td>Q <?php echo $concentrado_p->precio ?></td>
                    <td>Q <?php echo $concentrado_p->precioCliente ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <div class="barrita">
        <div class="centrado">
            <h2 class="botons" id="botonMostrar7">
                <span class="alinear"> Productos Variedades</span>
                <i class="bi bi-dash-circle-fill"></i>
            </h2>
        </div>
    </div>


    <table class="propiedades oculto" id="mostrarVariedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>PrecioCliente</th>
            </tr>
        </thead>

        <tbody> <!--  Mostrar los Resultados -->
            <?php foreach ($variedades_productos as $variedades_p): ?>
                <tr>
                    <td> <?php echo $variedades_p->id; ?> </td>
                    <td> <?php echo $variedades_p->nombre_producto;  ?> </td>
                    <td> <?php echo $variedades_p->descripcion ?></td>
                    <td>Q <?php echo $variedades_p->precio ?></td>
                    <td>Q <?php echo $variedades_p->precioCliente ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</main>

<footer class="footer seccion">
    <p class="copyright">Todos los derechos reservados
        <?php echo date('Y') ?> &copy;</p>
</footer>