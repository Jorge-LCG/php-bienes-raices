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
            
            <label for="email">E-mail</label>
            <input 
                type="email" 
                id="email" 
                name="contacto[email]" 
                placeholder="Tu email"
            >
            
            <label for="telefono">Teléfono</label>
            <input 
                type="tel" 
                id="telefono" 
                name="contacto[telefono]" 
                placeholder="Tu telefono"
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
            <div class="forma-contacto" id="contacto">
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

            <p>Si eligió teléfono, elija la fecha y hora</p>

            <label for="fecha">Fecha</label>
            <input 
                type="date" 
                id="fecha" 
                name="contacto[fecha]"
            >
            
            <label for="hora">Hora</label>
            <input 
                type="time" 
                id="hora" 
                min="09:00" 
                max="18:00" 
                name="contacto[hora]"
            >
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>