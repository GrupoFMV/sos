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


	
	<div id="dvConteudo2" style="display: block">	
		
		
 <div class="row">
	 
	 
	 
	
 <!-- INICIO DADOS Modelos -->
								
												 
                                 
       <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Modelos</h4>
                        </div>
                        <div class="col-md-6 d-flex flex-row-reverse">
                            <button class="btn btn-danger " id="deleteRow">Deletar</button>
                            <button class="btn btn-success mx-3" id="addRow">Adicionar</button>

                        </div>
                        <form method="post" action="inserir_modelo" id="formcadastro2a"> 
                                <div>
                                    <label class="form-label mb-0"></label>
                                    <input name="clientes" type="hidden" class="form-control" id="clientes" value="<?php echo $id ?>">
                                </div>
                        <div id="dataAdd">
                                <div class="add">

                                    <div class="row my-4">
                                        <div class="col-lg-6">

                                            <label class="form-label mb-0">Nome:</label>
                                            <input name="nome[]" required="required" type="text" class="form-control" id="nome">

                                        </div>

</div>
</div>
										 
<!-- FIM DADOS contrato -->		
								
								
<button class="btn btn-primary"> Cadastrar </button>
								
</form>			
								
</div></div></div>		</div></div>
								
									
<div id="ok">  </div>		


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#addRow").click(function() {

            var len = $('#dataAdd .add .row').length + 1;

            //if(len>1)

            $("#dataAdd .add:last").append(' <div class="row my-4">' +
                '<div class="col-md-6">' +
                ' <label>Nome:</label>' +
                ' <input name="nome[]" type="text" class="form-control" id="nome' + len + '"  >' +
                ' </div>' +
                '</div></div>');

        });
    });
    // '<input name="porta[' + len + ']" type="radio"  id="radio' + len + '" value="eixovertical"><label for="porta' + len + '">Eixo Vertical </label>' +
    // '<input name="porta[' + len + ']" type="radio"  id="radio' + len + '" value="automatica"><label for="porta' + len + '">Automatica </label>' +

    $("#deleteRow").click(function() {
        var len = $('#dataAdd .add .row').length;
        if (len > 1) {
            $("#dataAdd .add .row").last().remove();
        } else {
            alert('Not able to Delete');
        }
    });
</script>
                        
							

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
 

     
      