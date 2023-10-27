<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
// PEGANDO DADOS DO PLANO
$sql = "SELECT * FROM plano_manutencao WHERE id_plano ='$id' ";
$resultado = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($resultado);

?> 
 <!-- Sweet Alert css-->
<link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<!-- INICIO DADOS INICIAIS -->
 <style>
    .container {
      max-width: 450px;
    }
    .imgGallery img {
      padding: 8px;
      max-width: 100px;
    }    
  </style>

<form method="post" action="alterar_plano_manutencao" > 
	
		
		
 <div class="row">
	 
	 
	 
<!--Inicio Formulario-->
                            <div class="row">
                               
                                    <h4 class="mb-sm-0">Técnica /  Plano de Manutenção Mensal</h4>
                                    <div class="row gy-3">                              
                                <div class="card">
									 <div class="card-body"> 
                               
										 <div class="row">
<div class="col-10"> 
<h4>Editar </h4>
</div>
<div class="col-2" align="right"> 
<a href="deletar_plano/<?php echo $linha['id_plano'] ?>" onclick="return confirm('Tem certeza que deseja deletar este registro?')"><strong>Excluir</strong></a>

</div>

											 
											 <div class="row gy-3">

                                                <div class="col-lg-6">
                                                   <div>

<label class="form-label mb-0">Nome da Tarefa</label>
<input name="nome" required type="text" class="form-control" value = "<?php echo $linha['tarefa_plano'] ?>" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                   <div>

<label class="form-label mb-0">Obrigatorio envio de foto?</label>
<select name="foto" class="form-control">
<?php if($linha[foto_plano] == '0') { ?> 
<option value="0" selected>Não</option>
<option value="1">Sim</option>
 <?php } ?>    
 <?php if($linha[foto_plano] == '1') { ?> 
<option value="0" >Não</option>
<option value="1" selected>Sim</option>
 <?php } ?>  

  
=
  
</select>
                                                    </div>
                                                </div>

                                               
                                                </div>

<div class="col-lg-1">
<label>Jan</label>
<select name="janeiro" class="form-control">
<option value="<?php echo $linha['01_plano'] ?>"><?php echo $linha['01_plano'] ?></option>

  <option value="0"></option>
  <option value="A">A</option>
  <option value="P">P</option>
  <option value="O">O</option>
  
</select>
</div>

<div class="col-lg-1">
<label>Fev</label>
<select name="fevereiro" class="form-control">
<option value="<?php echo $linha['02_plano'] ?>"><?php echo $linha['02_plano'] ?></option>

  <option value="0"></option>
  <option value="A">A</option>
  <option value="P">P</option>
  <option value="O">O</option>
  
</select>
</div>

<div class="col-lg-1">
<label>Mar</label>
<select name="marco" class="form-control">
<option value="<?php echo $linha['03_plano'] ?>"><?php echo $linha['03_plano'] ?></option>

  <option value="0"></option>
  <option value="A">A</option>
  <option value="P">P</option>
  <option value="O">O</option>
  
</select>
</div>

<div class="col-lg-1">
<label>Abr</label>
<select name="abril" class="form-control">
<option value="<?php echo $linha['04_plano'] ?>"><?php echo $linha['04_plano'] ?></option>

  <option value="0"></option>
  <option value="A">A</option>
  <option value="P">P</option>
  <option value="O">O</option>
  
</select>
</div>

<div class="col-lg-1">
<label>Mai</label>
<select name="maio" class="form-control">
<option value="<?php echo $linha['05_plano'] ?>"><?php echo $linha['05_plano'] ?></option>

  <option value="0"></option>
  <option value="A">A</option>
  <option value="P">P</option>
  <option value="O">O</option>
  
</select>
</div>

<div class="col-lg-1">
<label>Jun</label>
<select name="junho" class="form-control">
<option value="<?php echo $linha['06_plano'] ?>"><?php echo $linha['06_plano'] ?></option>

  <option value="0"></option>
  <option value="A">A</option>
  <option value="P">P</option>
  <option value="O">O</option>
  
