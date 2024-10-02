<?php
    include ("conectadb.php");
    include ("topo.php");

    //coletar dados post
    $tipo_cupons = ""; //inicia a variavel caso não tenha cupom

    //verifica a data de validade do cupom
    $data_atual = date('Y-m-d');
    $data_validade = '2000-01-01'; //inicia a variavel caso não tenha cupom(coloquei ano)
    $desconto = "";//inicia a variavel caso não tenha cupom
 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $idcliente = ($_POST['nomecliente']);
        $codigo = ($_POST['codigo']);
        //echo $codigo;

        #PESQUISA O CUPOM 
        $sqlcupons = "SELECT * FROM cupons WHERE codigo = '$codigo'";
        $retornocupons = mysqli_query($link, $sqlcupons);
        while ($tblcupons = mysqli_fetch_array($retornocupons)){
            $desconto = $tblcupons[2];
            $tipo_cupons = $tblcupons[3];
            $data_validade = $tblcupons[4];
        }
 
        #pesquisar os itens da compra
        $sql = "SELECT * FROM tb_item_venda WHERE iv_status = 1";
 
        #usado para fazer remção de itens no inventario
        $retornoproduto = mysqli_query($link, $sql);
 
        #usado para fazer o total
        $total =0; //inicializando a variavel
        $valortotal = "SELECT SUM(iv_valortotal) FROM tb_item_venda WHERE iv_status =1";
        $retornovalortotal = mysqli_query($link, $valortotal);
 
        while($tblvalortotal = mysqli_fetch_array($retornovalortotal)){
            $total = $tblvalortotal[0];
        }
        #ADD CUPOM
        if (strtotime($data_validade) >= strtotime($data_atual)){
            //verifica se o cupom já foi usado pelo cliente
            $sqlclientecupons = "SELECT COUNT(fk_cli_id) FROM tb_venda WHERE cupons = '$desconto'";
            $retornoclientecupons = mysqli_query($link, $sqlclientecupons);
            while ($tblclientecupons = mysqli_fetch_array($retornoclientecupons)){
                $clientecupons = $tblclientecupons[0];
            }
            if($clientecupons < 1 and $idcliente !=1 ){ //idcliente 1 = vazio
                echo 'cliente ok';
                //verificar o tipo de desconto
                    if($tipo_cupons == 'fixo'){
                        $total -=$desconto;
                    }
                    else if ($tipo_cupons == 'porcentagem'){
                        $total -=(($desconto*$total)/100);
                    }
                    else{
                        $total = $total;
                    }
            }

        }else{
            $total = $total; //não precisa mas por precaução né
        }

        //verifica se o desconto é maior do que o total 
        if($total < 0){
            $total = 0;
        }


        
        #usando para finalização da venda
        $retornocarrinho = mysqli_query($link, $sql);
        $usuario = $_SESSION['idusuario'];
 
        ///////////////// realizar correção de verificação de item do inventario
 
 
 
        #remoção de itens do inventario
        while ($tblitem = mysqli_fetch_array($retornoproduto)){
        $produto_id = $tblitem[4];
        $quantidade_item = $tblitem[2];
 
        //consulta para obter a quantidade atual do produto
        $sqlproduto = "SELECT pro_quantidade FROM tb_produtos WHERE pro_id = $produto_id";
        $retornoproduto_info = mysqli_query($link, $sqlproduto);
 
        //atualização da quantidade de produtos
        if($row = mysqli_fetch_array($retornoproduto_info)){
        $quantidade_produto = $row[0];
        $nova_quantidade = $quantidade_produto - $quantidade_item;
        $sql_update_produto = "UPDATE tb_produtos SET pro_quantidade = $nova_quantidade WHERE pro_id = $produto_id";
        $resultado_update_produto = mysqli_query($link, $sql_update_produto);
        }
 
        }
 
        $tbl = mysqli_fetch_array($retornocarrinho);

        $data = date("Y-m-d H:i:s");
 
       
 
        $sqlvenda = "INSERT INTO tb_venda(ven_datavenda, ven_totalvenda, fk_iv_cod_iv, fk_cli_id, fk_usu_id, cupons) VALUES('$data', $total, '$tbl[3]', $idcliente, $usuario, '$codigo')";
        mysqli_query($link, $sqlvenda);
 
 
        #TROCAR O STATUS DA VENDA PARA FECHADO
        $sqlfechavenda ="UPDATE tb_item_venda SET iv_status = 0 WHERE iv_status=1";
        mysqli_query($link, $sqlfechavenda);
 
        header("Location: backoffice.php");
 
 
 
 
    }
?>