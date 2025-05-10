<?php

namespace Model;

class Buscador extends ActiveRecord
{
    protected static $tablas = ['productos', 'variedades', 'concentrados', 'camaras', 'mostradores', 'estanteria_2', 'estanteria_3'];

    protected static $columnasDB = ['id', 'nombre_producto', 'precio', 'descripcion', 'precioCliente'];

    public $id;
    public $nombre_producto;
    public $precio;
    public $descripcion;
    public $precioCliente;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre_producto = $args['nombre_producto'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precioCliente = $args['precioCliente'] ?? '';
    }

    public function getProductos($busqueda)
    {
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
