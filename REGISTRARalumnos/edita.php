<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'], $_POST['nombre'], $_POST['telf'], $_POST['correo'], $_POST['edad'])) {

        $id = $conn->real_escape_string($_POST['id']);
        $NombreApellido = $conn->real_escape_string($_POST['nombre']);
        $Telefono = $conn->real_escape_string($_POST['telf']);
        $Correo = $conn->real_escape_string($_POST['correo']);
        $Edad = $conn->real_escape_string($_POST['edad']);

        $sql = "UPDATE estudiantes SET nombreApellido=?, telf=?, correo=?, edad=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $NombreApellido, $Telefono, $Correo, $Edad, $id);

        if ($stmt->execute()) {
            // Operación de actualización exitosa
            header('Location: ../../instituto/REGISTRARalumnos/estudiantes.php');
            exit();
        } else {
            // Registro de error en producción, imprime en desarrollo
            error_log("Error al actualizar el registro: " . $stmt->error);
            echo "Hubo un error al actualizar el registro. Por favor, inténtalo de nuevo más tarde.";
        }

        $stmt->close();
    } else {
        echo "Datos del formulario no presentes";
    }
}
?>
