<?php // CODIGO DA SESSION

if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
?> 
 <!-- Sweet Alert css-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- INICIO DADOS INICIAIS -->

<form method="post" action="inserircoluna" id="formcadastro2a"> 
	
	<div id="dvConteudo2" style="display: block">	
		
		
 <div class="row">
	 
	 
	 

	 
	<!-- INICIO DADOS PESSOAIS -->
    <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Adicionar colunas a setores</h4>
											
											 
											 <div class="row gy-3">
												 
                                               
												 <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Titulo:</label>
                                                       <input name="titulo" type="text" required="required" class="form-control" id="titulo"  >
                                                    </div>
                                                </div>

                                                

                                                

												 
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Setor:</label><br>
                                                        <?php // listando usuaris 

			  echo "<SELECT NAME='setor' SIZE='1' class='form-control' required>

<OPTION VALUE='' SELECTED>Escolha ";
// Selecionando os dados da tabela em ordem decrescente
$sql = "SELECT * FROM setores_tarefas WHERE setor_terefa_status='1' and setor_terefa_lixeira ='1'  ORDER BY setor_tarefa_nome";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado = mysqli_query($conn, $sql);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha=mysqli_fetch_array($resultado)) {
echo "<OPTION VALUE='".$linha['setor_terefa_id']."'>".($linha['setor_tarefa_nome']);
}
echo "</SELECT>";

?>
                                                    </div>
                                                </div>

                                               

                                              
												
												  </div> </div> <Br>
								
								 <!-- FIM DADOS PESSOAIS -->
								     <!-- Inicio de Observações -->
               
                                     
					<!-- Fim de Observações -->
											 
                                                <div class="col-lg-12">
			<button class="btn btn-primary"> Cadastrar </button>
						<input type="hidden" value="<?php   echo 'https://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; ?>" name="url">		
			</form>			
								
								</div></div></div>		</div></div>
								
						sasasa