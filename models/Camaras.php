<?php

namespace Model;

class Camaras extends ActiveRecord {

    protected static $tabla = 'camaras';

    protected static $columnasDB = ['id', 'nombre_producto', 'precio', 'precioCliente', 'descripcion', 'actualizado'];

    public $id;
    public $nombre_producto;
    public $precio;
    public $precioCliente;
    public $descripcion;
    public $actualizado; 


    
    public function __construct($args = [])
    {
        $this -> id                      = $args['id'] ?? null;
        $this -> nombre_producto         = $args['nombre_producto'] ?? '';
        $this -> precio                  = $args['precio'] ?? '';
        $this -> precioCliente           = $args['precioCliente'] ?? '';
        $this -> descripcion             = $args['descripcion'] ?? '';
        $this -> actualizado             = date('Y/m/d');


    }

    public function validar() {
        
        if(!$this -> nombre_producto){
            self::$alertas['error'][] = "Debes añadir nombre del producto";
        }


        if(!$this -> precio){
            self::$alertas['error'][] = 'El precio es obligatorio';
        }

        if(!$this -> precioCliente){
            self::$alertas['error'][] = 'El precioCliente es obligatorio';
        }

        // if( strlen( !$this -> descripcion ) >= 20 ){
        //     self::$alertas['error'][] = 'La descripción es obligatoria Y debe tener al menos 20 caracteres';
        // }

        if( !$this -> descripcion ){
            self::$alertas['error'][] = 'La descripción es obligatoria Y debe tener al menos 20 caracteres';
        }

        return self::$alertas;
    }

    public function guardar()
    {
        // Actualizar la fecha antes de guardar
        $this->actualizado = date('Y/m/d');

        if (!is_null($this->id)) {
            // Actualizar
            $this->actualizar();
        } else {
            // Crear un nuevo registro
            $this->crear();
        }
    }
}