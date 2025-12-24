<main class="contenedor seccion">
    <h1>Crear Vendedor(a)</h1>

    <a href="/admin" class="boton-verde">Volver</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <?php include __DIR__ . "/formulario.php"; ?>
        <input type="submit" value="Crear Vendedor(a)" class="boton-verde">
    </form>
</main>