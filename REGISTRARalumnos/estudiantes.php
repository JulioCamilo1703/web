<?php 
require '../../config/database.php';
$sqlEstudiantes = "SELECT id, nombreApellido, telf, correo, edad FROM estudiantes";
$resultado = $conn->query($sqlEstudiantes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institucion Educativa</title>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/all.min.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
</head>
<body class="background-white">
    <div class="container-fluid bg-primary text-white py-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="../../instituto/paginaInicioDocente.php" class="btn btn-primary border"><i><</i></a>
            </div>
            <div class="text-center">
                <h2 name="titulo">Registrar</h2>
            </div>
            <div class="d-flex container-center">
            
                <a href="../instituto/registroLogin.php" class="btn btn-primary border">Cerrar Sesion</a> 
                <div class="desplegable" id="desplegableBtn">
                    <!-- Botón y menú desplegable -->
                    <button onclick="toggleDesplegable()">☰</button>
                    <div class="links" id="linksMenu">
                        <a href="../../instituto/paginaInicioDocente.php" class="border margin">Inicio</a>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <br>
    <br>
        <div class="container">
            <table class="table table-sm table-striped table-hover mt-4">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre y Apellido</th>
                        <th>Edad</th>
                        <th>telf</th>
                        <th>correo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row= $resultado-> fetch_assoc()) { ?>
                                <tr>
                                    <td><?=$row['id'];?></td>
                                    <td><?=$row['nombreApellido'];?></td>
                                    <td><?=$row['edad'];?></td>
                                    <td><?=$row['telf'];?></td>
                                    <td><?=$row['correo'];?></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editamodalProf" data-bs-id="<?= $row['id']; ?>">
                                            <i class="fa-solid fa-pen-to-square"></i> Editar
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#retiramodalProf" data-bs-id="<?= $row['id']; ?>">
                                            <i class="fa-solid fa-trash"></i> Eliminar
                                        </a>
                                    </td>
                                </tr>
                        <?php } ?>
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProf">
                        <i class="fa-solid fa-square-plus"></i> Agregar
                    </button>
                </div>
            </div>    
        </div>
        <?php
        include 'modalDocentes.php';
        include 'eliminamodalDocentes.php';
        include 'editamodalDocentes.php';
        ?>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        let editamodalProf = document.getElementById('editamodalProf');
        let retiramodalProf = document.getElementById('retiramodalProf');
        let originalData; 
        function restoreOriginalData() {
            let form = editamodalProf.querySelector('.modal-body form');
            let inputFields = form.querySelectorAll('input, select, textarea');
            inputFields.forEach(input => {
                let fieldName = input.getAttribute('name');
                if (fieldName in originalData) {
                    input.value = originalData[fieldName];
                }
            });
        }
        editamodalProf.addEventListener('hide.bs.modal', event => {
            let form = editamodalProf.querySelector('.modal-body form');
            let inputFields = form.querySelectorAll('input, select, textarea');
            inputFields.forEach(input => {
                input.value = "";
            });
            if (originalData) {
                restoreOriginalData();
            }
        });
        editamodalProf.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget;
            let id = button.getAttribute('data-bs-id');
            let form = editamodalProf.querySelector('.modal-body form');
            let inputId = form.querySelector('input[name="id"]');
            let url = "getEstudiantes.php"; // Asegúrate de ajustar esto según tu estructura
            let formData = new FormData();
            formData.append('id', id);
            obtenerDatos(url, formData)
                .then(data => {
                    // Almacenar los datos originales
                    originalData = { ...data };
                    // Actualizar los campos del formulario
                    inputId.value = data.id;
                    restoreOriginalData();
                })
                .catch(err => console.error('Error al obtener datos:', err));
        });
        function obtenerDatos(url, formData) {
            return fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la solicitud');
                    }
                    return response.json();
                })
                .catch(error => {
                    console.error('Error en la solicitud:', error);
                    throw error;
                });
        }
        // Evento al mostrar el modal de eliminación
        $('#retiramodalProf').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var studentId = button.data('bs-id'); // Extraer la información del atributo data-bs-id
            var modal = $(this);
            // Actualizar el valor del campo oculto 'id' en el formulario
            modal.find('.modal-footer #id').val(studentId);
        });
        // Evento al hacer clic en el botón "Eliminar"
        $('#eliminarEstudiante').on('click', function () {
            // Envía el formulario de eliminación
            $('#eliminarEstudianteForm').submit();
        });
    });
    </script>
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