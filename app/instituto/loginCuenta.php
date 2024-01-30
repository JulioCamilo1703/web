<?php
require '../config/database.php';

if (isset($_POST['botonLogin'])) {

    $nombreUsuario = mysqli_real_escape_string($conn, $_POST['UsuarioLogin']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['passwordLogin']);

    // Consulta para obtener información del usuario desde la tabla "registros"
    $querySelectUsuario = "SELECT id, NombreCompleto, Clave FROM registros WHERE NombreUsuario = ?";
    $stmtSelectUsuario = $conn->prepare($querySelectUsuario);
    $stmtSelectUsuario->bind_param("s", $nombreUsuario);
    $stmtSelectUsuario->execute();

    $resultadoSelectUsuario = $stmtSelectUsuario->get_result();

    if ($resultadoSelectUsuario->num_rows > 0) {
        $filaUsuario = $resultadoSelectUsuario->fetch_assoc();
        $idUsuario = $filaUsuario['id'];
        $nombreCompleto = $filaUsuario['NombreCompleto'];
        $claveHash = $filaUsuario['Clave'];

        if (password_verify($contrasena, $claveHash)) {
            
            session_start();
            $_SESSION['idUsuario'] = $idUsuario;
            $_SESSION['nombreCompleto'] = $nombreCompleto;

            // Puedes redirigir a una página principal común para todos los usuarios
            header("Location: ../instituto/paginaInicioDocente.php");
            exit();
        } else {
            echo "Contraseña incorrecta. Inténtalo nuevamente.";
        }
    } else {
        echo "Usuario no encontrado. Verifica el nombre de usuario e inténtalo nuevamente.";
    }

    $stmtSelectUsuario->close();
    $conn->close();
}
?>