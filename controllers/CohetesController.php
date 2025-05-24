<?php

namespace Controllers;

use Model\CohetesProductos;
use MVC\Router;

class CohetesController{


    public static function crear(Router $router)
    {

        $alertas = [];
        $cohete = new CohetesProductos;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crea una nueva instancia
            $cohete = new CohetesProductos($_POST['cohete']);

            // Validar
            $alertas = $cohete->validar();

            // Revisar que el arreglo de alertas este vacio
            if (empty($alertas)) {
                // Guardar en la BD
                $cohete->guardar();
                header('Location: /crear');
                exit;
            }
        }


        $router->render('pedidosCohetes/crear', [
            'cohete' => $cohete,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router)
    {

        $id = validarORedireccionar('/index-pedidos');
        $cohete = CohetesProductos::find($id);
        $errores = CohetesProductos::getErrores();

        // Método Post para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // asignar los atributos
            $args = $_POST['cohete'];

            $cohete->sincronizar($args);

            $errores = $cohete->validar();

            if (empty($errores)) {
                $cohete->guardar();
                // Redireccionar a manager con código de resultado 2 (actualizado correctamente)
                header('Location: /index-pedidos?resultado=2');
                exit; // Importante añadir exit después de redireccionar
            }
        }

        $router->render('/pedidosCohetes/actualizar', [
            'cohete' => $cohete,
            'errores' => $errores,

        ]);
    }

}