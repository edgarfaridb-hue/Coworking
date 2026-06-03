<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM usuario WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_documento = $_POST['tipo_documento'];
    $documento = $_POST['documento'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE usuario SET 
            nombre='$nombre', apellido='$apellido', tipo_documento='$tipo_documento',
            documento='$documento', correo='$correo', telefono='$telefono'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EFCoworking - Editar Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header class="navbar">
    <div class="logo-container">
        <img src="coworking.png" alt="Logo EF" class="logo">
        <h1 style="color: white; margin: 0;">EFCoworking</h1>
    </div>
</header>

<main class="registro-container">
    <div class="registro-card">
        <h2>Editar Usuario</h2>
        <form method="POST">
            <div class="form-group-row">
                <input type="text" name="nombre" value="<?= $row['nombre'] ?>" required>
                <input type="text" name="apellido" value="<?= $row['apellido'] ?>" required>
            </div>
            <div class="form-group-row">
                <input type="text" name="tipo_documento" value="<?= $row['tipo_documento'] ?>" required>
                <input type="text" name="documento" value="<?= $row['documento'] ?>" required>
            </div>
            <input type="email" name="correo" value="<?= $row['correo'] ?>" required>
            <input type="tel" name="telefono" value="<?= $row['telefono'] ?>" required>

            <button type="submit" class="btn-registro">Modificar</button>
            <a href="index.php" class="back-link">← Volver al inicio</a>
        </form>
    </div>
</main>

</body>
</html>

