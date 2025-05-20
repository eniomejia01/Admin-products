<?php

namespace Controllers;

use Model\ConcentradosNutri;
use MVC\Router;

class ConcentradosNutriController{

    public static function index(Router $router){

        $nutri_productos = ConcentradosNutri::all();


        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('concentrados-nutri/manager-nutri-animal', [

            'nutri_productos' => $nutri_productos,
            'resultado' => $resultado,
        ]);
    }

    public static function crear( Router $router){

        $alertas = [];
        $concentrados_productos = new ConcentradosNutri();

        

        // Ejecutar el codigo, despues de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {


            // Crear una nueva instancia
            $concentrados_productos  = new ConcentradosNutri($_POST['nutri_c']);


            // validadr que no haya campos vacíos
            $alertas = $concentrados_productos-> validar();

            // No hay alertas$alertas
            if(empty($alertas)) {
                $concentrados_productos-> guardar();
                header('Location: /crear');
                exit;
            }

        }

        $router -> render('concentrados-nutri/crear', [

            'nutri_c' => $concentrados_productos,
            'alertas' => $alertas


        ]);

    }

    public static function actualizar( Router $router){

        $id = validarORedireccionar('/manager-nutri-animal');
        // Obtener datos del producto a actualizar
        $nutri_c = ConcentradosNutri::find($id);
        $errores = ConcentradosNutri::getErrores();

        // Ejecutar el codigo, despues de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            

            // Asignar los valores
            $args = $_POST['nutri_c'];

            // Sincronizar objeto en memoria con lo que el usuario escribió
            $nutri_c -> sincronizar($args);

            // validacion
            $errores = $nutri_c->validar();

            if(empty($errores)) {
                $nutri_c->guardar();
                // Redireccionar a manager con código de resultado 2 (actualizado correctamente)
                header('Location: /manager-nutri-animal?resultado=2');
                exit; // Importante añadir exit después de redireccionar
            }
        }

        $router->render('/concentrados-nutri/actualizar', [
            'nutri_c' => $nutri_c,
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
                    $nutri_c = ConcentradosNutri::find($id);
                    $nutri_c->eliminar();
                }
            }
        }
    }
}