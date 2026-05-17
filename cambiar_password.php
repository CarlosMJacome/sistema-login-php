<?php

session_start();

include("conexion.php");

// Verificar sesión
if (!isset($_SESSION['usuario'])) {

    header("Location: login.php");
    exit();

}

$id = $_SESSION['usuario'];

// Buscar usuario
$sql = "SELECT * FROM usuarios WHERE id='$id'";

$resultado = $conn->query($sql);

$usuario = $resultado->fetch_assoc();

if ($_POST) {

    $actual = $_POST['actual'];
    $nueva = $_POST['nueva'];
    $confirmar = $_POST['confirmar'];

    // Verificar contraseña actual
    if (password_verify($actual, $usuario['password'])) {

        // Verificar coincidencia
        if ($nueva == $confirmar) {

            // Crear hash nuevo
            $hash = password_hash($nueva, PASSWORD_DEFAULT);

            $update = "UPDATE usuarios
                       SET password='$hash'
                       WHERE id='$id'";

            if ($conn->query($update)) {

                echo "Contraseña actualizada correctamente";

            } else {

                echo "Error al actualizar";

            }

        } else {

            echo "Las nuevas contraseñas no coinciden";

        }

    } else {

        echo "La contraseña actual es incorrecta";

    }
}

?>

<h2>Cambiar Contraseña</h2>

<form method="POST">

    <label>Contraseña actual:</label>
    <br>

    <input type="password" name="actual" required>

    <br><br>

    <label>Nueva contraseña:</label>
    <br>

    <input type="password" name="nueva" required>

    <br><br>

    <label>Confirmar nueva contraseña:</label>
    <br>

    <input type="password" name="confirmar" required>

    <br><br>

    <button type="submit">Cambiar Contraseña</button>

</form>

<br>

<a href="perfil.php">Volver al perfil</a>