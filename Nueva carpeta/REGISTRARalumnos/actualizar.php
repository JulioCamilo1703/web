<?php
session_start();
require '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar la presencia de los datos necesarios
    if (isset($_POST['id'], $_POST['nombreApellido'], $_POST['telf'], $_POST['correo'], $_POST['edad'])) {
        // Obtener y escapar los datos del formulario
        $id = $conn->real_escape_string($_POST['id']);
        $nombre = $conn->real_escape_string($_POST['nombreApellido']);
        $telf = $conn->real_escape_string($_POST['telf']);
        $correo = $conn->real_escape_string($_POST['correo']);
        $edad = $conn->real_escape_string($_POST['edad']);

        if (empty($id)) {
            $sql = "INSERT INTO estudiantes (nombreApellido, telf, correo, edad) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $nombre, $telf, $correo, $edad);
        } else {
            $sql = "UPDATE estudiantes SET nombreApellido = ?, telf = ?, correo = ?, edad = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $nombre, $telf, $correo, $edad, $id);
        }

        if ($stmt->execute()) {
            $_SESSION['color'] = "success";
            $_SESSION['msg'] = "Registro " . (empty($id) ? "insertado" : "actualizado");
        } else {
            $_SESSION['color'] = "danger";
            $_SESSION['msg'] = "Error al " . (empty($id) ? "insertar" : "actualizar") . " registro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $_SESSION['color'] = "danger";
        $_SESSION['msg'] = "Datos del formulario no presentes";
    }

    header('location: ../../instituto/REGISTRARalumnos/estudiantes.php');
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error: Método de solicitud incorrecto";
    header('location: ../../instituto/REGISTRARalumnos/estudiantes.php');
}
?>