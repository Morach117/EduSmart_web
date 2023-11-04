<div class="modal fade" id="modal-agregar-materia" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Agregar Materia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-agregar-materia" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre_materia" class="form-label">Nombre de la Materia:</label>
                        <input type="text" class="form-control" id="nombre_materia" name="nombre_materia" required>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Imagen:</label>
                        <input type="file" class="form-control" id="img" name="img" accept="image/jpeg" required>
                    </div>
                    <!-- Agregar campo oculto para operación -->
                    <input type="hidden" name="operacion" value="Crear">
                    <div class="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal de edición de materia -->
<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar Materia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    <form id="form-editar-materia" enctype="multipart/form-data">
        <input type="hidden" id="id_materia" name="id_materia">
        <div class="mb-3">
            <label for="nombre_materia" class="form-label">Nuevo Nombre de la Materia:</label>
            <input type="text" class="form-control" id="nombre_materia" name="nombre_materia" required>
        </div>
        <!-- Agregar un contenedor para mostrar la imagen -->
        <div id="imagen_materia"></div>
        <div class="mb-3">
            <label for="img_materia" class="form-label">Nueva Imagen:</label>
            <input type="file" class="form-control" id="img_materia" name="img_materia" accept="image/jpeg">
        </div>
        <div class="">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Cambios</button>
        </div>
    </form>
</div>

        </div>
    </div>
</div>

<!-- Modal elimina registro -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar el registro?
            </div>

            <div class="modal-footer">
                <form action="elimina.php" method="post">

                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>

        </div>
    </div>
</div>