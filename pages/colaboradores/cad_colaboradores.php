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
                                    <h4 class="mb-sm-0">Colaboradores</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Colaboradores</a></li>
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
                                                    <label for="validationCustom01" class="form-label">Login de acesso:</label>
                                                    <input type="text" name="login" class="form-control" id="login" required>
                                                   
														
                                                     <div id="resultados"></div>
												
                                                   
                                                </div>
									
									  
									<br>
                                      									
										 </form>
									   </div> 
									
                                    </div><!-- end card header -->
									
									
									</div></div></div>


                                    <!-- Tabela -->

	 
	  	<div id="formcadastrouser"></div>
	 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>	 
	<script type="text/javascript">
		
	// DESABILITAR ENTER
		
		$('#login').keypress(function(e) {
    if(e.which == 13) {
      e.preventDefault();
      
    }
});
		
	
		
// AJAX PARA VERIFICAR O LOGIN
$(document).ready(function () {

    $('#login').blur(function() {
        $th = $(this);
          $.ajax({
            url: 'pages/consultas/colaboradores.php',
            type: 'POST',
            data: {login: $th.val()},
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

		
/// EXIBIR FORMULARIO DE CADASTRO
		
 $(document).ready(function() {
 
	 $("#formcad1").submit(function(){
		 
		 

		 var dados = jQuery( this ).serialize();
		 
		$.ajax({
			url: 'pages/colaboradores/formulario.php',
			cache: false,
			data: dados,
			type: "POST",  

			success: function(msg){
				
				$("#formcadastrouser").empty();
				$("#formcadastrouser").append(msg);
				document.getElementById("dvConteudo").style.display = "none";
				

				
				
				
			}
			
		});
		 
		 return false;
	 });
 
 });
													
		
</script>
									