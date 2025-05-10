<?php

namespace Model;

class AdminBuscadorReyes extends ActiveRecord
{
    protected static $tablas = ['tienda_reyes_magos'];

    protected static $columnasDB = ['id', 'nombre_producto', 'precio', 'descripcion', 'precioCliente'];

    public $id;
    public $nombre_producto;
    public $precio;
    public $descripcion;
    public $precioCliente;
    public $tabla_origen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre_producto = $args['nombre_producto'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precioCliente = $args['precioCliente'] ?? '';
        $this->tabla_origen = $args['tabla_origen'] ?? '';
    }

    public static function findInTable($id, $tabla)
    {
        $query = "SELECT * FROM {$tabla} WHERE id = {$id}";
        $resultado = self::consultarSQL($query);
        if (!empty($resultado)) {
            $producto = array_shift($resultado);
            $producto->tabla_origen = $tabla;
            return $producto;
        }
        return null;
    }

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    public function validar()
    {
        $errores = [];
        if (!$this->nombre_producto) {
            $errores[] = "El nombre del producto es obligatorio";
        }
        if (!$this->descripcion) {
            $errores[] = "La descripción es obligatoria";
        }
        if (!$this->precio) {
            $errores[] = "El precio es obligatorio";
        }
        if (!$this->precioCliente) {
            $errores[] = "El precio para el cliente es obligatorio";
        }
        return $errores;
    }

    public function guardar()
    {
        $tabla = $this->tabla_origen; // Asumiendo que tienes esta propiedad
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE {$tabla} SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /buscadorReyes');
            return true;
        }
        return false;
    }

    public function getProductos($busqueda)
    {

        // Al inicio del método
        $busqueda = preg_replace('/[^a-zA-Z0-9 ]/', '', $busqueda);  // Solo permite letras, números y espacios

        $resultados = [];

        // Construir la consulta UNION para buscar en todas las tablas
        $queries = [];
        foreach (self::$tablas as $tabla) {
            $queries[] = "(SELECT '{$tabla}' AS tabla_origen, id, nombre_producto, precio, descripcion, precioCliente FROM {$tabla} WHERE nombre_producto LIKE ?)";
        }
        $fullQuery = implode(' UNION ALL ', $queries);

        // Preparar y ejecutar la consulta
        $stmt = self::$db->prepare($fullQuery);
        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . self::$db->error);
        }

        // Bind parameters
        $busquedaParam = '%' . $busqueda . '%';
        $bindTypes = str_repeat('s', count(self::$tablas));
        $bindParams = array_fill(0, count(self::$tablas), $busquedaParam);
        $stmt->bind_param($bindTypes, ...$bindParams);

        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_object()) {
            $resultados[] = $row;
        }

        $stmt->close();
        return $resultados;
    }
}
