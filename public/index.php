<?php


require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\ActualizarProductoController;

use Controllers\AdminBuscadorController;
use Controllers\AdminBuscadorReyesController;
use Controllers\AdminBuscadorBendicionController;
use Controllers\AdminBuscadorNutriController;
use Controllers\BuscadorController;

use Controllers\EstanteriaController;
use Controllers\Estanteria3Controller;
use Controllers\PropiedadController;
use Controllers\LoginControllers;
use Controllers\ProductosController;
use Controllers\MostradoresController;
use Controllers\CamarasController;
use Controllers\CohetesController;
use Controllers\ConcentradosController;
use Controllers\ConcentradosNutriController;

use Controllers\DepositoController;
use Controllers\DulceriaController;
use Controllers\Pedidos;
use Controllers\VariedadesPedidosController;

use Controllers\TiendaBendicionController;
use Controllers\TiendaReyesMagosController;
use Controllers\VariedadesController;

$router = new Router();

// Zona Privada
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/buscadorAdmin', [AdminBuscadorController::class, 'buscarProductosAdmin']);
$router->post('/buscadorAdmin', [AdminBuscadorController::class, 'buscarProductosAdmin']);

$router->get('/buscadorReyes', [AdminBuscadorReyesController::class, 'buscarProductosReyesAdmin']);
$router->post('/buscadorReyes', [AdminBuscadorReyesController::class, 'buscarProductosReyesAdmin']);

$router->get('/buscadorNutri', [AdminBuscadorNutriController::class, 'buscarProductosNutriAdmin']);
$router->post('/buscadorNutri', [AdminBuscadorNutriController::class, 'buscarProductosNutriAdmin']);

$router->get('/buscadorBendicion', [AdminBuscadorBendicionController::class, 'buscarProductosBendicionAdmin']);
$router->post('/buscadorBendicion', [AdminBuscadorBendicionController::class, 'buscarProductosBendicionAdmin']);

$router->get('/productos/actualizar', [ActualizarProductoController::class, 'actualizar']);
$router->post('/productos/actualizar', [ActualizarProductoController::class, 'actualizar']);

// Tienda Bendicion
$router->get('/manager', [TiendaBendicionController::class, 'index']);
$router->get('/tienda_bendicion/crear', [TiendaBendicionController::class, 'crear']);
$router->post('/tienda_bendicion/crear', [TiendaBendicionController::class, 'crear']);
$router->get('/tienda_bendicion/actualizar', [TiendaBendicionController::class, 'actualizar']);
$router->post('/tienda_bendicion/actualizar', [TiendaBendicionController::class, 'actualizar']);
$router->post('/tienda_bendicion/eliminar', [TiendaBendicionController::class, 'eliminar']);

// Tienda Reyes
$router->get('/manager-reyes', [TiendaReyesMagosController::class, 'index']);
$router->get('/tienda_reyes/crear', [TiendaReyesMagosController::class, 'crear']);
$router->post('/tienda_reyes/crear', [TiendaReyesMagosController::class, 'crear']);
$router->get('/tienda_reyes/actualizar', [TiendaReyesMagosController::class, 'actualizar']);
$router->post('/tienda_reyes/actualizar', [TiendaReyesMagosController::class, 'actualizar']);
$router->post('/tienda_reyes/eliminar', [TiendaReyesMagosController::class, 'eliminar']);

// Tienda Concentrados Nutri
$router->get('/manager-nutri-animal', [ConcentradosNutriController::class, 'index']);
$router->get('/concentrados-nutri/crear', [ConcentradosNutriController::class, 'crear']);
$router->post('/concentrados-nutri/crear', [ConcentradosNutriController::class, 'crear']);
$router->get('/concentrados-nutri/actualizar', [ConcentradosNutriController::class, 'actualizar']);
$router->post('/concentrados-nutri/actualizar', [ConcentradosNutriController::class, 'actualizar']);
$router->post('/concentrados-nutri/eliminar', [ConcentradosNutriController::class, 'eliminar']);

// ESTANTERIA 2
$router->get('/estanteria_2/crear', [EstanteriaController::class, 'crear']);
$router->post('/estanteria_2/crear', [EstanteriaController::class, 'crear']);
$router->get('/estanteria_2/actualizar', [EstanteriaController::class, 'actualizar']);
$router->post('/estanteria_2/actualizar', [EstanteriaController::class, 'actualizar']);
$router->post('/estanteria_2/eliminar', [EstanteriaController::class, 'eliminar']);



// ESTANTERIA 3
$router->get('/estanteria_3/crear', [Estanteria3Controller::class, 'crear']);
$router->post('/estanteria_3/crear', [Estanteria3Controller::class, 'crear']);
$router->get('/estanteria_3/actualizar', [Estanteria3Controller::class, 'actualizar']);
$router->post('/estanteria_3/actualizar', [Estanteria3Controller::class, 'actualizar']);
$router->post('/estanteria_3/eliminar', [Estanteria3Controller::class, 'eliminar']);

