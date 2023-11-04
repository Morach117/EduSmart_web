<?php
include("../../conn.php"); // Asegúrate de que la ruta sea la correcta

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['operacion'] == 'Crear') {
    $nombreMateria = $_POST['nombre_materia'];
    $imagen = '';

    if (isset($_FILES['img']) && $_FILES['img']['name'] != '') {
        $imagen = subir_imagen();
    }

    $stmt = $conn->prepare("INSERT INTO materias (nombre_materia, img) VALUES (:nombre_materia, :img)");

    $stmt->bindParam(':nombre_materia', $nombreMateria);
    $stmt->bindParam(':img', $imagen);

    if ($stmt->execute()) {
        echo 'Materia creada exitosamente.';
    } else {
        echo 'Error al crear la materia.';
    }
}

function subir_imagen()
{
    if (isset($_FILES['img'])) {
        $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $nuevo_nombre = uniqid() . '.' . $extension;
        $ubicacion = '../multimedia/' . $nuevo_nombre; // Reemplaza 'carpeta_de_imagenes' con la ruta correcta
        move_uploaded_file($_FILES['img']['tmp_name'], $ubicacion);
        return $nuevo_nombre;
    }
}


?>
