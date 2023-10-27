<?php
include_once "../database/conexao.php";

// (A) SOME FLAGS
$total = isset($_FILES["upfile"]) ? count($_FILES["upfile"]["name"]) : 0 ;
$status = [];
$local= 'fotos/';


// (B) PROCESS FILE UPLOAD
if ($total>0) { for ($i=0; $i<$total; $i++) {
  $source = $_FILES["upfile"]["tmp_name"][$i];
  $destination = $_FILES["upfile"]["name"][$i];
  $destinatio2n = $local.$_FILES["upfile"]["name"][$i];
  //echo $destination;    
  $conn->query($insert = "INSERT INTO fotos_os (foto_os) VALUES ('$destination')");

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
$cmde = "SELECT * FROM fotos_os  ";
$equipamentos = mysqli_query($conn, $cmde);
while($equipamento = mysqli_fetch_array($equipamentos)){

    echo $equipamento['foto_os'];
}


