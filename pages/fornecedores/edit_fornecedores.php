<?php // CODIGO DA SESSION

if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

// PEGANDO DADOS DO fornecedor
$sql = "SELECT * FROM fornecedores WHERE fornecedor_id ='$id' ";
$resultado = mysqli_query($conn, $sql);
$linha=mysqli_fetch_array($resultado);
?> 


 <!-- Sweet Alert css-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- INICIO DADOS INICIAIS -->

<form method="post" action="alterar_fornecedores" id="formeditar"> 
	
	<div id="dvConteudo2" style="display: block">	
		
		
 <div class="row">
	 
	 
	 
	 <!-- INICIO DADOS PESSOAIS -->
     <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Dados Pessoais</h4>
											
											 
											 <div class="row gy-3">
												 
                                               
												 <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">CNPJ/CPF:</label>
                                                       <input name="cpf" type="text" class="form-control" required value="<?php echo $linha['fornecedor_cpf'] ?>" id="cpf2"  >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">IE:</label>
                                                        <input name="ie"  type="text" class="form-control" id="ie" value="<?php echo $linha['fornecedor_ie'] ?>" >
                                                    </div>
                                                </div>
                                               
												 
											
                                                <div class="col-lg-12">
                                                   <div>
                                                     <label class="form-label mb-0">Nome:</label>
                                                       <input name="nome" type="text" class="form-control" id="nome" value="<?php echo $linha['fornecedor_nome'] ?>" >
                                                    </div>
                                                </div>
                                             
												 
												 
												  </div> </div> </div> </div>
								
								 <!-- FIM DADOS PESSOAIS -->
								
								
								 <!-- INICIO DADOS CONTATO -->
								
												 
                                                <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Contato</h4>
											
											 
											 <div class="row gy-3">
												 
                                               
												 <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Telefone Fixo:</label>
                                                       <input name="telefone" type="text" class="form-control" id="telefone" value="<?php echo $linha['fornecedor_telefone'] ?>"  >
                                                    </div>
                                                </div>

                                               
												 
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">E-mail:</label>
                                                        <input name="email"  type="text" class="form-control" id="email" value="<?php echo $linha['fornecedor_email'] ?>" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                  
                                                

												 
													  </div>

									</div>	</div></div></div>	</div></div>
								
							
						
										 
				<!-- FIM DADOS CONTATO -->		
								
								
								
								<!-- Inicio de Endereço -->

 <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Endereço</h4>
											
											 
											 <div class="row gy-3">
												 
                                               
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Cep:</label>
                                                        <input name="cep" type="text" class="form-control" id="cep"  value="<?php echo $linha['fornecedor_cep'] ?>">
                                                    </div>
                                                </div>
												 
												 
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Logradouro:</label>
                                                        <input name="rua" type="text" class="form-control" id="rua"  value="<?php echo $linha['fornecedor_nome'] ?>">
                                                   </div>
                                                </div>
												 
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Número:</label>
                                                        <input name="numero" type="text" class="form-control" id="numero"  value="<?php echo $linha['fornecedor_numero'] ?>" >
                                                    </div>
                                                </div>
												 
												  <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Complemento:</label>
                                                        <input name="complemento" type="text" class="form-control" id="complemento" value="<?php echo $linha['fornecedor_complemento'] ?>" >
                                                    </div>
                                                </div>
												
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Bairro:</label>
                                                        <input name="bairro" type="text" class="form-control" id="bairro" value="<?php echo $linha['fornecedor_bairro'] ?>">
                                                    </div>
                                                </div>
												 
												  <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Estado:</label>
                                                        <input name="estado" type="text" class="form-control" id="estado" value="<?php echo $linha['fornecedor_estado'] ?>" >
                                                    </div>
                                                </div>
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Cidade:</label>
                                                        <input name="cidade" type="text" class="form-control" id="cidade" value="<?php echo $linha['fornecedor_cidade'] ?>" >
                                                    </div>
                                                </div>
												 
												
												 
												 <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Pais:</label>
                                                       <input name="pais" type="text" class="form-control" id="uf" value="Brasil" readonly="readonly" >
                                                    </div>
                                                </div>
												 
												 
												 
												  

												 
													  </div>

									</div>	</div></div></div>	</div></div>
										 
				<!-- Fim de Endereço -->

                                
                
                
                                <!-- Inicio de Observações -->
               
                            <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Observações</h4>
											
											 
											
                                             <textarea name="observacoes" class="form-control" id="observacoes" value="<?php echo $linha['fornecedor_observacoes'] ?>"></textarea>
                                               
												

										</div></div></div>	</div></div>
					<!-- Fim de Observações -->
			
			<button class="btn btn-primary"> Salvar </button>
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">		
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

									
	
    </script>