<?php

function connect()
{
    $conn = new mysqli("localhost", "root", "", "base");

    // Check connection
    if ($conn->connect_errno) {
        echo "Falha ao conectar ao MySQL: " . $conn->connect_error;
        exit();
    }
    return $conn;
}

?>
