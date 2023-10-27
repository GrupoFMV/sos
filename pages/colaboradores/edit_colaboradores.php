<?php // CODIGO DA SESSION

if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

// PEGANDO DADOS DO CLIENTE
$sql = "SELECT * FROM users WHERE user_id  ='$id' and user_emp='$user[user_emp]'  ORDER BY user_nome";
$resultado = mysqli_query($conn, $sql);
$linha=mysqli_fetch_array($resultado);

$sql_colaborador = "SELECT * FROM tipo_colaborador";
$result_colaborador = mysqli_query($conn, $sql_colaborador);
?> 


 <!-- Sweet Alert css-->

<!-- INICIO DADOS INICIAIS -->

<form method="post" action="alterar_colaboradores" id="formcadastro2a"> 
	
	
		
		
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
                                                       <input name="nome" required type="text" class="form-control" id="nome" value="<?php echo $linha['user_nome'] ?>"  >
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                  <div>
                                                    <label class="form-label mb-0">Login:</label>
                                                      <input name="login" type="text" required class="form-control" id="login" value="<?php echo $linha['user_login'] ?>"   >
                                                    </div>

                                                </div>

                                                <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">Tipo:</label>
                                                       <select name="tipo" type="text" class="form-control" id="tipo" >
                                                        <option value="<?php echo $linha['user_tipo'] ?>"></option>
                                                        <?php while($linha_colaborador = mysqli_fetch_assoc($result_colaborador)){ ?>
                                                        <option value="<?php echo $linha_colaborador['id_tipo_colaborador']; ?>"><?php echo $linha_colaborador['nome_tipo_colaborador']; ?></option>
                                                        <?php } ?>
                                                       </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                   <div>
                                                     <label class="form-label mb-0">E-mail:</label>
                                                       <input name="email" type="email" class="form-control" id="email"   value="<?php echo $linha['user_email'] ?>" >
                                                    </div>
                                                </div>

                                                
                                                <div class="col-lg-6">
                                                <div>
                                                    <label class="form-label mb-0">Senha:</label>
                                                    <input name="senha" type="text" class="form-control" id="senha" placeholder="Se não desejar alterar deixe em branco" >
                                                </div>
                                                </div>  
                                                <div class="col-lg-6">
                                                <div>
                                                    <label class="form-label mb-0">Telefone:</label>
                                                  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<input name="telefone" type="text" class=" form-control" id="tel" value="<?php echo $linha['user_telefone'] ?>"  />		
													
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
													

                                                </div>
                                                </div>
												
												

                                             
												 
												  </div> </div> </div> </div>
								
								 <!-- FIM DADOS PESSOAIS -->

                                
								
				
			
			<button class="btn btn-primary"> Salvar </button>
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">		
			</form>			
								
								</div></div></div>		</div></div>
								
									
							
							
	
      