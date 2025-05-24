<?php


namespace Controllers;

use Model\Camaras;
use Model\Concentrados;
use MVC\Router;
use Model\Propiedad;
use Model\Estanteria;
use Model\Estanteria3;
use Model\Mostradores;
use Model\Variedades;

class PropiedadController {


    public static function index(Router $router) {
        
        $propiedades = Propiedad::all();
        $estanterias2 = Estanteria::all();
        $estanterias3 = Estanteria3::all();
        $mostradores_p = Mostradores::all();
        $camaras       = Camaras::all();
        $concentrado   = Concentrados::all();
        $variedad      = Variedades::all();

            // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [

            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'estanterias2' => $estanterias2,
            'estanterias3' => $estanterias3,
            'mostradores_p' => $mostradores_p,
            'camaras' => $camaras,
            'concentrado' => $concentrado,
            'variedad' => $variedad,
            'nombre' => $_SESSION['nombre'],

        ]);
    }

    public static function crear(Router $router) {

        $alertas = [];
        $propiedad = new Propiedad;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crea una nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);

            // Validar
            $alertas = $propiedad -> validar();
    
            // Revisar que el arreglo de alertas este vacio
            if(empty($alertas)){
                // Guardar en la BD
                $propiedad -> guardar();
                header('Location: /crear');
                exit;
            }
    
            
        }


        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();

        // Método Post para actualizar
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // asignar los atributos
            $args = $_POST['propiedad'];
    
            $propiedad -> sincronizar($args);
    
            $errores = $propiedad->validar();

            if (empty($errores)) {
                $propiedad->guardar();
                // Redireccionar a manager con código de resultado 2 (actualizado correctamente)
                header('Location: /admin?resultado=2');
                exit; // Importante añadir exit después de redireccionar
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,

        ]);

    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
    
            if($id){
    
                $tipo = $_POST['tipo'];
    
                if(validarTipoContenido($tipo)) {            
                    // Compara lo que vamos a eliminar
                    $propiedad = Propiedad::find($id);
                    $propiedad-> eliminar();
                } 
            }
        }
    }


}