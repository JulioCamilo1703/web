<div class="modal fade" id="retiramodalProf" tabindex="-1" aria-labelledby="retiramodalProfLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="retiramodalProfLabel">Aviso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                ¿Deseas eliminar el registro?
            </div>

            <div class="modal-footer">
                <form action="elimina.php" method="post">
                    <input type="hidden" name="id" id="id">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>