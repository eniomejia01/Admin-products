<fieldset>
        <legend>Informacion producto</legend>

        <label for="titulo">Nombre:</label>
        <input type="text" 
                id="titulo" 
                name="tienda_r[nombre_producto]" 
                placeholder="Nombre Producto" 
                value="<?php echo s ( $tienda_r -> nombre_producto ); ?>">

        
        <label for="descripcion">Descripcion:</label>
        <textarea name="tienda_r[descripcion]" 
        id="descripcion" 
        cols="30" rows="10"> <?php echo s($tienda_r -> descripcion); ?></textarea>
        
        <label for="precio">Precio:</label>
        <input type="text" 
                id="precio" 
                name="tienda_r[precio]" 
                placeholder="Precio Producto" 
                value="<?php echo s($tienda_r -> precio); ?>" 
        />

        <label for="precioCliente">PrecioCliente:</label>
        <input type="text" 
                id="precioCliente" 
                name="tienda_r[precioCliente]" 
                placeholder="Precio Producto Cliente" 
                value="<?php echo s($tienda_r -> precioCliente); ?>" 
        />

</fieldset>
