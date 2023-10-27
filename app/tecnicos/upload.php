<?php
include_once "database/conexao.php";

// (A) SOME FLAGS
$total = isset($_FILES["upfile"]) ? count($_FILES["upfile"]["name"]) : 0 ;
$status = [];
$local= 'fotosos/';


// (B) PROCESS FILE UPLOAD
if ($total>0) { for ($i=0; $i<$total; $i++) {
  $source = $_FILES["upfile"]["tmp_name"][$i];
  $destination = $_FILES["upfile"]["name"][$i];
  $destinatio2n = $local.$_FILES["upfile"]["name"][$i];
  //echo $destination;    
  $conn->query($insert = "INSERT INTO fotos_os (foto_os, foto_os_os) VALUES ('$destination','$_POST[os]')");

  if (move_uploaded_file($source, $destinatio2n) === false) {
    $status[] = "Error uploading to $destinatio2n";
  }
}} else { $status[] = "No files uploaded!"; }

/* (C) DONE - WHAT'S NEXT?
if (count($status)==0) {
  // REDIRECT TO OK PAGE?
  header("Location: http://site.com/somewhere/");
  // SHOW AN "OK" PAGE?
  require "OK.PHP"
}
// (D) HANDLE ERRORS?
else {
  // (D1) SHOW ERRORS?
  // print_r($status);
  // (D2) REDIRECT BACK TO UPLOAD PAGE?
  header("Location: http://site.com/1-upload.html/?error=1");
}
*/
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<style type="text/css">
        h1 {
            color:green;
        }
        .xyz {
            background-size: auto;
            text-align: center;
            padding-top: 100px;
        }
        .btn-circle.btn-sm {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            font-size: 14px;
            text-align: center;
        }
        .btn-circle.btn-md {
            width: 50px;
            height: 50px;
            padding: 7px 10px;
            border-radius: 25px;
            font-size: 10px;
            text-align: center;
        }
        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            border-radius: 35px;
            font-size: 12px;
            text-align: center;
        }
    </style>
<div class="row">
    <?php 
$cmde = "SELECT * FROM fotos_os where foto_os_os = $_POST[os] and foto_os_lixeira = '1'  ";
$equipamentos = mysqli_query($conn, $cmde);
while($equipamento = mysqli_fetch_array($equipamentos)){
?>
<div class="col-6" align="center">
<img src="fotosos/<?php echo $equipamento['foto_os'] ?>" alt="Girl in a jacket" height="80">


<div class="col-12">
<form id="salvar<?php echo $equipamento['id_foto'] ?>" method="POST">
<input type="text" name="desc" class="form-control" >

<div id="f2salvar<?php echo $equipamento['id_foto'] ?>" style="display:block">
<button align="left" type="submit" style="border:none">
<span class="material-symbols-outlined" style="font-size:12px">autorenew</span>Atualizar</button> 
</div>
<div id="rssalvar<?php echo $equipamento['id_foto'] ?>"> </div>



 <br>
</div>
<input name="id" value="<?php echo $equipamento['id_foto'] ?>" type="hidden"> 
</form>
<br>



</div>


<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
$(document).ready(function() {
 $("#salvar<?php echo $equipamento['id_foto'] ?>").submit(function(){
var formData = new FormData(this);
  $.ajax({
    url: 'salvardescfoto.php',
    cache: false,
    data: formData,
    type: "POST",  
    enctype: 'multipart/form-data',
    processData: false, // impedir que o jQuery tranforma a "data" em querystring
    contentType: false, // desabilitar o cabeçalho "Content-Type"
    success: function(msg){
      $("#rssalvar<?php echo $equipamento['id_foto'] ?>").empty();
      $("#rssalvar<?php echo $equipamento['id_foto'] ?>").append(msg);
      document.getElementById("f2salvar<?php echo $equipamento['id_foto'] ?>").style.display = "none";

    }
  });
   return false;
 });
});
</script>		
<?php } ?>

</div>

<div align="center">
<form action="salvar_finalizar_chamado" method="post">

<input name="equipamento" type="hidden" value="<?php echo $_POST['equipamento'] ?>">
<input name="os" type="hidden" value="<?php echo $_POST['os'] ?>">
<input name="status" type="hidden" value="<?php echo $_POST['status'] ?>">
<input name="chamado" type="hidden" value="<?php echo $_POST['chamado'] ?>">
<input name="obs" type="hidden" value="<?php echo $_POST['desc'] ?>">
<button class="btn btn-success rounded"> Finalizar </button> </div>
</form>
</div>