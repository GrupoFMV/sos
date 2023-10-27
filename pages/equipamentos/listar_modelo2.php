<?php

include "../../database/conexao.php";
 ?>
 
 
 <label class="form-label mb-0">Informe o modelo:</label>

<?php // listando em um box os instrutores

			  echo "<SELECT NAME='modelo' SIZE='1' class='form-control' required id='modelo'>

<OPTION VALUE='' SELECTED> Informe o modelo ";
// Selecionando os dados da tabela em ordem decrescente
$sql = "SELECT * FROM modelos where modelo_marca ='$_POST[marca]'  ORDER BY modelo_nome";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado = mysqli_query($conn, $sql);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha=mysqli_fetch_array($resultado)) {
echo "<OPTION VALUE='".$linha['modelo_id']."'>".($linha['modelo_nome']);
}
echo "</SELECT>";

?>