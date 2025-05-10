<fieldset>
        <legend>Informacion producto</legend>

        <label for="titulo">Nombre:</label>
        <input type="text" 
                id="titulo" 
                name="nutri_c[nombre_producto]" 
                placeholder="Nombre Producto" 
                value="<?php echo s ( $nutri_c -> nombre_producto ); ?>">

        
        <label for="descripcion">Descripcion:</label>
        <textarea name="nutri_c[descripcion]" 
        id="descripcion" 
        cols="30" rows="10"> <?php echo s($nutri_c -> descripcion); ?></textarea>
        
        <label for="precio">Precio:</label>
        <input type="text" 
                id="precio" 
                name="nutri_c[precio]" 
                placeholder="Precio Producto" 
                value="<?php echo s($nutri_c -> precio); ?>" 
        />

        <label for="precioCliente">PrecioCliente:</label>
        <input type="text" 
                id="precioCliente" 
                name="nutri_c[precioCliente]" 
                placeholder="Precio Producto Cliente" 
                value="<?php echo s($nutri_c -> precioCliente); ?>" 
        />

</fieldset>
