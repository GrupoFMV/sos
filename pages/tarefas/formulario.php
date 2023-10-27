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

<form method="post" action="inserirtarefa" id="formcadastro2a"> 
	
	<div id="dvConteudo2" style="display: block">	
		
		
 <div class="row">
	 
	 
	 

	 
	<!-- INICIO DADOS PESSOAIS -->
    <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Tarefas</h4>
											
											 
											 <div class="row gy-3">
												 
                                               
												 <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Titulo:</label>
                                                       <input name="titulo" type="text" required="required" class="form-control" id="titulo"  >
                                                    </div>
                                                </div>

                                                

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Prazo:</label>
                                                        <input name="prazo"  type="datetime-local" required="required" class="form-control" id="prazo" >
                                                    </div>
                                                </div>
                                                

												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Direcionar Para:</label>
                                                        <?php // listando usuaris 

			  echo "<SELECT NAME='para' SIZE='1' class='form-control'>

<OPTION VALUE='' SELECTED>Escolha ";
// Selecionando os dados da tabela em ordem decrescente
$sql = "SELECT * FROM users WHERE user_status='1' and user_lixeira ='1' ORDER BY user_nome";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado = mysqli_query($conn, $sql);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha=mysqli_fetch_array($resultado)) {
echo "<OPTION VALUE='".$linha['user_id']."'>".utf8_encode($linha['user_nome']);
}
echo "</SELECT>";

?> 
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

                                               

                                              
												
												  </div> </div> </div> </div>
								
								 <!-- FIM DADOS PESSOAIS -->
								     <!-- Inicio de Observações -->
               
                                     <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Observações</h4>
											
											 
											
                                             <textarea name="observacoes" required="required" class="form-control" id="observacoes"></textarea>
                                               
												

										</div></div>
					<!-- Fim de Observações -->
											 
                                                <div class="col-lg-12">
			<button class="btn btn-primary"> Cadastrar </button>
						<input type="hidden" value="<?php   echo 'https://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; ?>" name="url">		
			</form>			
								
								</div></div></div>		</div></div>
								
									
						<div id="ok">  </div>		</div>
							

<!-- JAVASCRIPT -->
								<script type="text/javascript" >


$(document).ready(function () {
   $('input').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;
   });
});

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

									
	/// EXIBIR FORMULARIO DE CADASTRO
		
 $(document).ready(function() {
 
	 $("#formcadastro2").submit(function(){
		 
		 

		 var dados = jQuery( this ).serialize();
		 
		$.ajax({
			url: 'pages/insert/estabelecimento.php',
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
 

     
      