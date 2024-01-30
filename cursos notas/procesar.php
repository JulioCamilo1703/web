<?php
require '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["archivo"])) {
        $archivo_temporal = $_FILES["archivo"]["tmp_name"];
        $nombre_archivo = $_FILES["archivo"]["name"];

        // Verifica si se seleccionó un archivo
        if (!empty($archivo_temporal)) {
            $archivo_contenido = file_get_contents($archivo_temporal);

            $query = "INSERT INTO biblioteca (archivo, nombre_archivo) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('bs', $archivo_contenido, $nombre_archivo);

            if ($stmt->execute()) {
                header("Location: ../../instituto/cursos notas/cursosBiblioteca.php");
                exit();
            } else {
                echo "Error al subir el archivo: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "No se seleccionó ningún archivo.";
        }
    } else {
        echo "No se recibió ningún archivo.";
    }
} else {
    // Manejar el caso en que no se hizo una solicitud POST
    echo "Acceso no permitido.";
}
?>