<?php
include("../../conn.php"); // Asegúrate de que la ruta sea la correcta

$query = "";
$salida = array();

// Asegúrate de que los valores de $_POST["start"] y $_POST["length"] sean números válidos
$start = isset($_POST["start"]) ? intval($_POST["start"]) : 0;
$length = isset($_POST["length"]) ? intval($_POST["length"]) : -1;

// Construye la consulta SQL
$query = "SELECT * FROM materias";

// Si se hace uso de la función del buscador de palabras en la tabla del DataTable, concatena el string '$query' con la filtración dada por el usuario
if (isset($_POST["search"]["value"])) {
    $query .= ' WHERE nombre_materia LIKE "%' . $_POST["search"]["value"] . '%"';
}

// Además, concatena en la cadena la orden ascendente o descendente establecida
if (isset($_POST["order"])) {
    // Concatena el string '$query' con la especificación de ordenamiento dada por el usuario
    $query .= ' ORDER BY ' . $_POST["order"][0]["column"] . ' ' . $_POST["order"][0]["dir"];
} else {
    $query .= ' ORDER BY id_materia DESC';
}

// Establece el límite de elementos rows en la tabla
if ($length != -1) {
    $query .= ' LIMIT ' . $start . ', ' . $length;
}

// Prepara el mensaje '$query' en el mensajero '$stmt' para recibir datos del servidor
$stmt = $conn->prepare($query);
$stmt->execute();
$resultado = $stmt->fetchAll();

// Crea un arreglo como variable '$datos'
$datos = array();

// Limita la cantidad de datos a mostrar en la tabla

// Genera el HTML con los datos de la tabla
foreach ($resultado as $fila) {
    // Inicializa la imagen
    $imagen = '';
    if ($fila["img"] != '') {
        $imagen = '<img src="././multimedia/' . $fila["img"] . '" class="img-thumbnail" width="50" height="35" />';
    } else {
        $imagen = '';
    }

    // Define cada uno de los datos que se verán en las celdas en la fila de la tabla del HTML
    $sub_array = array();
    $sub_array[] = $fila["nombre_materia"];
    $sub_array[] = $imagen;
    $sub_array[] = '<button type="button" name="editar" data-id="' . $fila["id_materia"] . '" class="btn btn-warning btn-xs editar">Editar</button>';
    $sub_array[] = '<button type="button" name="borrar" data-id="' . $fila["id_materia"] . '" class="btn btn-danger btn-xs borrar">Borrar</button>';

    // Exporta la información
    $datos[] = $sub_array;
}

$salida = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => obtener_todos_registros(),
    "data" => $datos
);

header('Content-Type: application/json');
echo json_encode($salida, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

function obtener_todos_registros() {
    global $conn; // Accede a la conexión a la base de datos

    // Realiza una consulta para contar los registros en la tabla de materias
    $stmt = $conn->prepare('SELECT COUNT(*) as total FROM materias');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Devuelve el total de registros
    return $result['total'];
}
?>
