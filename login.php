<?php

session_start();

include("conexion.php");

if ($_POST) {

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {

        $usuario = $resultado->fetch_assoc();

        // Verificar contraseña
        if (password_verify($password, $usuario['password'])) {

            $_SESSION['usuario'] = $usuario['id'];

            header("Location: perfil.php");

        } else {

            echo "Contraseña incorrecta";

        }

    } else {

        echo "Correo no encontrado";

    }
}

?>

<h2>Iniciar Sesión</h2>

<form method="POST">

    <input type="email" name="correo" placeholder="Correo" required>
    <br><br>

    <input type="password" name="password" placeholder="Contraseña" required>
    <br><br>

    <button type="submit">Ingresar</button>

</form>