// Mostradores
$router->get('/mostradores/crear', [MostradoresController::class, 'crear']);
$router->post('/mostradores/crear', [MostradoresController::class, 'crear']);
$router->get('/mostradores/actualizar', [MostradoresController::class, 'actualizar']);
$router->post('/mostradores/actualizar', [MostradoresController::class, 'actualizar']);
$router->post('/mostradores/eliminar', [MostradoresController::class, 'eliminar']);

// Camaras
$router->get('/camaras/crear', [CamarasController::class, 'crear']);
$router->post('/camaras/crear', [CamarasController::class, 'crear']);
$router->get('/camaras/actualizar', [CamarasController::class, 'actualizar']);
$router->post('/camaras/actualizar', [CamarasController::class, 'actualizar']);
$router->post('/camaras/eliminar', [CamarasController::class, 'eliminar']);

// Concentrados
$router->get('/concentrados/crear', [ConcentradosController::class, 'crear']);
$router->post('/concentrados/crear', [ConcentradosController::class, 'crear']);
$router->get('/concentrados/actualizar', [ConcentradosController::class, 'actualizar']);
$router->post('/concentrados/actualizar', [ConcentradosController::class, 'actualizar']);
$router->post('/concentrados/eliminar', [ConcentradosController::class, 'eliminar']);

// Variedades
$router->get('/variedades/crear', [VariedadesController::class, 'crear']);
$router->post('/variedades/crear', [VariedadesController::class, 'crear']);
$router->get('/variedades/actualizar', [VariedadesController::class, 'actualizar']);
$router->post('/variedades/actualizar', [VariedadesController::class, 'actualizar']);
$router->post('/variedades/eliminar', [VariedadesController::class, 'eliminar']);

$router->get('/paginas', [ProductosController::class, 'index']);

// Zona Pública

// $router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [LoginControllers::class, 'propiedades']);
$router->get('/propiedad', [LoginControllers::class, 'propiedad']);

$router->get('/buscador', [BuscadorController::class, 'buscarProductos']);
$router->post('/buscador', [BuscadorController::class, 'buscarProductos']);

// // Login y Autenticacion
$router->get('/', [LoginControllers::class, 'login_copy']);
$router->post('/', [LoginControllers::class, 'login_copy']);

// $router -> get('/login', [LoginControllers::class, 'login']);
// $router -> post('/login', [LoginControllers::class, 'login']);
$router->get('/logout', [LoginControllers::class, 'logout']);

// Crear Cuenta
$router->get('/crear-cuenta', [LoginControllers::class, 'crear']);
$router->post('/crear-cuenta', [LoginControllers::class, 'crear']);

// Confirma cuenta
$router->get('/confirmar-cuenta', [LoginControllers::class, 'confirmar']);
$router->get('/mensaje', [LoginControllers::class, 'mensaje']);


// Página pedidos / pedidos Medicinas
$router->get('/index-pedidos', [Pedidos::class, 'index']);
$router->post('/index-pedidos', [Pedidos::class, 'index']);
$router->get('/pedidos/crear', [Pedidos::class, 'crear']);
$router->post('/pedidos/crear', [Pedidos::class, 'crear']);
$router->get('/pedidos/actualizar', [Pedidos::class, 'actualizar']);
$router->post('/pedidos/actualizar', [Pedidos::class, 'actualizar']);

// Página pedidos / pedidos Dulcería
$router->get('/pedidosDulceria/crear', [DulceriaController::class, 'crear']);
$router->post('/pedidosDulceria/crear', [DulceriaController::class, 'crear']);
$router->get('/pedidosDulceria/actualizar', [DulceriaController::class, 'actualizar']);
$router->post('/pedidosDulceria/actualizar', [DulceriaController::class, 'actualizar']);

// Página pedidos / pedidos Deposito
$router->get('/pedidosDeposito/crear', [DepositoController::class, 'crear']);
$router->post('/pedidosDeposito/crear', [DepositoController::class, 'crear']);
$router->get('/pedidosDeposito/actualizar', [DepositoController::class, 'actualizar']);
$router->post('/pedidosDeposito/actualizar', [DepositoController::class, 'actualizar']);


// Página pedidos / pedidos Cohetes
$router->get('/pedidosCohetes/crear', [CohetesController::class, 'crear']);
$router->post('/pedidosCohetes/crear', [CohetesController::class, 'crear']);
$router->get('/pedidosCohetes/actualizar', [CohetesController::class, 'actualizar']);
$router->post('/pedidosCohetes/actualizar', [CohetesController::class, 'actualizar']);

// Página pedidos / pedidos Variedades
$router->get('/pedidosVariedades/crear', [VariedadesPedidosController::class, 'crear']);
$router->post('/pedidosVariedades/crear', [VariedadesPedidosController::class, 'crear']);
$router->get('/pedidosVariedades/actualizar', [VariedadesPedidosController::class, 'actualizar']);
$router->post('/pedidosVariedades/actualizar', [VariedadesPedidosController::class, 'actualizar']);

$router->comprobarRutas();
