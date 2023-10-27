<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
// PEGANDO DADOS DO fornecedor
$sql = "SELECT * FROM equipamentos where equipamento_id = $id ";
$resultado = mysqli_query($conn, $sql);
$linha=mysqli_fetch_array($resultado);

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

                        <form method="post" action="salvar_equipamento">

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
                                            <input name="nome" required="required" type="text" class="form-control" id="nome" value="<?php echo $linha['equipamento_nome'] ?>" >

                                        </div>

                                        <div class="col-lg-6">

                                            <label class="form-label mb-0">Informe a marca</label>
<?php 

$sql2a = "SELECT * FROM marcas WHERE marca_id = '$linha[equipamento_id_marca]'";
$resultado2a = mysqli_query($conn, $sql2a);
$linha2a=mysqli_fetch_array($resultado2a);

			  echo "<SELECT NAME='marca' SIZE='1' class='form-control' required id='marca'>

<OPTION VALUE='$linha2a[marca_id]' SELECTED> $linha2a[marca_nome] ";
// Selecionando os dados da tabela em ordem decrescente
$sql2 = "SELECT * FROM marcas ORDER BY marca_nome";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado2 = mysqli_query($conn, $sql2);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha2=mysqli_fetch_array($resultado2)) {
echo "<OPTION VALUE='".$linha2['marca_id']."'>".($linha2['marca_nome']);
}
echo "</SELECT>";

?>

                                        </div>
                                        <div class="col-lg-6">
<div id='div2' style="display:block">
    
  <label class="form-label mb-0">Informe o modelo:</label>

    <?php 

$sql2ab = "SELECT * FROM modelos WHERE modelo_id = '$linha[equipamento_modelo]'";
$resultado2ab = mysqli_query($conn, $sql2ab);
$linha2ab=mysqli_fetch_array($resultado2ab);

echo "<SELECT NAME='modelo' SIZE='1' class='form-control' required id='modelo'>

<OPTION VALUE='$linha2ab[modelo_id]' SELECTED> $linha2ab[modelo_nome] ";
// Selecionando os dados da tabela em ordem decrescente
$sqlmm = "SELECT * FROM modelos where modelo_marca='$linha[equipamento_id_marca]'  ORDER BY modelo_nome";
// Executando $sql e verificando se tudo ocorreu certo.
$resultadomm = mysqli_query($conn, $sqlmm);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linhamm=mysqli_fetch_array($resultadomm)) {
echo "<OPTION VALUE='".$linhamm['modelo_id']."'>".($linhamm['modelo_nome']);
}
echo "</SELECT>";

?>
    
</div>




<div id='resultsd'></div>
</div>
                                        <div class="col-lg-6">

                                            <label class="form-label mb-0">Paradas</label>
                                            <input name="paradas" type="text" class="form-control" id="paradas" value="<?php echo $linha['equipamentos_paradas'] ?>">

                                        </div>

                                        <div class="col-lg-6">



                                            <label for="porta"></label>
                                            <select name="porta" id="port" required class="form-control">
                                              <option value="<?php echo $linha['equipamentos_porta'] ?>"><?php echo $linha['equipamentos_porta'] ?></option>
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
 <input name="id"  type="hidden" value="<?php echo $linha['equipamento_id'] ?>
">
            <input type="submit" value="Salvar" class="btn btn-primary">
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
			url: 'pages/equipamentos/listar_modelo2.php',
			cache: false,
			data: dados,
			type: "POST",  

			success: function(msg){
				
				$("#resultsd").empty();
				$("#resultsd").append(msg);
				document.getElementById("div2").style.display = 'none';

			}
			
		});
		 
		 return false;
	 });
 
 });



</script>	




