<?php

namespace Controllers;

use Model\DulceriaProductos;
use MVC\Router;

class DulceriaController{


    public static function crear(Router $router)
    {

        $alertas = [];
        $dulceria = new DulceriaProductos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crea una nueva instancia
            $dulceria = new DulceriaProductos($_POST['dulceria']);

            // Validar
            $alertas = $dulceria->validar();

            // Revisar que el arreglo de alertas este vacio
            if (empty($alertas)) {
                // Guardar en la BD
                $dulceria->guardar();
                header('Location: /crear');
                exit;
            }
        }


        $router->render('pedidosDulceria/crear', [
            'dulceria' => $dulceria,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router)
    {

        $id = validarORedireccionar('/index-pedidos');
        $dulceria = DulceriaProductos::find($id);
        $errores = DulceriaProductos::getErrores();

        // Método Post para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // asignar los atributos
            $args = $_POST['dulceria'];

            $dulceria->sincronizar($args);

            $errores = $dulceria->validar();

            if (empty($errores)) {
                $dulceria->guardar();
                // Redireccionar a manager con código de resultado 2 (actualizado correctamente)
                header('Location: /index-pedidos?resultado=2');
                exit; // Importante añadir exit después de redireccionar
            }
        }

        $router->render('/pedidosDulceria/actualizar', [
            'dulceria' => $dulceria,
            'errores' => $errores,

        ]);
    }

}