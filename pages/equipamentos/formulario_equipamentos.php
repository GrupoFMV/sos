<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
?> 
 <!-- Sweet Alert css-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- INICIO DADOS INICIAIS -->

<form method="post" action="inserirequipamentos" id="formcadastro2a"> 
	
	<div id="dvConteudo2" style="display: block">	
		
		
 <div class="row">
	 
	 
	 
	
								 <!-- INICIO DADOS contrato -->
								
												 
                                 <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Equipamentos</h4>
											
											 
											 <div class="row gy-3">
												 
                                               
                                             <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Clientes:</label>
                                                     <?php // listando em um box os instrutores

echo "<SELECT NAME='clientes' SIZE='1' class='form-control' required>

<OPTION VALUE='' SELECTED> Informe o Cliente ";
// Selecionando os dados da tabela em ordem decrescente
$sql = "SELECT * FROM clientes where '1'  ORDER BY cliente_razao";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado = mysqli_query($conn, $sql);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha=mysqli_fetch_array($resultado)) {
echo "<OPTION VALUE='".$linha['cliente_id']."'>".($linha['cliente_razao']);
}
echo "</SELECT>";

?>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Nome:</label>
                                                       <input name="nome" type="text" class="form-control" id="termino"  >
                                                    </div>
                                                </div>
												 
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Modelo:</label>
                                                        <input name="modelo"  type="text" class="form-control" id="valor" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Paradas</label>
                                                        <input name="paradas"  type="text" class="form-control" id="reajuste" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Marca</label>
                                                        <?php // listando em um box os instrutores

echo "<SELECT NAME='marca' SIZE='1' class='form-control' required>

<OPTION VALUE='' SELECTED> Informe a Marca ";
// Selecionando os dados da tabela em ordem decrescente
$sql = "SELECT * FROM marcas where '1'  ORDER BY marca_nome";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado = mysqli_query($conn, $sql);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha=mysqli_fetch_array($resultado)) {
echo "<OPTION VALUE='".$linha['marca_id']."'>".($linha['marca_nome']);
}
echo "</SELECT>";

?>
                                                    </div>
                                                </div>
												
                                                 <div class="col-lg-6">
                                                    <div>
                                                      <label class="form-label mb-0">Porta:</label> <BR>
                                                        <input name="porta" type="radio" required="required" id="radio" value="eixovertical">
                                                      <label for="porta">Eixo Vertical </label>
                                                      <input name="porta" type="radio" required="required"  id="radio2" value="automatica">
                                                        <label for="porta2">Automatica </label>
                                                    </div>
                                                </div>

                                              

												 
													  </div>
                                                      

									</div>	</div></div>
								
							
						
										 
				<!-- FIM DADOS contrato -->		
								
								
			
			<button class="btn btn-primary"> Cadastrar </button>
								
			</form>			
								
								</div></div></div>		</div></div>
								
									
						<div id="ok">  </div>		
							

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
 

     
      