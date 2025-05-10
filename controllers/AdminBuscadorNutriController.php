<?php

namespace Controllers;

use MVC\Router;
use Model\AdminBuscadorNutri;

class AdminBuscadorNutriController
{
    public static function buscarProductosNutriAdmin(Router $router)
    {
        $resultado = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $busqueda = $_POST['busqueda'] ?? '';
            // Reemplazamos FILTER_SANITIZE_STRING con una alternativa
            $busqueda = htmlspecialchars(strip_tags($busqueda), ENT_QUOTES, 'UTF-8');

            if (!empty($busqueda)) {
                $buscador = new AdminBuscadorNutri();
                $resultado = $buscador->getProductos($busqueda);
            }
        }

        $router->render('buscadorNutri/index', [
            'resultado' => $resultado,
        ]);
    }
}
