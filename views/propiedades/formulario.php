<fieldset>
        <legend>Informacion producto</legend>

        <label for="titulo">Nombre:</label>
        <input type="text" 
                id="titulo" 
                name="propiedad[nombre_producto]" 
                placeholder="Nombre Producto" 
                value="<?php echo s ( $propiedad -> nombre_producto ); ?>">

        
        <label for="descripcion">Descripcion:</label>
        <textarea name="propiedad[descripcion]" 
        id="descripcion" 
        cols="30" rows="10"> <?php echo s($propiedad -> descripcion); ?></textarea>
        
        <label for="precio">Precio:</label>
        <input type="text" 
                id="precio" 
                name="propiedad[precio]" 
                placeholder="Precio Producto" 
                value="<?php echo s($propiedad -> precio); ?>" 
        />

        <label for="precioCliente">PrecioCliente:</label>
        <input type="text" 
                id="precioCliente" 
                name="propiedad[precioCliente]" 
                placeholder="Precio Producto Cliente" 
                value="<?php echo s($propiedad -> precioCliente); ?>" 
        />

</fieldset>
