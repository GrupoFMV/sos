    <?php
include "../database/conexao.php";

foreach($_POST["aplicacao"] as $valor){
    $conn->query($insert = "INSERT INTO produtos_aplicacoes (produto_ap_produto,produto_ap_modelo)
    VALUES ('1','$valor')");
}

?>