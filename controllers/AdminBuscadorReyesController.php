<?php

namespace Controllers;

use MVC\Router;
use Model\AdminBuscadorReyes;

class AdminBuscadorReyesController
{
    public static function buscarProductosReyesAdmin(Router $router)
    {
        $resultado = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $busqueda = $_POST['busqueda'] ?? '';
            // Reemplazamos FILTER_SANITIZE_STRING con una alternativa
            $busqueda = htmlspecialchars(strip_tags($busqueda), ENT_QUOTES, 'UTF-8');

            if (!empty($busqueda)) {
                $buscador = new AdminBuscadorReyes();
                $resultado = $buscador->getProductos($busqueda);
            }
        }

        $router->render('buscadorReyes/index', [
            'resultado' => $resultado,
        ]);
    }
}
