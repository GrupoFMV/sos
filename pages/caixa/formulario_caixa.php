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

<form method="post" action="inserircaixa" id="formcadastro2a"> 
	
	<div id="dvConteudo2" style="display: block">	
		
		
 <div class="row">
	 
	 
	 

	 
	 <!-- INICIO DADOS PESSOAIS -->
     <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                               
										 <div class="row">
											 <h4>Caixa</h4>
                                             <div class="row gy-3">
                                             <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Valor:</label>
                                                       <input name="valor" type="text" class="form-control" id="valor" >
                                                    </div>
                                                </div>





                                             <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Data:</label>
                                                        <input name="data"  type="date" class="form-control" id="data" >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Procedimento :</label>
                                                        <input name="procedimento"  type="text" class="form-control" id="procedimento" >
                                                    </div>
                                                </div>
							
											
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Forma de Pagamento:</label>
                                                        <input name="pagamento"  type="text" required="required" class="form-control" id="pagamnto" >
                                                    </div>
                                                </div>

                                                
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Cliente:</label>
                                                        <input name="cliente"  type="text" required="required" class="form-control" id="cliente" >
                                                    </div>
                                                </div>

                                                
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Colaboradores:</label>
                                                        <input name="colaboradores"  type="text" required="required" class="form-control" id="colaboradores" >
                                                    </div>
                                                </div>
											 
                                                <div class="col-lg-6">
			<button class="btn btn-primary"> Cadastrar </button>
								
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
 

     
      