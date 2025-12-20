<?php
    require "includes/app.php";
    $db = conectarBD();

    $correo = "correo@gmail.com";
    $password = "123123";
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO usuarios (email, password) VALUE ('$correo', '$passwordHash');";
    $resultado = mysqli_query($db, $query);

    mysqli_close($db);
?>