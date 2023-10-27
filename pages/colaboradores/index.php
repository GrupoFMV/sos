<?php
include "config.php";
	
	
	//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
mysqli_set_charset($conn,"utf8");

date_default_timezone_set('America/Sao_Paulo');
$data1 = date('Y-m-d');
$hora2 = date('H:i:s');
$datageral = date('Y-m-d');	
$data = substr($data1,8,2) . '/' .substr($data1,5,2) . '/' . substr($data1,0,4);
$hora = substr($hora2,0,2) . 'h' .substr($hora2,3,2) . 'min';
$segd = date('Ymd');
$segh = date('His');

$seguranca = $segd.$segh;



$cmd = "select * from link where codigo = '$codigo'   ";
$clientes = mysqli_query($conn, $cmd);
$total = mysqli_num_rows($clientes);
$link = mysqli_fetch_array($clientes);



//a super variável $_SERVER[] vai pegar a url
$url = $_SERVER['REQUEST_URI'];
//com a função explode você separa a url em partes
$parteurl = explode('/', $url);
//na variável $parteurldesejada url estará a parte da url que você quer
$parteurldesejada = $parteurl[sizeof($parteurl)-1];

echo $parteurldesejada;
?>

