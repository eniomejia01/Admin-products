<fieldset>
        <legend>Informacion producto</legend>

        <label for="titulo">Nombre:</label>
        <input type="text" 
                id="titulo" 
                name="cohete[nombre_producto]" 
                placeholder="Nombre Producto" 
                value="<?php echo s ( $cohete -> nombre_producto ); ?>">

        <label for="descripcion">Descripcion:</label>
        <textarea name="cohete[descripcion]" 
        id="descripcion" 
        cols="30" rows="10"> <?php echo s($cohete -> descripcion); ?></textarea>

        <label for="precio">Precio:</label>
        <input type="text" 
                id="precio" 
                name="cohete[precio]" 
                placeholder="Precio Producto" 
                value="<?php echo s($cohete -> precio); ?>" 
        />


</fieldset>
