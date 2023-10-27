<?php // CODIGO DA SESSION

if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
?> 


 <!-- Sweet Alert css-->
<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>



<!-- INICIO DADOS INICIAIS -->

<form method="post" action="inserirdependente" id="formcadastro2"> 
	
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
                                                       <input name="nome" type="text" class="form-control" id="nome" >
                                                    </div>
                                                </div>





                                             <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Escola da Criança:</label>
                                                        <input name="escola"  type="text" class="form-control" id="escola" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Telefone da Escola :</label>
                                                        <input name="tel"  type="text" class="form-control" id="tel" >
                                                    </div>
                                                </div>
							
											
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Data de Nascimento:</label>
                                                        <input name="nascimento"  type="date" required="required" class="form-control" id="nascimento" >
                                                    </div>
                                                </div>
											 

                                          
												 
                                               
                                                <div class="col-lg-6">
                                                    <div>
                                                      <label class="form-label mb-0">Sexo:</label> <BR>
                                                        <input name="sexo" type="radio" required="required" id="radio" value="M">
                                                      <label for="sexo">Masculino </label>
                                                      <input name="sexo" type="radio" required="required"  id="radio2" value="F">
                                                        <label for="sexo2">Feminino </label>
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
								
								
							
			
			<button class="btn btn-primary"> Cadastrar </button>
								
			</form>			
								
								</div></div></div>		</div></div>
								
									
						<div id="ok">  </div>		
							

<!-- JAVASCRIPT -->
								<script type="text/javascript" >
			
 $(document).ready(function() {
 
	 $("#formcadastro2").submit(function(){
		 
		 

		 var dados = jQuery( this ).serialize();
		 
		$.ajax({
			url: 'pages/insert/dependentes.php',
			cache: false,
			data: dados,
			type: "POST",  

			success: function(msg){
				
				$("#ok").empty();
				$("#ok").append(msg);
				document.getElementById("dvConteudo2").style.display = "none";
				

				
				
				
			}
			
		});
		 
		 return false;
	 });
 
 });
							
    </script>
 

     
      