<?php
// Incluye el archivo de conexión a la base de datos
include('../../conn.php');

$query = "SELECT id_alumno, nombre, matricula FROM alumnos";
$stmt = $conn->prepare($query);
$stmt->execute();
$alumnos = $stmt->fetchAll();

// Crea un array asociativo para almacenar los datos de los alumnos
$alumnosArray = array();

foreach ($alumnos as $alumno) {
    $alumnoData = array(
        "id" => $alumno["id_alumno"],
        "nombre" => $alumno["nombre"],
        "matricula" => $alumno["matricula"]
    );

    $alumnosArray[] = $alumnoData;
}

// Establece encabezados HTTP para indicar que la respuesta es JSON
header("Content-Type: application/json");

// Envia el JSON como respuesta
echo json_encode($alumnosArray);
?>
