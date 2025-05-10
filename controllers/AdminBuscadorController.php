<?php

namespace Controllers;

use MVC\Router;
use Model\AdminBuscador;

class AdminBuscadorController
{
    public static function buscarProductosAdmin(Router $router)
    {
        $resultado = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $busqueda = $_POST['busqueda'] ?? '';
            // Reemplazamos FILTER_SANITIZE_STRING con una alternativa
            $busqueda = htmlspecialchars(strip_tags($busqueda), ENT_QUOTES, 'UTF-8');

            if (!empty($busqueda)) {
                $buscador = new AdminBuscador();
                $resultado = $buscador->getProductos($busqueda);
            }
        }

        $router->render('buscadorAdmin/index', [
            'resultado' => $resultado,
        ]);
    }
}
