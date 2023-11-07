<?php
include("../../conn.php"); // Asegúrate de que la ruta sea la correcta

$query = "";
$salida = array();

// Asegúrate de que los valores de $_POST["start"] y $_POST["length"] sean números válidos
$start = isset($_POST["start"]) ? intval($_POST["start"]) : 0;
$length = isset($_POST["length"]) ? intval($_POST["length"]) : -1;

// Construye la consulta SQL
$query = "SELECT id_alumno, matricula, nombre, app, apm FROM alumnos";
$query .= " WHERE id_alumno NOT IN (SELECT id_alumno FROM equipoxalumno)";

// Si se hace uso de la función del buscador de palabras en la tabla del DataTable, concatena el string '$query' con la filtración dada por el usuario
if (isset($_POST["search"]["value"])) {
    $query .= ' AND nombre LIKE "%' . $_POST["search"]["value"] . '%"';
}

// Además, concatena en la cadena la orden ascendente o descendente establecida
if (isset($_POST["order"])) {
    // Concatena el string '$query' con la especificación de ordenamiento dada por el usuario
    $query .= ' ORDER BY ' . $_POST["order"][0]["column"] . ' ' . $_POST["order"][0]["dir"];
} else {
    $query .= ' ORDER BY id_alumno DESC';
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

// Genera el HTML con los datos de la tabla
foreach ($resultado as $fila) {
    // Define cada uno de los datos que se verán en las celdas en la fila de la tabla del HTML
    $sub_array = array();
    $sub_array[] = $fila["matricula"];
    $sub_array[] = $fila["nombre"];
    $sub_array[] = $fila["app"];
    $sub_array[] = $fila["apm"];
    $sub_array[] = '<input type="checkbox" name="alumnos_seleccionados[]" value="' . $fila["id_alumno"] . '">';

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

    // Realiza una consulta para contar los registros en la tabla de alumnos que no tienen equipo
    $stmt = $conn->prepare('SELECT COUNT(*) as total FROM alumnos WHERE id_alumno NOT IN (SELECT id_alumno FROM equipoxalumno)');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Devuelve el total de registros
    return $result['total'];
}
?>
