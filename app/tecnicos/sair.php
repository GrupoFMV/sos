<?php

@session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email']);

$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: logar.php");

?>
<script language= "JavaScript" type="text/javascript">
location.href="logar.php"
                                   </script>