<?php
require '../../config/database.php';

if (isset($_POST['id'])) {
    $idArchivo = $_POST['id'];

    // Realiza la consulta para obtener el nombre del archivo
    $query = "SELECT nombre_archivo FROM biblioteca WHERE id = $idArchivo";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombreArchivo = $row['nombre_archivo'];

        // Elimina el registro de la base de datos
        $deleteQuery = "DELETE FROM biblioteca WHERE id = $idArchivo";
        if ($conn->query($deleteQuery)) {
            // Elimina el archivo del sistema de archivos
            $rutaArchivo = "../../../app/archivos/" . $nombreArchivo;
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo);
            }
            echo "Archivo eliminado con éxito.";
        } else {
            echo "Error al eliminar el archivo de la base de datos: " . $conn->error;
        }
    } else {
        echo "Archivo no encontrado.";
    }
} 
?>