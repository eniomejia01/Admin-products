<?php

namespace Controllers;

use MVC\Router;
use Model\Variedades;

class VariedadesController{

    public static function crear( Router $router){


        $alertas = [];
        $variedades_productos = new Variedades();
        

        // Ejecutar el codigo, despues de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {


            // Crear una nueva instancia
            $variedades_productos = new Variedades($_POST['variedades_p']);


            // validadr que no haya campos vacíos
            $alertas = $variedades_productos -> validar();

            // No hay alertas
            if(empty($alertas)) {
                $variedades_productos-> guardar();
                header('Location: /crear');
                exit;
            }

        }

        $router -> render('variedades/crear', [

            'variedades_p' => $variedades_productos,
            'alertas' => $alertas


        ]);

    }

    public static function actualizar( Router $router){

        $errores = Variedades::getErrores();
        $id = validarORedireccionar('/admin');

        // Obtener datos del vendedor a actualizar
        $variedades_p = Variedades::find($id);

        // Ejecutar el codigo, despues de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            

            // Asignar los valores
            $args = $_POST['variedades_p'];

            // Sincronizar objeto en memoria con lo que el usuario escribió
            $variedades_p -> sincronizar($args);

            // validacion
            $errores = $variedades_p->validar();

            if(empty($errores)) {
                $variedades_p->guardar();
            }
        }

        $router->render('variedades/actualizar', [
            'variedades_p' => $variedades_p,
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
                    $variedades_p = Variedades::find($id);
                    $variedades_p->eliminar();
                }
            }
        }
    }
}