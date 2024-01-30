
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>
<body class="background-white">
    <div class="container-fluid bg-primary text-white py-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="../instituto/ciclosNotas.php" class="btn btn-primary border"><i><</i></a>
            </div>
            <div class="text-center">
                <h2 name="titulo">Ciclo 1</h2>
            </div>
            <div class="d-flex container-center">
                <a href="../instituto/registroLogin.php" class="btn btn-primary border">Cerrar Sesion</a> 
                <div class="desplegable" id="desplegableBtn">
                    <button onclick="toggleDesplegable()">☰</button>
                    <div class="links" id="linksMenu">
                        <a href="../instituto/paginaInicioDocente.php" class="border margin">Inicio</a>
                    </div>
                </div>
            </div>       
        </div>
    </div>
    </div>
    <div class="d-flex flex-column align-items-auto justify-content-center " style="margin-top: 50px ;margin-bottom: 50px;" >
        
        <div class="container mb-4">
            <div class="border lead bg-light text-dark">
                <div class="border-top" style="margin-top: 80px ;margin-bottom: 5px;">
                    <div class="d-flex justify-content-center" style="margin-top: 10px ;margin-bottom: 10px;">
                        <a class=""href="../instituto/cursos notas/cursosBiblioteca.php">Cursos Notas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
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
    </script>
</body>
</html>