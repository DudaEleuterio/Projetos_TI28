<?php
include("conectadb.php");
include('topo.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $codigo = $_POST['txtcodigo'];
    $desconto = $_POST['txtdesconto'];
    $tipo_desconto = $_POST['txttipo_desconto'];
    $validade = $_POST['txtvalidade'];
    $usado = $_POST['txtusado'];

    $sql = "SELECT COUNT(id) FROM cupons WHERE codigo = '$codigo' ";

    $retorno = mysqli_query($link, $sql);
    $contagem = mysqli_fetch_array($retorno) [0];


    if($contagem == 0){
        $sql = "INSERT INTO cupons(codigo, desconto, tipo_desconto, validade, usado)
        VALUES ('$codigo', '$desconto', '$tipo_desconto', '$validade', '$usado' '1')";
        mysqli_query($link, $sql);
        echo"<script>window.alert('CUPOM CADASTRADO COM SUCESSO');</script>";
        echo"<script>window.location.href='backoffice.php';</script>";
    }
    else if($contagem >= 1){
        echo"<script>window.alert('CUPOM JÁ EXISTENTE');</script>";
    }



}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://fonts.cdnfonts.com/css/curely" rel="stylesheet">

    <title>CUPONS CADASTRADOS</title>
</head>
<body>


<div class="container-global">
    
    <form class="formulario" action="cupons-cadastro.php" method="post">
        <label>CODIGO</label>
        <input type="text" id="codigo" name='txtcodigo' placeholder="digite o codigo do cupom" required>
        <br>
        <label>DESCONTO</label>
        <input type="text" name="txtdesconto" placeholder="digite o valor" required>
        <br>
        <label>TIPO DESCONTO</label>
        <select name='txttipo_desconto'>
            <option value="Fixo">FIXO</option>
            <option value="Porcentagem">PORCENTAGEM</option>
        </select>
        <br>
        <label>DATA DE VALIDADE</label>
        <input type="date" id="txtvalidade" name="txtvalidade">
        <br>
        
        

        <br>
        <input type="submit" value="CADASTRAR CUPOM">
    </form>

</div>

<script src="scripts/script.js"></script>

</body>
</html>