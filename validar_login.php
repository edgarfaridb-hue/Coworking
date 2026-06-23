<?php
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["correo"]) && isset($_POST["password"])) {
    
    $email = $_POST["correo"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuario WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();

        // 2. CORRECCIÓN TEMPORAL: Comparamos texto plano y usamos la columna 'contraseña'
        // Cambiamos password_verify por una comparación directa (==) para que te acepte el '1234'
        if ($password == $usuario['contraseña']) {
            
            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["usuario_nombre"] = $usuario["nombre"];

        
            header("Location: index.php");
            exit; 
            
        } else {
            echo "Contraseña incorrecta";
        }
    } else { 
        echo "Usuario no encontrado";
    }   
} else {
    header("Location: login.php");
    exit;
}
?>
