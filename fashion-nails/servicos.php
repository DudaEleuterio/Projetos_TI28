<?php
include("conecta.php");
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="estilo.servicos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
      <h2>Fashion Nails</h2>
        <nav>
            <ul>
                <li><a href="ManuInicial.php">Inicio</a></li>
                <li><a href="galeria.php">Galeria</a></li>
                <li><a href="agendamento.php">Agendamento</a></li>
                <li><a href="cadastro-servicos.php">Cadastrar serviços</a></li>
                
            </ul>
        </nav>
    </header>
    <br>
    <br>

     <div class="slideshow-container">
        <div class="mySlides fade" style="display: none;"></div>
        <div class="mySlides fade" style="display: none;"></div>
     </div>

     <div class="conteudo">
            <h2>Serviços e Preços</h2>
            </div>  

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
      
     <div class="slideshow-container">
        <div class="mySlides fade" style="display: none;"></div>
        <div class="mySlides fade" style="display: none;"></div>
     </div>
 
     <div class="container">
        <div id="myCarousel" class="carousel slide">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li class="item1 active"></li>
            <li class="item2"></li>
            <li class="item3"></li>
            <li class="item4"></li>
            <li class="item5"></li>
            <li class="item6"></li>
            <li class="item7"></li>
          </ol>
          
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
       
            <div class="item active">
              <a href="agendamento.php"><img src="img/banho-gel.png" alt="Banho-em-gel" width="300" height="300"></a>
              <div class="carousel-caption">
                <text class="Banho-em-gel"><b>Banho em Gel</b></text>
                <br>
                <br>
                <h3>Valor: R$ 150,00</h3>
                
                <p class="Banho-em-gel"></p>
 
              </div>
            </div>
         
            <div class="item">
              <a href="agendamento.php"><img src="img/unha-fibra2.png" alt="Unha de Fibra" width="300" height="300"></a>
              <div class="carousel-caption">
                <text class="Unha de Fibra"><b>Unha de Fibra</b></text>
                <br>
                <br>
                <h3>Valor: R$ 160,00</h3>

                 <p class="Unha de Fibra"></p>
              </div>
            </div>

            <div class="item">
              <a href="agendamento.php"><img src="img/manutenção-gel.png" alt="Manutenção-de-gel" width="300" height="300"></a>
              <div class="carousel-caption">
                <text class="Manutenção Gel"><b>Manutenção de gel</b></text>
                <br>
                <br>
                <h3>Valor: R$ 80,00</h3>

                 <p class="Manutenção-de-gel"></p>
              </div>
            </div>

            <div class="item">
              <a href="agendamento.php"><img src="img/manutenção-fibra.png" alt="Manutenção de Fibra" width="300" height="300"></a>
              <div class="carousel-caption">
                <text class="Manutenção de Fibra"><b>Manutenção de Fibra</b></text>
                <br>
                <br>
                <h3>Valor: R$ 90,00</h3>

                 <p class="Manutenção de Fibra"></p>
              </div>
            </div>
          
            <div class="item">
              <a href="agendamento.php"><img src="img/manicure.png" alt="Manicure" width="300" height="300"></a>
              <div class="carousel-caption">
                <text class="Manicure"><b>Manicure</b></text>
                <br>
                <br>
                <h3>Valor: R$ 35,00</h3>

                <p class="Manicure"></p>
              </div>
            </div>
 
            <div class="item">
              <a href="agendamento.php"><img src="img/pédicure.png" alt="Pédicure" width="300" height="300"></a>
               
                <div class="carousel-caption">
                <text class="Pédicure"><b>Pédicure</b></text>
                <br>
                <br>
                <h3>Valor: R$ 35,00</h3>

                <p class="Pédicure"></p>
                </div>
              </div>

              <div class="item">
              <a href="agendamento.php"><img src="img/spa.png" alt="Spa dos pés" width="300" height="300"></a>
              <div class="carousel-caption">
                <text class="Spa dos pés"><b>Spa dos pés</b></text>
                <br>
                <br>
                <h3>Valor: R$ 60,00</h3>

                <p class="Spa dos pés"></p>
              </div>
            </div>
       
          </div>
     
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
     
      <script>
      $(document).ready(function(){
        // Activate Carousel
        $("#myCarousel").carousel();
         
        // Enable Carousel Indicators
        $(".item1").click(function(){
          $("#myCarousel").carousel(0);
        });
        $(".item2").click(function(){
          $("#myCarousel").carousel(1);
        });
        $(".item3").click(function(){
          $("#myCarousel").carousel(2);
        });
        $(".item4").click(function(){
          $("#myCarousel").carousel(3);
        });
        $(".item5").click(function(){
          $("#myCarousel").carousel(4);
        });
        $(".item6").click(function(){
          $("#myCarousel").carousel(5);
        });
        $(".item7").click(function(){
          $("#myCarousel").carousel(6);
        });
         
        // Enable Carousel Controls
        $(".left").click(function(){
          $("#myCarousel").carousel("prev");
        });
        $(".right").click(function(){
          $("#myCarousel").carousel("next");
        });
      });
      </script>
     
      
      
      </body>
      </html>
      
