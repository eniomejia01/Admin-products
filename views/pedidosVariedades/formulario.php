<fieldset>
        <legend>Informacion producto</legend>

        <label for="titulo">Nombre:</label>
        <input type="text" 
                id="titulo" 
                name="variedades[nombre_producto]" 
                placeholder="Nombre Producto" 
                value="<?php echo s ( $variedades -> nombre_producto ); ?>">

        <label for="descripcion">Descripcion:</label>
        <textarea name="variedades[descripcion]" 
        id="descripcion" 
        cols="30" rows="10"> <?php echo s($variedades -> descripcion); ?></textarea>

        <label for="precio">Precio:</label>
        <input type="text" 
                id="precio" 
                name="variedades[precio]" 
                placeholder="Precio Producto" 
                value="<?php echo s($variedades -> precio); ?>" 
        />


</fieldset>
