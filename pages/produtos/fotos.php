<?php // CODIGO DA SESSION

if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

// PEGANDO DADOS DOS PRODUTOS
$sql = "SELECT * FROM produtos WHERE produto_id ='$id' ";
$resultado = mysqli_query($conn, $sql);
$linha=mysqli_fetch_array($resultado);

define('BASE_PATH', 'http://localhost/SOSElevadores/');


?> 
 <!-- Sweet Alert css-->
 <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>

 <!-- Sweet Alert css-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- INICIO DADOS INICIAIS -->

	
		
		
 <div class="row">
<h4 class="mb-sm-0">Produtos > <?php echo $linha[produto_nome] ?> > Adicionar Fotos</h4>
<div class="row gy-3">                              
<div class="card">
<div class="card-body"> 
<div class="row">
<iframe src="fotos/index.php?id=<?php echo $id ?>" width="100%" height="150">
</iframe>
	</div></div></div></div></div>

	<div class="row">
<h4 class="mb-sm-0">Produtos / Fotos</h4>
<div class="row gy-3">                              
<div class="card">
<div class="card-body"> 
<div class="row">
<div class="row">

<?php 
$sqlf = "SELECT * FROM fotos WHERE foto_produto ='$id' ";
$resultadof = mysqli_query($conn, $sqlf);
while($linhaf=mysqli_fetch_array($resultadof)) {
?>


<div class="col-auto"><a href="fotos/images/<?php echo $linhaf[original_image] ?>" target='blank'> <img src="fotos/images/<?php echo $linhaf[thumbnail_image] ?>" width="150px"> </a>
 <BR> <a href="remover_foto/<?php echo $linhaf[foto_id] ?>/<?php echo $id ?>"> REMOVER </a>
</div>



<?php } ?></div>
	</div></div></div></div></div>

	<a href="listar_produtos" class="btn btn-info">VOLTAR</a>




	<input type="hidden" id='base_path' value="<?php echo BASE_PATH; ?>">
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.form.min.js"></script>
    <script src="js/script.js"></script>
														 


                                               
