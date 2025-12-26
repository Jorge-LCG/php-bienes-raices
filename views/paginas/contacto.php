<main class="contenedor seccion contenido-centrado">
    <h1>Contacto</h1>

    <picture>
        <source srcset="build/img/jpg/destacada3.avif" type="imagen/avif">
        <source srcset="build/img/jpg/destacada3.webp" type="imagen/webp">
        <source srcset="build/img/jpg/destacada3.jpg" type="imagen/jpeg">
        <img src="build/img/jpg/destacada3.jpg" alt="imagen destacada">
    </picture>

    <h2>Llene el Formulaio de Contacto</h2>

    <form class="formulario" method="POST">
        <fieldset>
            <label for="nombre">Nombre</label>
            <input 
                type="text" 
                id="nombre" 
                name="contacto[nombre]" 
                placeholder="Tu nombre"
            >

            <label for="mensaje">Mensaje</label>
            <textarea 
                name="contacto[mensaje]"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra</label>
            <select name="contacto[tipo]" id="opciones">
                <option value="" disabled selected>--Seleccionar--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input 
                type="number" 
                placeholder="Tu precio o presupuesto" 
                id="presupuesto" 
                name="contacto[precio]"
            >
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser contactado:</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input 
                    type="radio" 
                    value="telefono" 
                    id="contactar-telefono" 
                    name="contacto[contacto]" 
                >

                <label for="contactar-email">E-mail</label>
                <input 
                    type="radio" 
                    value="email" 
                    id="contactar-email" 
                    name="contacto[contacto]" 
                >
            </div>

            <div id="contacto"></div>
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>