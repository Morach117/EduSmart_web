<?php
// Nombre del archivo CSV
$csvFileName = 'datos_aleatorios.csv';

// Nombres y apellidos aleatorios
$nombres = ['Juan', 'Ana', 'Carlos', 'Maria', 'Luis', 'Laura', 'Pedro', 'Sofia'];
$apellidosPaterno = ['Garcia', 'Lopez', 'Rodriguez', 'Perez', 'Fernandez', 'Martinez'];
$apellidosMaterno = ['Sanchez', 'Gomez', 'Vargas', 'Torres', 'Diaz', 'Molina'];

// Abre el archivo CSV para escritura
$file = fopen($csvFileName, 'w');

// Escribe la cabecera en el archivo CSV
fputcsv($file, ['Matricula', 'Nombre', 'Apellido Paterno', 'Apellido Materno', 'Correo', 'Contrasena', 'Telefono', 'Sexo', 'Fecha de Nacimiento']);

// Genera datos aleatorios y escríbelos en el archivo CSV
for ($i = 0; $i < 100; $i++) { // Cambia 100 por la cantidad de registros que desees
    $matricula = rand(10000000, 99999999);
    $nombre = $nombres[array_rand($nombres)];
    $apellidoPaterno = $apellidosPaterno[array_rand($apellidosPaterno)];
    $apellidoMaterno = $apellidosMaterno[array_rand($apellidosMaterno)];
    $correo = strtolower($nombre) . rand(100, 999) . '@example.com';
    $contrasena = 'EduSmart123';
    $telefono = '9' . rand(10000000, 99999999);
    $sexo = (rand(0, 1) == 0) ? 'M' : 'F';
    $fechaNacimiento = date('Y-m-d', strtotime('-'.rand(18, 25).' years'));

    // Escribe los datos en el archivo CSV
    fputcsv($file, [$matricula, $nombre, $apellidoPaterno, $apellidoMaterno, $correo, $contrasena, $telefono, $sexo, $fechaNacimiento]);
}

// Cierra el archivo CSV
fclose($file);

echo "Archivo CSV generado: $csvFileName";
?>
