<?php

require '../config/database.php';

if (isset($_POST['crearCuenta'])) {
    // Validación básica de campos
    $nombreUsuario = isset($_POST['nombreUsuario']) ? trim($_POST['nombreUsuario']) : '';
    $nombreCompleto = isset($_POST['nombreCompleto']) ? trim($_POST['nombreCompleto']) : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    if (empty($nombreUsuario) || empty($nombreCompleto) || empty($contrasena)) {
        echo "Todos los campos son obligatorios.";
    } else {
        try {
            // Tu código existente de preparación y ejecución de consultas 
            $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

            $queryInsertRegistro = "INSERT INTO registros (NombreCompleto, NombreUsuario, Clave) VALUES (?, ?, ?)";
            $stmtInsertRegistro = $conn->prepare($queryInsertRegistro);
            $stmtInsertRegistro->bind_param("sss", $nombreCompleto, $nombreUsuario, $contrasenaHash);
            $stmtInsertRegistro->execute();

            $registroID = $stmtInsertRegistro->insert_id;

            $stmtInsertRegistro->close();

            if ($registroID) {
                // Redirigir al archivo correspondiente
                header("Location: ../instituto/registroExitoso.php");
                exit();
            } else {
                echo "Error al registrar el usuario.";
            }

        } catch (mysqli_sql_exception $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
    }
    $conexion->close();
}

?>















