<?php


$response = ['error' => 'No se encontraron datos']; 

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT id, nombreApellido, telf, correo, edad FROM estudiantes WHERE id = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado && $resultado->num_rows > 0) {
        $estudiantes = $resultado->fetch_assoc();
        $response = $estudiantes;
    }
}

header('Content-Type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>
