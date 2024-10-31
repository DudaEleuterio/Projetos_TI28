<?php
include("conecta.php");


//VAMOS CADASTRAR O PRODUTO
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $servicos = $_POST['txtservicos'];
    $valor = $_POST['txtvalor'];

    

    //VERIFICA SE PÃO DE QUEIJO EXISTE
    $sql = "SELECT COUNT(id) FROM servicos WHERE servicos = '$servicos'";
    $retorno = mysqli_query($link, $sql);
    $contagem = mysqli_fetch_array($retorno) [0];
    echo $contagem;
    echo $sql;

    if($contagem == 0){
        $sql = "INSERT INTO servicos (servicos, valor) VALUES ('$servicos', $valor)";
        $retorno = mysqli_query($link, $sql);

 echo $sql;
        echo"<script>window.alert('SERVIÇO CADASTRADO');</script>";
        echo"<script>window.location.href='cadastro-servicos.php';</script>";

    }
    else{
        echo"<script>window.alert('PRODUTO JÁ EXISTENTE!!');</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="estilo.cadastro.css">

    <title>CADASTRO SERVIÇOS</title>
</head>
<body>

<header>
    <div class="container-logo">
            <div class="logo"><a href="ManuInicial.php"><img src="img/logotop.jpg" width="100px" height="100px"></div></a>
            <div class="menu"></div>
        </div>
        
        <div class="social">
            <a href="https://facebook.com" class="facebook"><img src="icons/icons8-facebook-24.png"></a>
            <a href="https://instagram.com" class="instagram"><img src="icons/icons8-instagram-24.png"></a>
</div>
<div class="nails">
      <h2>Fashion Nails</h2>
</div>
        <nav>
            <ul>
                <li><a href="ManuInicial.php">Inicio</a></li>
                <li><a href="servicos.php">Serviços</a></li>
                <li><a href="galeria.php">Galeria</a></li>
                <li><a href="agendamento.php">Agendamento</a></li>
            </ul>
        </nav>
    </header>
   
<div class="container-global">
    <form class="formulario" action="cadastro-servicos.php" method="post" enctype="multipart/form-data">
        <label>NOME SERVIÇO</label>
        <input type="text" name='txtservicos' placeholder="DIGITE O NOME DO SERVIÇO" required>
        <br><br>
        <label>VALOR</label>
        <input type="decimal" name='txtvalor' placeholder="DIGITE PREÇO" required>
        <br>

        <input type="submit" value="CADASTRAR PRODUTO" ></input>

    </form>


</body>
</html>