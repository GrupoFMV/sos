<?php // CODIGO DA SESSION

if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

// PEGANDO DADOS DO DEPENDENTE 
$sql = "SELECT * FROM dependentes WHERE dependente_id ='$id' and dependente_emp='$user[user_emp]' ";
$resultado = mysqli_query($conn, $sql);
$linha=mysqli_fetch_array($resultado);
?> 


 <!-- Sweet Alert css-->
<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>



<!-- INICIO DADOS INICIAIS -->

<form method="post" action="alterar_equipamento" id="formcadastro2"> 
	
	<div id="dvConteudo2" style="display: block">	
		
		
 <div class="row">
	 
	 
	 
	 <!-- INICIO DADOS PESSOAIS -->
                            <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Dados Pessoais</h4>
                                             <div class="row gy-3">
                                             <div class="col-lg-12">
                                                   <div>
                                                     <label class="form-label mb-0">Nome:</label>
                                                       <input name="nome" type="text" class="form-control" id="nome" value="<?php echo $linha['dependente_nome'] ?>" >
                                                    </div>
                                                </div>





                                             <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Escola da Criança:</label>
                                                        <input name="escola"  type="text" class="form-control" id="escola"  value="<?php echo $linha['dependente_escola'] ?>" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Telefone da Escola :</label>
                                                        <input name="tel"  type="text" class="form-control" id="tel"  value="<?php echo $linha['dependente_tel_escola'] ?>" >
                                                    </div>
                                                </div>
							
											
											 
											 

                                          
												 
                                               
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Sexo:</label>
                                                        <input name="sexo"  type="text" class="form-control" id="sexo" value="<?php echo $linha['dependente_sexo'] ?>"  >
                                                    </div>
                                                </div>
							
                                                
												 
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Data de Nascimento:</label>
                                                        <input name="nascimento"  type="date" class="form-control" id="nascimento" value="<?php echo $linha['dependente_nascimentos'] ?>" >
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row gy-3">

                                                <div class="col-lg-6">
                                                <?php // listando em um box os serviços 

echo "<SELECT NAME='responsavel_1' SIZE='1' class='form-control' id='ramo' required>

<OPTION VALUE='' SELECTED> Responsavel 1 ";


// Selecionando os dados da tabela em ordem decrescente
$sql5 = "SELECT * FROM clientes where cliente_status = 1 and cliente_lixeira = 1  ORDER BY cliente_nome";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado5 = mysqli_query($conn, $sql5);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha5=mysqli_fetch_array($resultado5)) {
echo "<OPTION VALUE='".$linha5['cliente_id']."'>".($linha5['cliente_nome']);
}
echo "</SELECT>";

?>
 </div>
 <div class="col-lg-6">
                                                <?php // listando em um box os serviços 

echo "<SELECT NAME='responsavel_2' SIZE='1' class='form-control' id='ramo' >

<OPTION VALUE='' SELECTED> Responsavel 2 ";


// Selecionando os dados da tabela em ordem decrescente
$sql5 = "SELECT * FROM clientes where cliente_status = 1 and cliente_lixeira = 1  ORDER BY cliente_nome";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado5 = mysqli_query($conn, $sql5);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha5=mysqli_fetch_array($resultado5)) {
echo "<OPTION VALUE='".$linha5['cliente_id']."'>".($linha5['cliente_nome']);
}
echo "</SELECT>";

?>
                                                    
   </div>                                                   
												 
												 
												  </div> </div> </div> </div>
								
								 <!-- FIM DADOS PESSOAIS -->
								
								
							
			
			<button class="btn btn-primary"> Salvar </button>
								
			<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
								
			</form>			
								
								</div></div></div>		</div></div>
								
									
					
 

     
      