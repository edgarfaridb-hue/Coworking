<?php

require_once "db.php";

$nombre = "Administrador";

$email = "jararevaloa@misena.edu.co";

$password = password_hash("1234", PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario(nombre,correo,contraseña) VALUES (?,?,?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sss",$nombre,$email,$password);

if($stmt->execute()){
    echo "Administrador creado";
    } else {
        echo "ERROR: " . $conn->error;
        }
?>