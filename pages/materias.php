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
                <div class="card">
                    <div class="text-end p-5">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-agregar-materia" id="btnCreate">
                            Administrar Materias
                        </button>
                    </div>
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
        </div>
    </div>

    <?php include 'modals/modals_materias.php';?>

    <script>
    $(document).ready(function() {
        var dataTable = $('#datos_materia').DataTable({
				"processing": true,
				"serverSide": true,
				"order": [],
				"ajax": {
                    "url": "./query/materias/obtener_registros.php",
					type: "POST"
				},
				"columnsDefs": [{
					"targets": [0, 3, 4],
					"orderable": false
				}],
				"language":{
					"decimal":"",
					"emptyTable": "No hay registros",
					"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
					"infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
					"infoFiltered": "(Filtrando de _MAX_ total entradas)",
					"infoPostFix":"",
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

        $('#form-agregar-materia').on('submit', function(event) {
            event.preventDefault();

            let nombreMateria = $("#nombre_materia").val();
            let imagen = $("#img")[0].files[0];

            if (nombreMateria && imagen) {
                let formData = new FormData();
                formData.append('nombre_materia', nombreMateria);
                formData.append('img', imagen);
                formData.append('operacion', 'Crear'); // Agrega la operación 'Crear'

                $.ajax({
                    url: "./query/materias/gestion_materias.php", // Reemplaza "tu_archivo_php.php" con la URL correcta para el proceso de creación
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert(data);
                        $('#form-agregar-materia')[0].reset();
                        $('#modal-agregar-materia').modal('hide');
                        dataTable.ajax.reload();
                    }
                });
            } else {
                alert('Por favor, completa todos los campos.');
            }
        });

        // Funcionalidad de 'Editar' sobre elemento de la clase 'editar-materia'
$(document).on('click', '.editar', function(){
    const id_materia = $(this).data("id");
    $.ajax({
        url: "./query/materias/obtener_registro.php", // Reemplaza "tu_archivo_php.php" con la URL correcta para el proceso de creación
        method: "POST",
        data: {id_materia: id_materia},
        dataType: "json",
        success: function(data){
            $('#editaModal').modal('show');
            $('#imagen_materia').html(data.imagen_materia);
            $('#nombre_materia').val(data.nombre_materia);

            $('#id_materia').val(id_materia);

            $('#action').val("Editar");
            $('#operacion').val("Editar");
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus, errorThrown);
        }
    });
});
    });
    </script>

    
</body>

</html>