</select>
</div>

<div class="col-lg-1">
<label>Jul</label>
<select name="julho" class="form-control">
<option value="<?php echo $linha['07_plano'] ?>"><?php echo $linha['07_plano'] ?></option>

  <option value="0"></option>
  <option value="A">A</option>
  <option value="P">P</option>
  <option value="O">O</option>
  
</select>
</div>

<div class="col-lg-1">
<label>Ago</label>
<select name="agosto" class="form-control">
<option value="<?php echo $linha['08_plano'] ?>"><?php echo $linha['08_plano'] ?></option>

  <option value="0"></option>
  <option value="A">A</option>
  <option value="P">P</option>
  <option value="O">O</option>
  
</select>
</div>

<div class="col-lg-1">
<label>Set</label>
<select name="setembro" class="form-control">
<option value="<?php echo $linha['09_plano'] ?>"><?php echo $linha['09_plano'] ?></option>

  <option value="0"></option>
  <option value="A">A</option>
  <option value="P">P</option>
  <option value="O">O</option>
  
</select>
</div>

<div class="col-lg-1">
<label>Out</label>
<select name="outubro" class="form-control">
<option value="<?php echo $linha['10_plano'] ?>"><?php echo $linha['10_plano'] ?></option>

  <option value="0"></option>
  <option value="A">A</option>
  <option value="P">P</option>
  <option value="O">O</option>
  
</select>
</div>

<div class="col-lg-1">
<label>Nov</label>
<select name="novembro" class="form-control">
<option value="<?php echo $linha['11_plano'] ?>"><?php echo $linha['11_plano'] ?></option>

  <option value="0"></option>
  <option value="A">A</option>
  <option value="P">P</option>
  <option value="O">O</option>
  
</select>
</div>
        
<div class="col-lg-1">
<label>Dez</label>
<select name="dezembro" class="form-control">
<option value="<?php echo $linha['12_plano'] ?>"><?php echo $linha['12_plano'] ?></option>

  <option value="0"></option>
  <option value="A">A</option>
  <option value="P">P</option>
  <option value="O">O</option>
  
</select>
</div>
                                                
<div class="col-lg-12">                                              
<label class="form-label mb-0">Observações</label>
<input name="observacoes"  type="text" class="form-control" value="<?php echo $linha['observacoes_plano'] ?>" >											 
</div>											 
												
		<input type="hidden" value="<?php echo $id ?>" name="id">										

                                               
												 
												 
                                                

</div>								
	<br>	

				
				
		
		
		
			
			<button class="btn btn-warning"> Salvar </button> <br><br>
								
			</form>			
								
								</div></div></div>		</div>
					
							
                                <div class="row">
                               
                              
                               <div class="row gy-3">                              
                           <div class="card">
                                <div class="card-body"> 
                          
                                    <div class="row">

                                        <h4>Cadastrados</h4>
                                       
                                        
                                        <div class="row gy-3">

                                        <div class="col-lg-2">
                                             Tarefa
                                           </div>
                                        
                                           <div class="col-lg-10">
                                  <div class="row">

                                  <div class="col-lg-1">
                                             Janeiro
                                           </div>
                                           <div class="col-lg-1">
                                             Fevereiro
                                           </div>
                                           <div class="col-lg-1">
                                             Março
                                           </div>
                                           <div class="col-lg-1">
                                             Abril
                                           </div>
                                           <div class="col-lg-1">
                                             Maio
                                           </div>
                                           <div class="col-lg-1">
                                             Junho
                                           </div>
                                           <div class="col-lg-1">
                                             Julho
                                           </div>
                                           <div class="col-lg-1">
                                             Agosto
                                           </div>
                                           <div class="col-lg-1">
                                             Setembro
                                           </div>
                                           <div class="col-lg-1">
                                             Outubro
                                           </div>
                                           <div class="col-lg-1">
                                             Novembro
                                           </div>
                                           <div class="col-lg-1">
                                             Dezembro
                                           </div>
