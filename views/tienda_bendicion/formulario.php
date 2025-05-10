<fieldset>
        <legend>Informacion producto</legend>

        <label for="titulo">Nombre:</label>
        <input type="text" 
                id="titulo" 
                name="tienda_p[nombre_producto]" 
                placeholder="Nombre Producto" 
                value="<?php echo s ( $tienda_p -> nombre_producto ); ?>">

        
        <label for="descripcion">Descripcion:</label>
        <textarea name="tienda_p[descripcion]" 
        id="descripcion" 
        cols="30" rows="10"> <?php echo s($tienda_p -> descripcion); ?></textarea>
        
        <label for="precio">Precio:</label>
        <input type="text" 
                id="precio" 
                name="tienda_p[precio]" 
                placeholder="Precio Producto" 
                value="<?php echo s($tienda_p -> precio); ?>" 
        />

        <label for="precioCliente">PrecioCliente:</label>
        <input type="text" 
                id="precioCliente" 
                name="tienda_p[precioCliente]" 
                placeholder="Precio Producto Cliente" 
                value="<?php echo s($tienda_p -> precioCliente); ?>" 
        />

</fieldset>
