<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtén el nombre del archivo según el ID
    $query = "SELECT nombre_archivo FROM biblioteca WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombreArchivo = $row['nombre_archivo'];

        // Establece las cabeceras para indicar que es un archivo PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . $nombreArchivo . '"');

        // Lee y muestra el contenido del archivo PDF
        readfile("../../../app/archivos/" . $nombreArchivo);
        exit;
    }
}
?>
