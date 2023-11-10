<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
</head>

<body>
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="container">
                    <div class="card">
                        <div class="text-end pt-3 pe-5">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-materia" id="btnCrear">
                                Administrar Materias
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="form-fieldset">
                                <div class="col">
                                    <h2 class="page-title">
                                        Modulo el control de materias
                                    </h2>
                                    <h2 class="page-pretitle">
                                        Revisa el listado de materias para encontras la que desees editar o eliminar
                                    </h2>
                                    <hr class="m-0" />
                                    <div class="table-responsive">
                                        <div class="table-responsive">
                                            <table id="datos_materia" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Materia</th>
                                                        <th>Imagen</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="table-responsive">
                            <div class="table-responsive">
                                <table id="datos_materia" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Materia</th>
                                            <th>Imagen</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-materia" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Agregar Materia</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-materia" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nombre_materia" class="form-label">Nombre de la Materia:</label>
                                <input type="text" class="form-control" id="nombre_materia" name="nombre_materia"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Imagen:</label>
                                <input type="file" class="form-control" id="img" name="img">
                                <span id="imagen_subida"></span>

                            </div>
                            <!-- Agregar campo oculto para operación -->
                            <input type="hidden" name="operacion" id="operacion">
                            <input type="hidden" name="id_materia" id="id_materia">
                            <div class="">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input type="submit" name="action" id="action" class="btn btn-primary" value="Crear"><i
                                    class="fa-solid fa-floppy-disk"></i></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                // Configuración del botón "Crear"
                $("#btnCrear").click(function () {
                    $("#form-materia")[0].reset();
                    $(".modal-title").text("Crear Materia");
                    $("#action").val("Crear");
                    $("#operacion").val("Crear");
                    $("#imagen_subida").html("");
                });

                // Configuración de la tabla DataTable
                var dataTable = $('#datos_materia').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        url: "./query/materias/obtener_registros.php",
                        type: "POST"
                    },
                    "columnsDefs": [{
                        "targets": [0, 3, 4],
                        "orderable": false
                    }],
                    "language": {
                        "decimal": "",
                        "emptyTable": "No hay registros",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                        "infoFiltered": "(Filtrando de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });

                $(document).on('submit', '#form-materia', function (event) {
                    event.preventDefault();
                    let nombre_materia = $("#nombre_materia").val();
                    let extension = $("#img").val().split('.').pop().toLowerCase();

                    // Lista de extensiones permitidas
                    let extensionesPermitidas = ['gif', 'png', 'jpg', 'jpeg'];

                    if (extension === '') {
                        alert('Debes seleccionar una imagen.');
                        return false;
                    }

                    if (extensionesPermitidas.indexOf(extension) === -1) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Formato de Imagen Inválido',
                            text: 'Por favor, selecciona una imagen en un formato válido (gif, png, jpg, jpeg).'
                        });
                        // Limpiar el campo de archivo
                        $("#img").val('');
                        return false;
                    }

                    if (nombre_materia !== '') {
                        $.ajax({
                            url: "./query/materias/gestion_materias.php",
                            method: "POST",
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: data
                                });
                                $('#form-materia')[0].reset();
                                $('#modal-materia').modal('hide');
                                dataTable.ajax.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Campos Obligatorios',
                            text: 'Algunos campos son obligatorios. Por favor, completa todos los campos requeridos.'
                        });
                    }
                });

                $(document).on('click', '.editar', function () {
                    const id_materia = $(this).data("id");
                    $.ajax({
                        url: "./query/materias/obtener_registro.php",
                        method: "POST",
                        data: { id_materia: id_materia },
                        dataType: "json",
                        success: function (data) {
                            $('#modal-materia').modal('show');
                            $("#nombre_materia").val(data.nombre_materia);
                            $('.modal-title').text("Editar Materia");
                            $('#id_materia').val(id_materia);
                            $('#imagen_subida').html(data.img);
                            $('#action').val("Editar");
                            $('#operacion').val("Editar");
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                });

                $(document).on('click', '.borrar', function () {
                    const id_materia = $(this).data("id");
                    if (confirm("¿Estas seguro de que quieres borrar la materia?")) {
                        $.ajax({
                            url: "./query/materias/borrar_materia.php",
                            method: "POST",
                            data: { id_materia: id_materia },
                            success: function (data) {
                                alert(data);
                                dataTable.ajax.reload();
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(textStatus, errorThrown);
                            }
                        });
                    } else {
                        return false;
                    }
                });



            });

        </script>


</body>

</html>