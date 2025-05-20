<?php

namespace Controllers;

use MVC\Router;
use Model\TiendaReyes;

class TiendaReyesMagosController{

    public static function index(Router $router){

        $tienda_reyes_productos = TiendaReyes::all();


        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('tienda_reyes/manager-reyes', [

            'tienda_reyes_productos' => $tienda_reyes_productos,
            'resultado' => $resultado,
        ]);
    }

    public static function crear(Router $router) {
        $alertas = [];
        $reyes_productos = new TiendaReyes();

        // Ejecutar el código después de que el usuario envía el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crear una nueva instancia
            $reyes_productos = new TiendaReyes($_POST['tienda_r']);

            // Validar que no haya campos vacíos
            $alertas = $reyes_productos->validar();

            // No hay errores
            if (empty($alertas)) {
                // Guardar el producto y capturar el resultado
                $reyes_productos->guardar(); 
                header('Location: /crear');
                exit; // Asegurarse de que nada más se ejecute después de la redirección

            } 
        }

        $router->render('tienda_reyes/crear', [
            'tienda_r' => $reyes_productos,
            'alertas' => $alertas
        ]);
    }


    public static function actualizar( Router $router){

        $id = validarORedireccionar('/manager-reyes');
        // Obtener datos del vendedor a actualizar
        $tienda_r = TiendaReyes::find($id);
        $errores = TiendaReyes::getErrores();

        // Ejecutar el codigo, despues de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            

            // Asignar los valores
            $args = $_POST['tienda_r'];

            // Sincronizar objeto en memoria con lo que el usuario escribió
            $tienda_r -> sincronizar($args);

            // validacion
            $errores = $tienda_r->validar();

            if(empty($errores)) {
                $tienda_r->guardar();
                // Redireccionar a manager con código de resultado 2 (actualizado correctamente)
                header('Location: /manager-reyes?resultado=2');
                exit; // Importante añadir exit después de redireccionar
            }
        }

        $router->render('/tienda_reyes/actualizar', [
            'tienda_r' => $tienda_r,
            'errores' => $errores

        ]);
    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // valida el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                // valida el tipo a eliminar
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)) {
                    $tienda_p = TiendaReyes::find($id);
                    $tienda_p->eliminar();
                }
            }
        }
    }
}