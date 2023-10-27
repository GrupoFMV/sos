<?php
include_once "database/conexao.php";

@$conn->query("update fotos_os set foto_os_descricao ='$_POST[desc]'  where id_foto = '$_POST[id2]' ");

?>
<button align="left" type="submit" style="border:none">
<span class="material-symbols-outlined" style="font-size:12px">autorenew</span>Salvo</button> 



