<?php
global $conn;
function obrirConnexioBD() {
    global $conn;
    $servername = "54.210.221.169";
    $username = "dani";
    $password = "rebost11";
    $dbname = "AnimeBD";

    // Crear connexió
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Error de connexió: " . $conn->connect_error);
    }
}

function tancarConnexioBD() {
    global $conn;
    $conn->close();
}
?>
