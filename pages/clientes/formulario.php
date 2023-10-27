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

<form method="post" action="inserircliente" id="formcadastro2a"> 
	
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
                                                       <input name="cpf" type="text" class="form-control" id="cpf2"  value="<?php echo $_POST['cpf'] ?>" readonly="readonly">
                                                    </div>
                                                </div>

                                              
                                                <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Razão Social:</label>
                                                       <input name="razao" type="text" class="form-control" id="razao" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Nome Fantasia:</label>
                                                       <input name="fantasia" type="text" class="form-control" id="fantasia" >
                                                    </div>

                                                </div>
												
                                                <div class="col-lg-6">
                                                    <div>
                                                      <label class="form-label mb-0">RETÉM ISS:</label> <BR>
                                                        <input name="retem" type="radio" required="required" id="radio" value="Sim">
                                                      <label for="retem">SIM </label>
                                                      <input name="retem" type="radio" required="required"  id="radio2" value="Não">
                                                        <label for="retem2">NÂO </label>
                                                    </div>
                                                </div>
												 
												 
												 
												  </div> </div> </div> </div>
								
								 <!-- FIM DADOS PESSOAIS -->
								 <!-- INICIO DADOS contrato -->
								
												 
                                 <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Contrato</h4>
											
											 
											 <div class="row gy-3">
												 
                                               
												 <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Data de Início:</label>
                                                       <input name="inicio" type="date" class="form-control" id="inicio"  >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Data de Término:</label>
                                                       <input name="termino" type="date" class="form-control" id="termino"  >
                                                    </div>
                                                </div>
												 
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Valor:</label>
                                                        <input name="valor"  type="text" class="form-control" id="valor" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Reajuste:IPCA OU IGMP – DI </label>
                                                        <input name="reajuste"  type="text" class="form-control" id="valor" >
                                                    </div>
                                                </div>
												
                                                

												 
													  </div>

									</div>	</div></div>
								
							
						
										 
				<!-- FIM DADOS contrato -->		
								
								
								 <!-- INICIO DADOS CONTATO -->
								
												 
                                                <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Contatos</h4>
											
											 
											 <div class="row gy-3">
												 
                                               
												 <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Sindico:</label>
                                                       <input name="sindico" type="text" class="form-control" id="sindico"  >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Telefone:</label>
                                                       <input name="telefone" type="text" class="form-control" id="tel"  >
                                                    </div>
                                                </div>
												 
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">E-mail:</label>
                                                        <input name="email"  type="text" class="form-control" id="email" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Mandato:</label>
                                                        <input name="mandato"  type="text" class="form-control" id="mandato" >
                                                    </div>
                                                </div>
												
                                                

												 
													  </div>

									</div>	</div></div>
								
							
						
										 
				<!-- FIM DADOS CONTATO -->	

                 <!-- INICIO DADOS ADMINISTRADORA -->
								
												 
                 <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>OUTROS CONTATOS (NÃO OBRIGATÓRIO)</h4>
											
											 
											 <div class="row gy-3">
												 
                                               
												 <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Administradora:</label>
                                                       <input name="administradora" type="text" class="form-control" id="administradora"  >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Nome:</label>
                                                       <input name="nome_outroscontato" type="text" class="form-control" id="nome_outroscontato"  >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Responsável:</label>
                                                        <input name="responsavel"  type="text" class="form-control" id="responsavel" >
                                                    </div>
                                                </div>
												 
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">E-mail:</label>
                                                        <input name="email_outroscontato"  type="text" class="form-control" id="email_outroscontato" >
                                                    </div>
                                                </div>

                                               
												
                                                

												 
													  </div>

									</div>	</div></div>
								
							
						
										 
				<!-- FIM DADOS ADMINISTRADORA -->		
								
								
								
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
                                                        <input name="cep" type="text" class="form-control" id="cep"  value="">
                                                    </div>
                                                </div>
												 
												 
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Logradouro:</label>
                                                        <input name="rua" type="text" class="form-control" id="rua"  value="">
                                                   </div>
                                                </div>
												 
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Número:</label>
                                                        <input name="numero" type="text" class="form-control" id="numero" >
                                                    </div>
                                                </div>
												 
												  <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Complemento:</label>
                                                        <input name="complemento" type="text" class="form-control" id="complemento" >
                                                    </div>
                                                </div>
												
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Bairro:</label>
                                                        <input name="bairro" type="text" class="form-control" id="bairro" >
                                                    </div>
                                                </div>
												 
												  <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Estado:</label>
                                                        <input name="uf" type="text" class="form-control" id="uf" >
                                                    </div>
                                                </div>
												 <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Cidade:</label>
                                                        <input name="cidade" type="text" class="form-control" id="cidade" >
                                                    </div>
                                                </div>
												 
												
												 
												 <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Pais:</label>
                                                       <input name="pais" type="text" class="form-control" id="uf" value="Brasil" readonly="readonly" >
                                                    </div>
                                                </div>
												 
												 
												 
												  

												 
													  </div>

									</div>	</div></div>
										 
				<!-- Fim de Endereço -->

                                
                
                
                                <!-- Inicio de Observações -->
               
                            <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Observações</h4>
											
											 
											
                                             <textarea name="observacoes" class="form-control" id="observacoes"></textarea>
                                               
												

										</div></div>
					<!-- Fim de Observações -->
			
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
 <Script>
$(document).ready(function(){
  var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
  };

  $('#tel').mask(SPMaskBehavior, spOptions);
});
</Script>

     
      