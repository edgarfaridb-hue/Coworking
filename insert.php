<?php
include 'db.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tipo_documento = $_POST['tipo_documento'];
$documento = $_POST['documento'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO usuario (nombre, apellido, tipo_documento, documento, correo, telefono) 
        VALUES ('$nombre', '$apellido', '$tipo_documento', '$documento', '$correo', '$telefono')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
