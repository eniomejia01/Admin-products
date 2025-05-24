<?php

namespace Controllers;

use Model\DepositoProductos;
use MVC\Router;

class DepositoController{


    public static function crear(Router $router)
    {

        $alertas = [];
        $deposito = new DepositoProductos;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crea una nueva instancia
            $deposito = new DepositoProductos($_POST['deposito']);

            // Validar
            $alertas = $deposito->validar();

            // Revisar que el arreglo de alertas este vacio
            if (empty($alertas)) {
                // Guardar en la BD
                $deposito->guardar();
                header('Location: /crear');
                exit;
            }
        }


        $router->render('pedidosDeposito/crear', [
            'deposito' => $deposito,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router)
    {

        $id = validarORedireccionar('/index-pedidos');
        $deposito = DepositoProductos::find($id);
        $errores = DepositoProductos::getErrores();

        // Método Post para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // asignar los atributos
            $args = $_POST['deposito'];

            $deposito->sincronizar($args);

            $errores = $deposito->validar();

            if (empty($errores)) {
                $deposito->guardar();
                // Redireccionar a manager con código de resultado 2 (actualizado correctamente)
                header('Location: /index-pedidos?resultado=2');
                exit; // Importante añadir exit después de redireccionar
            }
        }

        $router->render('/pedidosDeposito/actualizar', [
            'deposito' => $deposito,
            'errores' => $errores,

        ]);
    }

}