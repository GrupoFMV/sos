<?php

//cCODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

include "database/conexao.php";

 ?>
<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<?php
@$conn->query("update produtos set produto_nome ='$_POST[nome]',produto_valor_compra ='$_POST[compra]',produto_valor_venda ='$_POST[venda]'
,produto_estoque ='$_POST[estoque]',produto_ncm ='$_POST[ncm]',produto_tipo ='$_POST[tipo]',produto_local_estoque ='$_POST[localestoque]',
produto_estoque_minimo ='$_POST[estoqueminimo]' where produto_id = '$_POST[id]' ");



$range = "";
$x='0';
foreach($_POST["aplicacao"] as $valor){
    $x++; 
    $range = $range . $valor.','; 


    $sql = "SELECT * FROM produtos_aplicacoes WHERE produto_ap_produto ='$_POST[id]' and produto_ap_modelo = $valor ";
    $resultado = mysqli_query($conn, $sql);
    $total1=mysqli_num_rows($resultado);
    $linha=mysqli_fetch_array($resultado);
    //echo  'deixar'.  -   $linha[produto_ap_id];

    if($total1 >= '1') { 
     @$conn->query("update produtos_aplicacoes set produto_ap_status ='1'                        
      where produto_ap_produto ='$_POST[id]' and produto_ap_modelo = $valor ");    
    }

    if($total1 == '0') { 
    $conn->query($insert = "INSERT INTO produtos_aplicacoes (produto_ap_produto,produto_ap_modelo)
   VALUES ('$_POST[id]','$valor')");
   }
}



?>
<?php
//echo $x;
if ($x <= '1') {
 //@$conn->query("DELETE FROM produtos_aplicacoes   where  produto_ap_produto= $_POST[id] ");  

}


function removeUltimoCaracter($str, $caracter){
    return rtrim($str, $caracter);
 }
 $regra = removeUltimoCaracter($range, "," );
 //echo $regra;

$sql = "SELECT * FROM produtos_aplicacoes WHERE produto_ap_produto ='$_POST[id]' and produto_ap_modelo NOT IN ($regra) ";
$resultado = mysqli_query($conn, $sql);
$total1=mysqli_num_rows($resultado);

while($linha=mysqli_fetch_array($resultado)) { 

 @$conn->query("DELETE FROM produtos_aplicacoes   where  produto_ap_id= $linha[produto_ap_id] ");  


}
?>



<?php

$range2 = "";
$x2='0';
foreach($_POST["fornecedor"] as $valor2){
    $x2++; 
    $range2 = $range2 . $valor2.','; 


    $sql = "SELECT * FROM produtos_fornecedores WHERE produto_f_produto ='$_POST[id]' and produto_f_fornecedor = $valor2 ";
    $resultado = mysqli_query($conn, $sql);
    $total1=mysqli_num_rows($resultado);
    $linha=mysqli_fetch_array($resultado);
    //echo  'deixar'.  -   $linha[produto_ap_id];



    if($total1 >= '1') { 
     @$conn->query("update produtos_fornecedores set produto_f_status ='1'                        
      where produto_f_produto ='$_POST[id]' and produto_f_fornecedor = $valor2 ");    
    }

    if($total1 == '0') { 
    $conn->query($insert = "INSERT INTO produtos_fornecedores (produto_f_produto,produto_f_fornecedor)
   VALUES ('$_POST[id]','$valor2')");
   
   echo $insert;
   }
}



?>
<?php
//echo $x2;
if ($x2 <= '1') {
 //@$conn->query("DELETE FROM produtos_fornecedores   where  produto_f_produto= $_POST[id] ");  

}


function removeUltimoCaracter2($str, $caracter){
    return rtrim($str, $caracter);
 }
 $regra2 = removeUltimoCaracter2($range2, "," );
 //echo $regra2;

$sql = "SELECT * FROM produtos_fornecedores WHERE produto_f_produto ='$_POST[id]' and produto_f_fornecedor NOT IN ($regra2) ";
$resultado = mysqli_query($conn, $sql);
$total1=mysqli_num_rows($resultado);

while($linha=mysqli_fetch_array($resultado)) { 

 @$conn->query("DELETE FROM produtos_fornecedores   where  produto_f_id= $linha[produto_f_id] ");  


}
?>






<script>

alert("Atualizado com sucesso!");
window.location.href = "listar_produtos/<?php echo $_POST[pagina] ?>";


</script>