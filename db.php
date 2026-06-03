<?php
$conn = new mysqli("localhost", "root", "", "ejercicio");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>