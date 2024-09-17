<?php
include("conectadb.php");
include("topo.php");

#PESQUISA DA VENDA GERAL

#PESQUISA A DATA MINIMA E MAXIMA PARA OS FILTROS


$selectdatamin = "SELECT MIN(ven_datavenda) FROM tb_venda";
$selectdatamax = "SELECT MAX(ven_datavenda) FROM tb_venda";

$resultado_data_min = mysqli_query($link,$selectdatamin);
$resultado_data_max = mysqli_query($link,$selectdatamax);

$data_min = mysqli_fetch_array($resultado_data_min);
$data_max = mysqli_fetch_array($resultado_data_max);


//CONFIGURANDO A DATA PARA QUE O HTML MOSTRE BONITINHO

$data_min_string = date("Y-m-d", strtotime($data_min[0]));
$data_max_string = date("Y-m-d", strtotime($data_max[0]));

#PESQUISA OS CLIENTES PARA O FILTRO
$sqlcli = "SELECT cli_id, cli_nome FROM tb_clientes";
$retornocli = mysqli_query($link,$sqlcli);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idcliente = $_POST['idcliente'];
    $datainicial = $_POST['datainicial'];
    $datafinal = $_POST['datafinal'];

    if($datainicial < 0){
   $datainicial = $data_min_string;
    }

    
    if($datafinal < 0){
        $datafinal = $data_max_string;
    }



    //  A PAGINA CARREGOU....O QUE ELA VAI TRAZER?

    //PESQUISA NO BANCO TODOS OS PRODUTOS DO BANCO
    $sql= "SELECT v.ven_id, v.ven_datavenda, v.ven_totalvenda, v.fk_iv_cod_iv, v.fk_cli_id, v.fk_usu_id, c.cli_nome, u.usu_login  
    FROM tb_venda v

    JOIN 
    tb_clientes c ON v.fk_cli_id = c.cli_id

    JOIN 
    tb_usuarios u ON v.fk_usu_id = u.usu_id 

    WHERE
    v.ven_datavenda BETWEEN '$datainicial 0:0:0' AND '$datafinal 23:59:59'";
    //  $retorno = mysqli_query($link, $sql. "ORDER BY v.ven_id");

    $valortotal = "SELECT SUM(ven_totalvenda) FROM tb_venda WHERE ven_datavenda BETWEEN '$datainicial 0:0:0' AND '$datafinal 23:59:59' ";

    //  $retornovalortotal = mysqli_query($link,$valortotal);

    if($idcliente == 'todos'){
        $retorno = mysqli_query($link,$sql. " ORDER BY v.ven_id");
        //echo $valortotal;
        $retornovalortotal = mysqli_query($link, $valortotal. " ORDER BY ven_id");
    }
    else{
        $sql .= " AND c.cli_id = ". $idcliente . " ORDER BY v.ven_id";
        //echo $sql;
        $retorno = mysqli_query($link,$sql);

        $valortotal .= " AND fk_cli_id = ". $idcliente . " ORDER BY ven_id";
        $retornovalortotal = mysqli_query($link,$valortotal);
    }
}else{
 $sql = "SELECT v.ven_id, v.ven_datavenda, v.ven_totalvenda, v.fk_iv_cod_iv, v.fk_cli_id, v.fk_usu_id, c.cli_nome, u.usu_login  
 FROM tb_venda v

 JOIN tb_clientes c ON v.fk_cli_id = c.cli_id

 JOIN tb_usuarios u ON v.fk_usu_id = u.usu_id";

 $retorno = mysqli_query($link,$sql. " ORDER BY v.ven_id");
 $valortotal = "SELECT SUM(ven_totalvenda) FROM tb_venda";
 $retornovalortotal = mysqli_query($link,$valortotal);
 

}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    
    <title>LISTA VENDA</title>
</head>
<body>
    <div class="container-global">
        <form class="formulario" action="vendas-lista.php" method="post">
            <label>VALOR TOTAL BRUTO</label>
            <!--  PHP PARA RETORNAR A SOMA DO VALOR TOTAL -->
              <?php
              while ($tblvalortotal = mysqli_fetch_array($retornovalortotal)){
                echo "R$ " . $tblvalortotal[0];

              }?>
              <br><br>
              <label>FILTROS</label>
              <br>
              <label for="data"> SELECIONE A DATA INICIAL:</label>
              <input id="datainicial" name="datainicial"
              min="<?=$data_min_string?>" max="<?=$data_max_string?>" type="date">
              <label for="data"> SELECIONE A DATA FINAL:</label>
              <input id="datafinal" name="datafinal"
              min="<?=$data_min_string?>" max="<?=$data_max_string?>" type="date">

              <!-- FILTRO PARA PESQUISA DE CLIENTE -->
               <label>SELECIONE O CLIENTE:</label>
            <select name='idcliente'>
                <option value='todos'>TODOS</option>
                <?php WHILE($tblcli = mysqli_fetch_array($retornocli)){
                    ?>
                    <option value="<?= $tblcli[0]?>"><?=strtoupper($tblcli[1])?></option>
                <?php
                } ?>
            </select>
            <br>
            <input type="submit" value="PESQUISAR">
        </form>
    </div>
<br>


    <div class="container-listaproduto">


        <!-- LISTAR A TABELA DE USUARIOS -->
        <table class="lista">
            <tr>
                <th>ID</th>
                <th>DATA E HORA</th>
                <th>VALOR</th>
                <th>CLIENTE</th>
                <th>CODIGO</th>
                <th>VENDEDOR</th>
                <th>VISUALIZAR</th>
            </tr>

            <!-- O CHORO É LIVRE! CHOLA MAIS -->
            <!-- BUSCAR NO BANCO OS DADOS DE TODOS OS USUARIOS -->
             <?php
                while($tbl = mysqli_fetch_array($retorno)){
                 ?>
                 <tr>
                    <td><?=$tbl[0]?></td> 
                    <td><?=$tbl[1]?></td> 
                    <td><?=$tbl[2]?></td> 
                    <td><?=$tbl[6]?></td>
                    <td><?=$tbl[4]?></td> 
                    <td><?=$tbl[7]?></td> 
                   
                    
                    <td><a href="vendas-visualizar.php?id=<?= $tbl[3] ?>">
                            <input type="button" value="VISUALIZAR">
                    </a>
                    </td>
                 </tr>
                 <?php
                }
                ?>
        </table>

    </div>
    
</body>
</html>