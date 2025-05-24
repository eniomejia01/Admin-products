<?php

namespace Controllers;

use Model\VariedadesProductos;
use MVC\Router;

class VariedadesPedidosController{


    public static function crear(Router $router)
    {

        $alertas = [];
        $variedades = new VariedadesProductos;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crea una nueva instancia
            $variedades = new VariedadesProductos($_POST['variedades']);

            // Validar
            $alertas = $variedades->validar();

            // Revisar que el arreglo de alertas este vacio
            if (empty($alertas)) {
                // Guardar en la BD
                $variedades->guardar();
                header('Location: /crear');
                exit;
            }
        }


        $router->render('pedidosVariedades/crear', [
            'variedades' => $variedades,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router)
    {

        $id = validarORedireccionar('/index-pedidos');
        $variedades = VariedadesProductos::find($id);
        $errores = VariedadesProductos::getErrores();

        // Método Post para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // asignar los atributos
            $args = $_POST['variedades'];

            $variedades->sincronizar($args);

            $errores = $variedades->validar();

            if (empty($errores)) {
                $variedades->guardar();
                // Redireccionar a manager con código de resultado 2 (actualizado correctamente)
                header('Location: /index-pedidos?resultado=2');
                exit; // Importante añadir exit después de redireccionar
            }
        }

        $router->render('/pedidosVariedades/actualizar', [
            'variedades' => $variedades,
            'errores' => $errores,

        ]);
    }

}