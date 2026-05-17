<?php

include("conexion.php");

if ($_POST) {

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Verificar si el correo ya existe
    $verificar = $conn->query("SELECT * FROM usuarios WHERE correo='$correo'");

    if ($verificar->num_rows > 0) {

        echo "El correo ya está registrado";

    } else {

        // Encriptar contraseña
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios(cedula, nombre, correo, password)
                VALUES('$cedula', '$nombre', '$correo', '$hash')";

        if ($conn->query($sql)) {

            echo "Usuario registrado correctamente";

        } else {

            echo "Error al registrar";

        }
    }
}

?>

<h2>Registro de Usuario</h2>

<form method="POST">

    <input type="text" name="cedula" placeholder="Cédula" required>
    <br><br>

    <input type="text" name="nombre" placeholder="Nombre" required>
    <br><br>

    <input type="email" name="correo" placeholder="Correo" required>
    <br><br>

    <input type="password" name="password" placeholder="Contraseña" required>
    <br><br>

    <button type="submit">Registrarse</button>

</form>