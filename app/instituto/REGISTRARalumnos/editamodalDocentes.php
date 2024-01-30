<div class="modal fade" id="editamodalProf" tabindex="-1" aria-labelledby="editamodalProfLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editamodalProfLabel">Editar Estudiante</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="actualizar.php" method="post" >
                    <input type="hidden" name="id" id="id" value="">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre y Apellido:</label>
                        <input type="text" name="nombreApellido" id="nombre" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Correo:</label>
                        <input type="email" name="correo" id="correo" class="form-control" required>
                    </div>
                    
                    <div class="align-items-column ">
                        <div class="mb-3">
                            <label for="edad" class="form-label">Edad:</label>
                            <input type="text" name="edad" id="edad" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefono:</label>
                            <input type="tel" name="telf" id="telf" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-floppy-disk"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>