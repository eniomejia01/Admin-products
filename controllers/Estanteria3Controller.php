<?php

namespace Controllers;

use MVC\Router;
use Model\Estanteria3;

class Estanteria3Controller{

    public static function crear( Router $router){

        $alertas = [];        
        $estanteria3_productos = new Estanteria3();
        

        // Ejecutar el codigo, despues de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {


            // Crear una nueva instancia
            $estanteria3_productos = new Estanteria3($_POST['estanteria_3']);


            // validadr que no haya campos vacíos
            $alertas = $estanteria3_productos -> validar();

            // No hay alertas
            if(empty($alertas)) {
                $estanteria3_productos-> guardar();
                header('Location: /crear');
                exit; // Importante añadir exit después de redireccionar
            }

        }

        $router -> render('estanteria_3/crear', [

            'alertas' => $alertas,
            'estanteria_3' => $estanteria3_productos


        ]);

    }

    public static function actualizar( Router $router){

        $errores = Estanteria3::getErrores();
        $id = validarORedireccionar('/admin');

        // Obtener datos del vendedor a actualizar
        $estanteria_3 = Estanteria3::find($id);

        // Ejecutar el codigo, despues de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            

            // Asignar los valores
            $args = $_POST['estanteria_3'];

            // Sincronizar objeto en memoria con lo que el usuario escribió
            $estanteria_3 -> sincronizar($args);

            // validacion
            $errores = $estanteria_3->validar();

            if(empty($errores)) {
                $estanteria_3->guardar();
            }
        }

        $router->render('estanteria_3/actualizar', [
            'errores' => $errores,
            'estanteria_3' => $estanteria_3

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
                    $estanteria_3 = Estanteria3::find($id);
                    $estanteria_3->eliminar();
                }
            }
        }
    }
}