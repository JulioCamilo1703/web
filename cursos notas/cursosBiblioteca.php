
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/all.min.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body class="background-white">
    <div class="container-fluid bg-primary text-white py-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="../../instituto/ciclo1.php" class="btn btn-primary border"><i><</i></a>
            </div>
            <div class="text-center">
                <h2 name="titulo">Cursos Biblioteca</h2>
            </div>
            <div class="d-flex container-center">
                <a href="../instituto/registroLogin.php" class="btn btn-primary border">Cerrar Sesion</a> 
                <div class="desplegable" id="desplegableBtn">
                    <button onclick="toggleDesplegable()">☰</button>
                    <div class="links" id="linksMenu">
                        <a href="../../instituto/paginaInicioDocente.php" class="border margin">Inicio</a>
                    </div>
                </div>
            </div>       
        </div>
    </div>

    <div class="container mt-5">
        <h3>Archivos Subidos</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Archivo</th>
                    <th>Ver PDF</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT id, nombre_archivo FROM biblioteca"; 
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nombre_archivo"] . "</td>";
                        echo "<td><a href='ver_pdf.php?id=" . $row['id'] . "' target='_blank'>Ver PDF</a></td>";
                        echo "<td><button onclick='eliminarArchivo(" . $row['id'] . ")'>Eliminar</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay archivos subidos</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="container mt-5">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#archivoModal">
            Subir Archivo
        </button>
    </div>

    <footer class="bg-dark text-white p-3 fixed-bottom">
        <div class="d-flex justify-content-center align-items-center mb-3">
            <a href="#" class="text-white mr-3" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-white mr-3" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p class="mb-0">&copy; 2024 Gestor Academico. Todos los derechos reservados.</p>
    </footer>

    <script>
    function toggleDesplegable() {
        var linksMenu = document.getElementById('linksMenu');
        linksMenu.classList.toggle('show');
    }

    window.onclick = function (event) {
        var desplegableBtn = document.getElementById('desplegableBtn');
        if (event.target !== desplegableBtn && !desplegableBtn.contains(event.target)) {
            var linksMenu = document.getElementById('linksMenu');
            linksMenu.classList.remove('show');
        }
    }

    function eliminarArchivo(idArchivo) {
        if (confirm("¿Estás seguro de que deseas eliminar este archivo?")) {
            // Realiza una solicitud AJAX para eliminar el archivo
            $.ajax({
                url: 'eliminar_archivo.php',
                type: 'POST',
                data: { id: idArchivo },
                success: function(response) {
                    // Recarga la página después de eliminar el archivo
                    location.reload();
                },
                error: function(error) {
                    console.log("Error al eliminar el archivo: " + error.responseText);
                }
            });
        }
    }
    </script>
    
    <?php
    include("modalcursos.php");
    ?>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
