<?php

include "../../database/conexao.php";

 ?>
<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
	<?php
	
	

    $nome = $_POST['nome'];
    $modelo = $_POST['modelo'];
    $paradas = $_POST['paradas'];
    $porta = $_POST['porta'];
    $marca = $_POST['marca'];

   $conn->query($insert = "INSERT INTO equipamentos(equipamento_id_cliente,equipamento_nome,equipamento_modelo,equipamentos_paradas,equipamentos_porta, equipamento_id_marca) VALUES ('$_POST[clientes]', '$nome', '$modelo','$paradas','$porta','$marca')");;
    
     
    

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                      

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
   $(document).ready(function() {

        $("#teste").click(function() {
            
                     document.getElementById("dvConteudo2").style.display = "block";
                     
                       document.getElementById("dvConteudo2a").style.display = "none";
                     

document.getElementById('nome').value=''; // Limpa o campo
document.getElementById('marca').value=''; // Limpa o campo
document.getElementById('paradas').value=''; // Limpa o campo
document.getElementById('porta').value=''; // Limpa o campo
document.getElementById('modelo').value=''; // Limpa o campo


});
});
</script>


                        <div id="dvConteudo2a" style="display: block">
                            
  <h5>Equipamento cadastrado com sucesso, o que deseja fazer agora?</h5>


 <a href="formulario_equipamentos2/<?php echo $_POST[clientes] ?>"> <button id="teste"  class="btn btn-primary"> <i class=" bx bx-plus-circle
"></i>
 Adicionar mais equipamentos ao cliente </button> </a>
 
 <a href="formulario_anotacoes2/<?php echo $_POST[clientes] ?>"> <button  class="btn btn-warning"> Ir para próxima etapa <i class=" bx bx-right-arrow-circle
" aria-hidden="true"></i>
</button></a>

</div>
  
  </div>