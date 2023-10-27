<?php

include "../database/conexao.php";
?>
  <base href="http://localhost/SOSElevadores/" />

<meta charset="utf-8" />
<title>SOS DOS ELEVADORES</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- Layout config Js -->
<script src="assets/js/layout.js"></script>
<!-- Bootstrap Css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>


<form action="select/salvar.php" method="POST"> 
<label class="form-label mb-0">Aplicações</label><br>
													   
                                                       <select class="selectpicker form-control" name="aplicacao[]" multiple data-live-search="true">
                                                                                                              <?php
                                                       
                                                       $sqlaca = "SELECT * FROM marcas m inner join modelos mo ON m.marca_id = mo.modelo_marca order by mo.modelo_marca  ";
                                                       $exeaca = mysqli_query($conn, $sqlaca);
                                                       while ($categoria = mysqli_fetch_array($exeaca)) { 
                                                       
                                                           
                                                       ?>
                                                       <option value="<?php  echo $categoria['modelo_id'] ?>" ><?php  echo $categoria['marca_nome'] ?> - <?php  echo $categoria['modelo_nome'] ?> </option>
                                                       
                                                       
                                                       
                                                       <?php
                                                        
                                                           
                                                       }
                                                           ?>
                                                                                                                  </select>
<button> salvar </button>
                                                    </form>