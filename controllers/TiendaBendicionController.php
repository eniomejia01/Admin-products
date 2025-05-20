<?php

namespace Controllers;

use MVC\Router;
use Model\TiendaBendicion;

class TiendaBendicionController{

    public static function index(Router $router){

        $tienda_bendicion_productos = TiendaBendicion::all();


        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('tienda_bendicion/manager', [

            'tienda_bendicion_productos' => $tienda_bendicion_productos,
            'resultado' => $resultado,
        ]);
    }

    public static function crear( Router $router){

        $alertas= [];
        $bendicion_productos = new TiendaBendicion();
        

        // Ejecutar el codigo, despues de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            
            // Crear una nueva instancia
            $bendicion_productos = new TiendaBendicion($_POST['tienda_p']);
            
            
            // validadr que no haya campos vacíos
            $alertas = $bendicion_productos -> validar();
            
            // No hay alertas
            if(empty($alertas)) {
                $bendicion_productos-> guardar();
                header('Location: /crear');
                exit; 
            }
            
        }

        $router -> render('tienda_bendicion/crear', [

            'tienda_p' => $bendicion_productos,
            'alertas' => $alertas


        ]);

    }

    public static function actualizar( Router $router){

        // Obtener datos del vendedor a actualizar
        $id = validarORedireccionar('/manager');
        $tienda_p = TiendaBendicion::find($id);
        $errores = TiendaBendicion::getErrores();

        // Ejecutar el codigo, despues de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            

            // Asignar los valores
            $args = $_POST['tienda_p'];

            // Sincronizar objeto en memoria con lo que el usuario escribió
            $tienda_p -> sincronizar($args);

            // validacion
            $errores = $tienda_p->validar();

            if (empty($errores)) {
                $tienda_p->guardar();
                // Redireccionar a manager con código de resultado 2 (actualizado correctamente)
                header('Location: /manager?resultado=2');
                exit; // Importante añadir exit después de redireccionar
            }
        }

        $router->render('/tienda_bendicion/actualizar', [
            'tienda_p' => $tienda_p,
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
                    $tienda_p = TiendaBendicion::find($id);
                    $tienda_p->eliminar();
                }
            }
        }
    }
}