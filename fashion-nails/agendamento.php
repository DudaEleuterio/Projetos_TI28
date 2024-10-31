<?php
include("conecta.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['txtnome'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $cel = $_POST['txtcel'];
    

    
        $sql = "INSERT INTO agendamentos (nome, data, hora, cel)
        VALUES ('$nome', '$data', '$hora', '$cel')";

        echo $sql;
        mysqli_query($link, $sql);
        echo"<script>window.alert('CLIENTE AGENDADO COM SUCESSO');</script>";
        echo"<script>window.location.href='galeria.php';</script>";

        
}

    #LISTA DE CLIENTES
    $sql = "SELECT * FROM servicos";
    $retorno = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="estilo.agendamento.css">
</head>
<body>
    
<header>
    <div class="container-logo">
            <div class="logo"><a href="ManuInicial.php"><img src="img/logotop.jpg" width="100px" height="100px"></div></a>
            <div class="menu"></div>
        </div>
        
<div class="nails">
      <h2>Fashion Nails</h2>
</div>
<br>
        <nav>
            <ul>
                <li><a href="ManuInicial.php">Inicio</a></li>
                <li><a href="servicos.php">Serviços</a></li>
                <li><a href="galeria.php">Galeria</a></li>
            
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <br>
    <br>

    <div class="container" >
        <h1>agendamento</h1>
        <form id="agendamento-form" action="agendamento.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="txtnome" name='txtnome' placeholder="Digite seu nome" required>

            <label>TELEFONE</label>
            <input type="text" name="txtcel" id="txtcel" placeholder="(00) 00000-0000" maxlength="15" required>

            <label for="data">Data:</label>
            <input type="date" id="data" name='data' required>

            <label for="hora">Hora:</label>
            <input type="time" id="hora" name='hora' required>

            <label>SELECIONE SERVIÇO</label>
            <select name="servicos">
                <!-- PUXAR OS NOMES DOS CLIENTES-->
                <?php while ($tbl = mysqli_fetch_array($retorno)) {
                ?>
                    <option value="<?=$tbl[0] ?>">
                        <?= strtoupper($tbl[1])?>
                    </option>
                <?php
                }
                ?>
            </select>

        <div id="mensagem" class="mensagem"></div>

            <button type="submit">Agendar</button>
        </form>

        
    </div>


</body>
</html>

