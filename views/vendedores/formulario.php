<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre</label>
    <input 
        type="text" 
        id="nombre" 
        name="vendedor[nombre]" 
        placeholder="Nombre del vendedor" 
        value="<?php echo sanitizar($vendedor->nombre); ?>"
    >
    
    <label for="apellido">Apellido</label>
    <input 
        type="text" 
        id="apellido" 
        name="vendedor[apellido]" 
        placeholder="Apellido del vendedor" 
        value="<?php echo sanitizar($vendedor->apellido); ?>"
    >
</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="telefono">Teléfono</label>
    <input 
        type="tel" 
        id="telefono" 
        name="vendedor[telefono]" 
        placeholder="Telefono del vendedor" 
        value="<?php echo sanitizar($vendedor->telefono); ?>"
    >
</fieldset>