<?php
include("conecta.php");
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="estilo.galeria.css">
    <title>Modelos De Unhas</title>
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

        <nav>
            <ul>
                <li><a href="ManuInicial.php">Inicio</a></li>
                <li><a href="servicos.php">Serviços</a></li>
                <li><a href="agendamento.php">Agendamento</a></li>
            </ul>
        </nav>
    </header>


         <!-- BOTÕES DE MENU -->
         
         <h1>ESSES SÃO ALGUNS DOS MODELOS QUE JÁ FIZEMOS, CLIQUE NA IMAGEM PARA IR NA PÁGINA DE SERVIÇOS!!</h1>

         <div class="menu">
            <a href="agendamento.php"><span class="tooltiptext">Unha de Fibra</span><img src="img/alongamento.jpg" height="300px"  width="300px"></a>
            <a href="agendamento.php"><span class="tooltiptext">Banho de Gel</span><img src="img/banho-de-gel.jpg" height="300px"  width="300px"></a>
            <a href="agendamento.php"><span class="tooltiptext">Esmaltação em gel</span><img src="img/esmaltação-em-gel4.png" height="300px"  width="300px"></a>
            <a href="agendamento.php"><span class="tooltiptext">Formato Amendoada</span><img src="img/amendoada-azul-claro.png" height="300px"  width="300px"></a>
            <a href="agendamento.php"><span class="tooltiptext">Formato Bailarina</span><img src="img/bailarina-branco.png" height="300px"  width="300px"></a>
            <a href="agendamento.php"><span class="tooltiptext">Formato Oval</span><img src="img/oval-delicada.png" height="300px"  width="300px"></a>
            <a href="agendamento.php"><span class="tooltiptext">Formato Aredondada</span><img src="img/redonda-delicada.png" height="300px"  width="300px"></a>
            <a href="agendamento.php"><span class="tooltiptext">Formato Stilleto</span><img src="img/stiletto2.png" height="300px"  width="300px"></a>
            <a href="agendamento.php"><span class="tooltiptext">Manicure</span><img src="img/manicure.png" height="300px"  width="300px"></a>
            <a href="agendamento.php"><span class="tooltiptext">Pédicure</span><img src="img/pé1.png" height="300px"  width="300px"></a>
        </div>
        <br>
        <br>
        <footer class="rodape">
        <div class="rodape-container">
            <main class="map">
                <h2>Mapa do site</h2>
                <ul>
                    <li><a href="ManuInicial.php">Inicio</a></li>
                    <li><a href="galeria.php">Galeria</a></li>
                    <li><a href="servicos.php">Serviços</a></li>

                </ul>
                <p>&copy;Todos direitos reservados</p>
                <li><a href="#">Termos de Uso</a></li>
                <li><a href="#">Política de Privacidade</a></li>
            </main>
           </div>
    </footer>
</body>
</html>