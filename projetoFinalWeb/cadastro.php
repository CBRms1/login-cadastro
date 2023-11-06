<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
</html>

<?php
include("arquivos/conectar.php");

$conn = connect();
$sql = "select * from cadastro where nome = ? and senha = ?";

$usuarioc = $_POST['usuarioc'];

$senhac = $_POST['senhac'];
$senharedigitada = $_POST['senha2c'];

$ativo = "y";

$stmt = $conn->prepare($sql);

$stmt->bind_param('ss', $usuarioc, $senhac);

$stmt->execute();

$result = $stmt->get_result();
if ($senhac == $senharedigitada)
{
    if (isset($usuarioc) && isset($senhac))
    {
        echo "successful registration!";
        echo "<script>
        setTimeout(() => {
            window.location.href ='index.html';
        }, 5000);
            
        </script>";
        $conn->query("INSERT INTO cadastro (nome, senha, ativo) VALUES('$usuarioc', '$senhac', '$ativo')") or die($conn->error);
    }
} else
{
    echo "Password not compatible";
}

$stmt->close();
?>