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




        <!-- INICIO DADOS contrato -->


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Equipamentos</h4>
                        </div>
                        <div class="col-md-6 d-flex flex-row-reverse">
                           

                        </div>

                        <form method="post" action="inserirequipamentos2">

                            <div class="row gy-3">
                                <div>
                                    <label class="form-label mb-0"></label>
                                    <input name="clientes" type="hidden" class="form-control" id="clientes" value="<?php echo $id ?>">
                                </div>
                            </div>
                            <div id="dataAdd">
                                <div class="add">

                                    <div class="row my-4">
                                        <div class="col-lg-12">

                                            <label class="form-label mb-0">Nome:</label>
                                            <input name="nome" required="required" type="text" class="form-control" id="nome">

                                        </div>

                                        <div class="col-lg-6">

                                            <label class="form-label mb-0">informe a marca</label>
                                           <?php // listando em um box os instrutores

			  echo "<SELECT NAME='marca' SIZE='1' class='form-control' required id='marca'>

<OPTION VALUE='' SELECTED> Informe a marca ";
// Selecionando os dados da tabela em ordem decrescente
$sql = "SELECT * FROM marcas ORDER BY marca_nome";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado = mysqli_query($conn, $sql);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha=mysqli_fetch_array($resultado)) {
echo "<OPTION VALUE='".$linha['marca_id']."'>".($linha['marca_nome']);
}
echo "</SELECT>";

?>
                                        </div>
                                        <div class="col-lg-6">

<div id='resultsd'></div>
</div>
                                        <div class="col-lg-6">

                                            <label class="form-label mb-0">Paradas</label>
                                            <input name="paradas" type="text" class="form-control" id="paradas">

                                        </div>

                                        <div class="col-lg-6">



                                            <label for="porta"></label>
                                            <select name="porta" id="port" required class="form-control">
                                              <option value="">Escolha</option>
                                                <option value="Automática">Automática</option>
                                                <option value="Eixo Vertical">Eixo Vertical</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>





                    </div>

                </div>
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </div>




        <!-- FIM DADOS contrato -->



        <!-- <button class="btn btn-primary"> Cadastrar </button> -->

        </form>


    </div>
</div>
</div>
</div>
</div>


<div id="ok"> </div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
	
	 $(document).ready(function() {
    $('#marca').on('change', function() {
	
		 
		 var dados = jQuery( this ).serialize();
		 
		$.ajax({
			url: 'pages/equipamentos/listar_modelo.php',
			cache: false,
			data: dados,
			type: "POST",  

			success: function(msg){
				
				$("#resultsd").empty();
				$("#resultsd").append(msg);
			}
			
		});
		 
		 return false;
	 });
 
 });



</script>	




