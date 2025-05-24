<fieldset>
        <legend>Informacion producto</legend>

        <label for="titulo">Nombre:</label>
        <input type="text" 
                id="titulo" 
                name="deposito[nombre_producto]" 
                placeholder="Nombre Producto" 
                value="<?php echo s ( $deposito -> nombre_producto ); ?>">

        <label for="descripcion">Descripcion:</label>
        <textarea name="deposito[descripcion]" 
        id="descripcion" 
        cols="30" rows="10"> <?php echo s($deposito -> descripcion); ?></textarea>

        <label for="precio">Precio:</label>
        <input type="text" 
                id="precio" 
                name="deposito[precio]" 
                placeholder="Precio Producto" 
                value="<?php echo s($deposito -> precio); ?>" 
        />


</fieldset>