</div>


                                           </div>

                                           <?php 
                                           $sql = "SELECT * FROM plano_manutencao WHERE status_plano ='1'";
                                           // Executando $sql e verificando se tudo ocorreu certo.
                                           $resultado = mysqli_query($conn, $sql);
                                           //Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
                                           while ($linha = mysqli_fetch_array($resultado)) {

                                             ?> 




                                             
                                             <div class="col-lg-2">
                                             <a href="editar_plano/<?php echo $linha['id_plano'] ?>"> <i class="ri-edit-fill"> </i> </a> <?php echo $linha['tarefa_plano'] ?>
                                             <?php if($linha['observacoes_plano'] <> '') { ?> <i class="ri-information-fill" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $linha['id_plano'] ?>"> </i> <?php } ?>
                                             <?php if($linha['foto_plano'] == '1') { ?> <i class="ri-image-add-fill"></i><?php } ?>
                                           </div>
                                        
                                           <div class="col-lg-10">
                                  <div class="row">

                                  <div class="col-lg-1">
                                  <?php if($linha['01_plano'] == '0') { ?> <?php  } else { ?> <?php echo $linha['01_plano']  ?> <?php } ?>
                                           </div>
                                           <div class="col-lg-1">
                                           <?php if($linha['02_plano'] == '0') { ?> <?php  } else { ?> <?php echo $linha['02_plano']  ?> <?php } ?>

                                           </div>
                                           <div class="col-lg-1">
                                           <?php if($linha['03_plano'] == '0') { ?> <?php  } else { ?> <?php echo $linha['03_plano']  ?> <?php } ?>
                                           </div>
                                           <div class="col-lg-1">
                                           <?php if($linha['04_plano'] == '0') { ?> <?php  } else { ?> <?php echo $linha['04_plano']  ?> <?php } ?>
                                           </div>
                                           <div class="col-lg-1">
                                           <?php if($linha['05_plano'] == '0') { ?> <?php  } else { ?> <?php echo $linha['05_plano']  ?> <?php } ?>
                                           </div>
                                           <div class="col-lg-1">
                                           <?php if($linha['06_plano'] == '0') { ?> <?php  } else { ?> <?php echo $linha['06_plano']  ?> <?php } ?>

                                           </div>
                                           <div class="col-lg-1">
                                           <?php if($linha['07_plano'] == '0') { ?> <?php  } else { ?> <?php echo $linha['07_plano']  ?> <?php } ?>

                                           </div>
                                           <div class="col-lg-1">
                                           <?php if($linha['08_plano'] == '0') { ?> <?php  } else { ?> <?php echo $linha['08_plano']  ?> <?php } ?>

                                           </div>
                                           <div class="col-lg-1">
                                           <?php if($linha['09_plano'] == '0') { ?> <?php  } else { ?> <?php echo $linha['09_plano']  ?> <?php } ?>

                                           </div>
                                           <div class="col-lg-1">
                                           <?php if($linha['10_plano'] == '0') { ?> <?php  } else { ?> <?php echo $linha['10_plano']  ?> <?php } ?>

                                           </div>
                                           <div class="col-lg-1">
                                           <?php if($linha['11_plano'] == '0') { ?> <?php  } else { ?> <?php echo $linha['11_plano']  ?> <?php } ?>

                                           </div>
                                           <div class="col-lg-1">
                                           <?php if($linha['12_plano'] == '0') { ?> <?php  } else { ?> <?php echo $linha['12_plano']  ?> <?php } ?>
                                           </div>
</div>


                                           </div>


<hr>
<div id="myModal<?php echo $linha['id_plano'] ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Observações</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5 class="fs-15">
                                                                  <?php echo $linha['observacoes_plano'] ?>
                                                                </h5>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                                                            </div>
        
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
								
     <?php } ?>
                                              </div></div></div></div></div></div></div>