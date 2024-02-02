<?php 
    require '../config/database.php';
    include ("loginCuenta.php");
    include ("Crearcuenta.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institucion Educativa</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
</head>
<body>
    <div>
        <h1 class="text-center mt-4 mx-2">Administrador para Docentes</h1> 
        <div class="d-flex container align-items-center justify-content-center" style="height: 60vh"> 
            <div class="container border bg-light text-dark rounded-3 p-4 m-3">
                <div class="p-4 m-3">
                    <h2 class="text-center">Login</h2>
                    <form method="POST" action="loginCuenta.php" >
                        <div class="">
                            <label for="nombre">Nombre de Usuario:</label>
                            <input type="text" class="form-control" name="UsuarioLogin" id="UsuarioLogin">
                        </div>

                        <div class="">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" name="passwordLogin" id="passwordLogin">
                        </div><br>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="botonLogin">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>   
            <div class="container border bg-light text-dark rounded-3 p-4 m-3">
                <div class="p-4 m-3">
                    <h2 class="text-center">Register</h2>
                   
                    <form id="registroForm" method="POST" action="Crearcuenta.php">
                        <div class="form-group">
                            <label for="nombre">Nombre de Usuario:</label>
                            <input type="text" class="form-control" name="nombreUsuario">
                        </div>
                        
                        <div class="form-group">
                            <label for="nombre">Nombre Completo:</label>
                            <input type="text" class="form-control" name="nombreCompleto">
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" name="contrasena">
                        </div>

                        <br>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="crearCuenta">Crear Cuenta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>                           
    </div>
    <footer class="bg-dark text-white p-3 fixed-bottom">
        <div class="d-flex justify-content-center align-items-center mb-3">
            <a href="#" class="text-white mr-3" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-white mr-3" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p class="mb-0">&copy; 2024 Gestor Academico. Todos los derechos reservados.</p>
    </footer>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
