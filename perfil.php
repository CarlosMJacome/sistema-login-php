<?php

session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

include("conexion.php");

// Verificar sesión
if (!isset($_SESSION['usuario'])) {

    header("Location: login.php");
    exit();

}

$id = $_SESSION['usuario'];

// Actualizar datos
if ($_POST) {

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    // Validar campos vacíos
    if (!empty($nombre) && !empty($correo)) {

        // Validar correo
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {

            $update = "UPDATE usuarios
                       SET nombre='$nombre',
                           correo='$correo'
                       WHERE id='$id'";

            if ($conn->query($update)) {

                echo "Datos actualizados correctamente";

            } else {

                echo "Error al actualizar";

            }

        } else {

            echo "Correo inválido";

        }

    } else {

        echo "Todos los campos son obligatorios";

    }
}

// Buscar usuario
$sql = "SELECT * FROM usuarios WHERE id='$id'";

$resultado = $conn->query($sql);

$usuario = $resultado->fetch_assoc();

?>

<h2>Perfil de Usuario</h2>

<form method="POST">

    <label>Nombre:</label>
    <br>

    <input type="text"
           name="nombre"
           value="<?php echo $usuario['nombre']; ?>"
           required>

    <br><br>

    <label>Correo:</label>
    <br>

    <input type="email"
           name="correo"
           value="<?php echo $usuario['correo']; ?>"
           required>

    <br><br>

    <button type="submit">Actualizar Datos</button>

</form>

<br>

<a href="cambiar_password.php">Cambiar contraseña</a>

<br><br>

<a href="logout.php">Cerrar sesión</a>