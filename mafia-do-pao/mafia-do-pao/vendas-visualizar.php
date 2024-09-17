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
            <th>Valor Unitário</th>
            <th>Quantidade</th>
            <th>Valor Total</th>
            <th>Cliente</th>
            <th>Data da Venda</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?=$tbl[0];?></td>
                <td><?=$tbl[1];?></td>
                <td><?=$tbl[3];?></td>
                <td><?=$tbl[4];?></td>
                <td><?=$tbl[5];?></td>
                <td><?=$tbl[];?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
    

</head>
<body>
</html>




