<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
</html>

<?php

include("arquivos/conectar.php");

$conn = connect();
$sql = "select * from cadastro where nome = ? and senha = ?";

$usuario = $_POST['usuario'];

$senha = $_POST['senha'];

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $usuario, $senha);

$stmt->execute();

$result = $stmt->get_result(); 

if ($result->num_rows > 0) {
    while ($user = $result->fetch_assoc()) {
        echo "Welcome {$user['nome']}!";
    }
} else {
    echo "Incorrect username or password!";
}





$stmt->close();
?>