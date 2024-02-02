<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre'], $_POST['telf'], $_POST['correo'], $_POST['edad'])) {
        $NombreApellido = $_POST['nombre'];
        $Telefono = $_POST['telf'];
        $Correo = $_POST['correo'];
        $Edad = $_POST['edad'];

        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $sql = "UPDATE estudiantes SET nombreApellido = ?, telf = ?, correo = ?, edad = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $NombreApellido, $Telefono, $Correo, $Edad, $id);
        } else {
            $sql = "INSERT INTO estudiantes (nombreApellido, telf, correo, edad) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $NombreApellido, $Telefono, $Correo, $Edad);
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
