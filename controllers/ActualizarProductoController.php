<?php

namespace Controllers;

use MVC\Router;
use Model\AdminBuscador;

class ActualizarProductoController
{

    public static function actualizar(Router $router)
    {
        $id = $_GET['id'] ?? null;
        $tabla = $_GET['tabla'] ?? null;

        if (!$id || !$tabla) {
            header('Location: /admin');
        }

        $propiedad = AdminBuscador::findInTable($id, $tabla);
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['propiedad'];
            $propiedad->sincronizar($args);
            $errores = $propiedad->validar();

            if (empty($errores)) {
                $propiedad->guardar();
            }
        }

        $router->render('productos/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'tabla' => $tabla
        ]);
    }
}
