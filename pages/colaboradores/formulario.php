<?php // CODIGO DA SESSION
include_once "../../database/conexao.php";
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

$sql = "SELECT * FROM tipo_colaborador";
$result = mysqli_query($conn, $sql);

?> 
 <!-- Sweet Alert css-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- INICIO DADOS INICIAIS -->

<form method="post" action="inserircolaboradores" id="formcadastro2a"> 
	
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
                                                       <input name="nome" required type="text" class="form-control" id="nome"  >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                  <div>
                                                    <label class="form-label mb-0">Login:</label>
                                                      <input name="login" type="text" required class="form-control" id="login" value="<?php echo $_POST['login'] ?>" readonly="readonly" >
                                                    </div>

                                                </div>

                                                <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Tipo:</label>
                                                       <select name="tipo" type="text" class="form-control" id="tipo" >
                                                          <option value=""></option>
                                                          <?php while($linha = mysqli_fetch_assoc($result)){ ?>
                                                          <option value="<?php echo $linha['id_tipo_colaborador']; ?>"><?php echo $linha['nome_tipo_colaborador']; ?></option>
                                                          <?php } ?>
                                                       </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">E-mail:</label>
                                                       <input name="email" type="email" class="form-control" id="email" >
                                                    </div>
                                                </div>

                                                
                                                <div class="col-lg-6">
                                                <div>
                                                    <label class="form-label mb-0">Senha:</label>
                                                    <input name="senha" required type="text" class="form-control" id="senha" >
                                                </div>
                                                </div>  
                                                <div class="col-lg-6">
                                                <div>
                                                    <label class="form-label mb-0">Telefone:</label>
                                                   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<input name="telefone" id="tel" type="text" class=" form-control" placeholder="(xx)xxxxx-xxxx"  />
                                                </div>
                                                </div>
												
												

                                             
												 <div class="col-lg-12"> <button class="btn btn-primary"> Cadastrar </button> </div>
												 
												  </div> </div> </div> </div>
								
								 <!-- FIM DADOS PESSOAIS -->

                                
								
			</form>			
								
								</div></div></div>		</div></div>
								
								
									
						<div id="ok">  </div>		
							

<!-- JAVASCRIPT -->
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>
      