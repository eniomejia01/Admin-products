<?php

namespace Controllers;

use MVC\Router;
use Model\Buscador;

class BuscadorController
{
    public static function buscarProductos(Router $router)
    {
        $resultado = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $busqueda = $_POST['busqueda'] ?? '';
            // Reemplazamos FILTER_SANITIZE_STRING con una alternativa
            $busqueda = htmlspecialchars(strip_tags($busqueda), ENT_QUOTES, 'UTF-8');

            if (!empty($busqueda)) {
                $buscador = new Buscador();
                $resultado = $buscador->getProductos($busqueda);
            }
        }

        $router->render('buscador/index', [
            'resultado' => $resultado,
        ]);
    }
}
