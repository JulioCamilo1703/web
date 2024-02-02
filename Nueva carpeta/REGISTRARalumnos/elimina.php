<?php
require '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = $conn->real_escape_string($_POST['id']);

        $sql = "DELETE FROM estudiantes WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Operación de eliminación exitosa
            header('Location: ../../instituto/REGISTRARalumnos/estudiantes.php');
            exit();
        } else {
            echo "Error al eliminar el registro: " . $stmt->error;
        }

        $stmt->close();
    } 
}
?>