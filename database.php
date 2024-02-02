<?php
    $conn = new mysqli("127.0.0.1", "root", "", "institucion_educativa");
    $conn->set_charset("utf8");
    
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

?>
