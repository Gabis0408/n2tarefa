<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "formularion2"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php

include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['num'];
    $stmt = $conn->prepare("INSERT INTO cadastro_cliente (nome, idade, sexo, cidade, uf, cep, endereco, bairro, numero) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissssssi", $nome, $idade, $sexo, $cidade, $uf, $cep, $endereco, $bairro, $numero);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Desenvolvimento WEB/css/style.css">
    <title>AMORDEPET - PetShop</title>
</head>

<body>
    <header>
        <img src="https://www.designi.com.br/images/preview/12539470.jpg" alt="amordepet" width="100%">
        <br><br>
        <h2>AMORDEPET - PETSHOP</h2>
        <h3>FORMULÁRIO</h3>
        <hr>
    </header>

    <div class="form-container">
        <form action="formulario.php" method="POST">
            <div>
                <label for="nome">Nome do Tutor</label>
                <input type="text" id="nome" name="nome" maxlength="50" required>
            </div>
            <div>
                <label for="idade">Idade</label>
                <input type="number" id="idade" name="idade" required>
            </div>
            <div>
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" required>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                </select>
            </div>
            <div>
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" required>
            </div>
            <div>
                <label for="uf">UF</label>
                <input type="text" id="uf" name="uf" maxlength="2" required>
            </div>
            <div>
                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" required maxlength="10" placeholder="00000-000">
            </div>
            <div>
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" required>
            </div>
            <div>
                <label for="bairro">Bairro</label>
                <input type="text" id="bairro" name="bairro" required>
            </div>
            <div>
                <label for="num">Número</label>
                <input type="number" id="num" name="num" required>
            </div>
            <div class="form-actions">
                <input type="reset" value="Limpar">
                <input type="submit" value="Cadastrar">
            </div>
        </form>
    </div>
</body>

</html>
