<?php // CODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

?>
<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Clientes</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Clientes</a></li>
                                            <li class="breadcrumb-item active">Cadastrar</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

	<div id="dvConteudo" >

 <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
									 <div class="card-body">
                                    <form id="formcad1" action="#" method="post" >
                                                <div class="col-md-12">
                                                    <label for="validationCustom01" class="form-label">Informe o CNPJ/CPF:</label>
                                                    <input type="text" name="cpf" class="form-control" id="cpfcnpj">
                                                   
														
                                                     <div id="resultados"></div>
												
                                                   
                                                </div>
                                                
									
									 <br>
                                      									
										        
                                    </form>
									 <form id="formcad12" action="#" method="post" > <button class="btn btn-ligth" onclick="ValidaCPF();" id="formcad12" type="submit" >Ou cadastrar sem CNPJ/CPF</button> 
										 
										  
										 
										 </form>
									   </div> 
									
                                    </div><!-- end card header -->
									
									
									</div></div>


</div>
	 
	  	<div id="formcadastro"></div>
        <div id="formcadastro2"></div>
	 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>	 
	<script type="text/javascript">
		
	// DESABILITAR ENTER
		
		$('#cpfcnpj').keypress(function(e) {
    if(e.which == 13) {
      e.preventDefault();
      
    }
});
		
		
		
	// MASCARA CNPJ/CPF
    $("#cpfcnpj").keydown(function(){
    try {
        $("#cpfcnpj").unmask();
    } catch (e) {}

    var tamanho = $("#cpfcnpj").val().length;

    if(tamanho < 11){
        $("#cpfcnpj").mask("999.999.999-99");
    } else {
        $("#cpfcnpj").mask("99.999.999/9999-99");
    }

    // ajustando foco
    var elem = this;
    setTimeout(function(){
        // mudo a posição do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    // reaplico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});
	



		
// AJAX PARA VERIFICAR O CNPJ/CPF
$(document).ready(function () {

    $('#cpfcnpj').blur(function() {
        $th = $(this);
          $.ajax({
            url: 'pages/consultas/identificacao.php',
            type: 'POST',
            data: {cpf: $th.val()},
            beforeSend: function(){
                $("#resultados").html("Carregando...");
            },
            success: function(data){
                $("#resultados").html(data);
            },
            error: function(){
                $("#resultados").html("Ouve um erro ao enviar sua URL");
            }
         });//ajax       
    });
});

		
		function ValidaCPF(){	
	var cpf=document.getElementById("cpf").value; 
	var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;	 
	if (cpfValido.test(cpf) == true)	{ 
	console.log("CPF Válido");	
	} else	{	 
	console.log("CPF inVálido");	
 exit;
	}
    }
  function fMasc(objeto,mascara) {
obj=objeto
masc=mascara
setTimeout("fMascEx()",1)
}

  function fMascEx() {
obj.value=masc(obj.value)
}

   function mCPF(cpf){
cpf=cpf.replace(/\D/g,"")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
return cpf
}	
		
/// EXIBIR FORMULARIO DE CADASTRO
		
 $(document).ready(function() {
 
	 $("#formcad1").submit(function(){
		 
		 

		 var dados = jQuery( this ).serialize();
		 
		$.ajax({
			url: 'pages/clientes/formulario.php',
			cache: false,
			data: dados,
			type: "POST",  

			success: function(msg){
				
				$("#formcadastro").empty();
				$("#formcadastro").append(msg);
				document.getElementById("dvConteudo").style.display = "none";
				

				
				
				
			}
			
		});
		 
		 return false;
	 });
 
 });
													
	/// EXIBIR FORMULARIO DE CADASTRO
		
 $(document).ready(function() {
 
	 $("#formcad12	").submit(function(){
		 
		 

		 var dados = jQuery( this ).serialize();
		 
		$.ajax({
			url: 'pages/clientes/formulario2.php',
			cache: false,
			data: dados,
			type: "POST",  

			success: function(msg){
				
				$("#formcadastro2").empty();
				$("#formcadastro2").append(msg);
				document.getElementById("dvConteudo").style.display = "none";
				

				
				
				
			}
			
		});
		 
		 return false;
	 });
 
 });
		
		
</script>
