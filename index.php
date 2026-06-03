<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EFCoworking - Registro</title>
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
        <h2>Registro de Nuevo Cliente</h2>
        <form action="insert.php" method="POST">
            <div class="form-group-row">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
            </div>
            <div class="form-group-row">
                <select name="tipo_documento" required>
                    <option value="" disabled selected>Tipo de Documento</option>
                    <option value="CC">Cédula de Ciudadanía</option>
                    <option value="CE">Cédula de Extranjería</option>
                    <option value="NIT">NIT</option>
                </select>
                <input type="text" name="documento" placeholder="Documento" required>
            </div>
            <input type="email" name="correo" placeholder="Correo Electrónico" required>
            <input type="tel" name="telefono" placeholder="Teléfono/WhatsApp">
            <div class="form-group-row">
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="password" name="confirm_password" placeholder="Confirmar Contraseña" required>
            </div>
            <button type="submit" class="btn-registro">Registrarme</button>
        </form>
        <a href="login.php" class="back-link">← Volver al inicio</a>
    </div>
</main>

<section class="admin-table-container">
    <h3 class="table-title">Clientes Registrados</h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Apellido</th>
                    <th>Tipo Documento</th><th>Documento</th>
                    <th>Correo</th><th>Teléfono</th><th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM usuario";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['nombre']."</td>";
                        echo "<td>".$row['apellido']."</td>";
                        echo "<td>".$row['tipo_documento']."</td>";
                        echo "<td>".$row['documento']."</td>";
                        echo "<td>".$row['correo']."</td>";
                        echo "<td>".$row['telefono']."</td>";
                        echo "<td>
                                <a href='edit.php?id=".$row['id']."' class='btn-action-edit'>Editar</a>
                                <a href='delete.php?id=".$row['id']."' onclick='return confirm(\"¿Desea eliminar el usuario?\")' class='btn-action-delete'>Eliminar</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay clientes registrados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
</body>
</html>
