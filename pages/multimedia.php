<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multimedia</title>
</head>

<body>
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container">
                <div class="card text">
                    <div class="card-body">
                        <fieldset class="form-fieldset my-3">
                            <div class="col">
                                <h2 class="page-title">
                                    "Nombre de la unidad"
                                </h2>
                                <h2 class="page-pretitle">
                                    Gestión de contenido multimedia
                                </h2>
                                <hr class="m-0" />
                                <div class="row g-3">
                                    <div class="col mb-3">
                                        <div class="form-label">Multimedia</div>
                                        <input type="text" class="form-control" placeholder="YouTube Link" />
                                    </div>
                                    <div class="col form-group">
                                        <label htmlFor="descripcion">Descripción:</label>
                                        <textarea class="form-control" id="descripcion" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col mb-3">
                                        <div class="form-label">Multimedia</div>
                                        <input type="file" class="form-control" multiple="multiple" />
                                    </div>
                                    <div class="col form-group">
                                        <label htmlFor="descripcion">Descripción:</label>
                                        <textarea class="form-control" id="descripcion" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row g-3 ps-2">
                                    <div class="list-group col">
                                        <div class="file-list list-group list-group-numbered">
                                        </div>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">
                                                Subir multimedia
                                            </button>
                                            <button type="reset" class="btn btn-danger ms-2">
                                                Cancelar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- {/* Cierre del formulario faltante */} -->
                            </div>
                        </fieldset>
                        <hr />
                        <!-- {/* Lista de contenido temático por unidad */} -->
                        <h3>Contenido Temático actual</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NP</th>
                                    <th>Nombre del Archivo</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Archivo1.pdf</td>
                                    <td>Descripción del archivo 1</td>
                                    <td>
                                        <button class="btn btn-sm btn-info">Editar</button>
                                        <button class="btn btn-sm btn-danger ms-2">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    // Add a change event listener to the file input element
    const fileInput = document.querySelector('input[type="file"]');
    fileInput.addEventListener('change', () => {
        // Get a list of the selected files
        const files = fileInput.files;

        // Iterate over the list of files and add the name of each file to the file-list div
        for (const file of files) {
            const fileListDiv = document.querySelector('.file-list');
            const li = document.createElement('li');
            li.innerText = file.name;
            li.classList.add('list-group-item');
            li.classList.add('p-2');
            fileListDiv.appendChild(li);
        }
    });

</script>

</html>