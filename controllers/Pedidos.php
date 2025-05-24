<?php

namespace Controllers;

use Model\CohetesProductos;
use Model\DepositoProductos;
use Model\DulceriaProductos;
use Model\MedicinaProductos;
use Model\VariedadesProductos;
use MVC\Router;

class Pedidos{

    public static function index( Router $router ){

        // Llamar a la base de datos
        $productos_medicinas = MedicinaProductos::all();
        $productos_dulceria = DulceriaProductos::all();
        $productos_deposito = DepositoProductos::all();
        $productos_cohetes = CohetesProductos::all();
        $productos_variedades = VariedadesProductos::all();

        $router->render('pedidos/index-pedidos', [
            'productos_medicinas' => $productos_medicinas,
            'productos_dulceria' => $productos_dulceria,
            'productos_deposito' => $productos_deposito,
            'productos_cohetes' => $productos_cohetes,
            'productos_variedades' => $productos_variedades
        ]);
    }

    public static function crear(Router $router)
    {

        $alertas = [];
        $medicina = new MedicinaProductos;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crea una nueva instancia
            $medicina = new MedicinaProductos($_POST['medicina']);

            // Validar
            $alertas = $medicina->validar();

            // Revisar que el arreglo de alertas este vacio
            if (empty($alertas)) {
                // Guardar en la BD
                $medicina->guardar();
                header('Location: /crear');
                exit;
            }
        }


        $router->render('pedidos/crear', [
            'medicina' => $medicina,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router)
    {

        $id = validarORedireccionar('/index-pedidos');
        $medicina = MedicinaProductos::find($id);
        $errores = MedicinaProductos::getErrores();

        // Método Post para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // asignar los atributos
            $args = $_POST['medicina'];

            $medicina->sincronizar($args);

            $errores = $medicina->validar();

            if (empty($errores)) {
                $medicina->guardar();
                // Redireccionar a manager con código de resultado 2 (actualizado correctamente)
                header('Location: /index-pedidos?resultado=2');
                exit; // Importante añadir exit después de redireccionar
            }
        }

        $router->render('/pedidos/actualizar', [
            'medicina' => $medicina,
            'errores' => $errores,

        ]);
    }

}