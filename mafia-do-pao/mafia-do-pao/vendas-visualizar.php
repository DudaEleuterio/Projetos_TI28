<?php
include("conectadb.php");
include("topo.php");

$id = $_GET['id'];


$sql = "SELECT pro.pro_id, pro.pro_nome, pro.pro_imagem, pro.pro_preco, iv.iv_quantidade, iv.iv_valortotal, iv.iv_id, iv.iv_cod_iv, cli.cli_nome, ven.ven_datavenda
     
FROM 
    tb_produtos pro
JOIN tb_item_venda iv ON pro.pro_id = iv.fk_pro_id
JOIN tb_venda ven ON iv.iv_cod_iv = ven.fk_iv_cod_iv
JOIN tb_clientes cli ON ven.fk_cli_id = cli.cli_id
WHERE iv.iv_cod_iv = '$id';
";

$retorno = mysqli_query($link, $sql);
//echo $sql;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>VENDAS</title>

    <div class="container-global">
    <form class="formulario" action="vendas-visualizar.php" method="post" enctype="multipart/form-data">

    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome Produto</th>
            <th>Produto</th>
            <th>Valor Unitário</th>
            <th>Quantidade</th>
            <th>Valor Total</th>
            <th>Data da Venda</th>
        </tr>
    </thead>
    <body>
        <?php while($tbl = mysqli_fetch_array($retorno)) { ?>
            <tr>
                <td><?=$tbl[0]?></td>
                <td><?=$tbl[1]?></td>
                <td><img src='data:image/jpeg;base64,<?= $tbl[2]?>'width="100" height="100"></td> <!-- COLETA A IBAGEM -->
                <td><?=$tbl[3]?></td>
                <td><?=$tbl[4]?></td>
                <td><?=$tbl[5]?></td>
                <td><?=$tbl[9]?></td>

            </tr>
        <?php } ?>
    </body>
</table>
    

</head>
<body>
</html>




