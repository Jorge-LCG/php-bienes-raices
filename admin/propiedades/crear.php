<?php
    require "../../includes/funciones.php";
    incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Crear Propiedad</h1>

        <a href="/admin" class="boton-verde">Nueva Propiedad</a>

        <form class="formulario">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título de propiedad">
                
                <label for="precio">Precio</label>
                <input type="text" id="titulo" name="titulo" placeholder="Precio de la propiedad">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitacion">Habitaciones</label>
                <input type="number" id="habitacion" name="habitacion" placeholder="Ej: 3" min="1" max="9">
                
                <label for="wc">Baños</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9">
                
                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Información Vendedor</legend>

                <select name="vendedor" id="vendedor">
                    <option value="" selected disabled>--Seleccionar--</option>
                    <option value="1">Jorge</option>
                    <option value="2">Antonella</option>
                </select>
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

<?php
    incluirTemplate("footer"); 
?>