<fieldset>
        <legend>Informacion producto</legend>

        <label for="titulo">Nombre:</label>
        <input type="text" 
                id="titulo" 
                name="dulceria[nombre_producto]" 
                placeholder="Nombre Producto" 
                value="<?php echo s ( $dulceria -> nombre_producto ); ?>">

        <label for="descripcion">Descripcion:</label>
        <textarea name="dulceria[descripcion]" 
        id="descripcion" 
        cols="30" rows="10"> <?php echo s($dulceria -> descripcion); ?></textarea>

        <label for="precio">Precio:</label>
        <input type="text" 
                id="precio" 
                name="dulceria[precio]" 
                placeholder="Precio Producto" 
                value="<?php echo s($dulceria -> precio); ?>" 
        />


</fieldset>
