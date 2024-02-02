
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institucion Educativa</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container-fluid bg-primary text-white py-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="" class="btn btn-primary-blg border"><i><</i></a>
            </div>
            <div class="text-center">
                <h2 name="titulo">Inicio</h2>
            </div>
            <div class="d-flex container-center">
                <a href="/index.php" class="btn btn-primary border">Cerrar Sesion</a> 
                <div class="desplegable" id="desplegableBtn">
                    <!-- menú desplegable -->
                    <button onclick="toggleDesplegable()">☰</button>
                    <div class="links" id="linksMenu">
                        <a href="/paginaInicioDocente.php" class="border margin">inicio</a>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <div class="container">
        <div class="d-flex flex-column align-items-auto justify-content-center " style="margin-top: 50px ;margin-bottom: 50px;">
            <div class="container ">
                <div class="border lead bg-light text-dark p-4 m-3">
                    <div style="margin-top: 60px ;margin-bottom: 60px;">
                        <a class=""href="ciclosNotas.php">Ciclos</a>
                    </div>
                </div>
            </div>

            <div class="container ">
                <div class="border lead bg-light text-dark p-4 m-3 margin-4">
                    <div style="margin-top: 60px ;margin-bottom: 60px;">
                    
                        <a class=""href="/REGISTRARalumnos/estudiantes.php">Registrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>

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
    <footer class="bg-dark text-white p-3 fixed-bottom">
        <div class="d-flex justify-content-center align-items-center mb-3">
            <a href="#" class="text-white mr-3" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-white mr-3" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p class="mb-0">&copy; 2024 Tu Página. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
