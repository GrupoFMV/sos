<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
  $_SESSION['msg'] = "Área restrita";
  header("Location: ../../login.php");
}

$sqlor = "SELECT * FROM orcamentos o
inner join clientes cl on o.orcamento_cliente = cl.cliente_id
inner join equipamentos eq on o.orcamento_equipamento = eq.equipamento_id
inner join marcas mc on eq.equipamento_id_marca = mc.marca_id
inner join modelos md on eq.equipamento_modelo = md.modelo_id


where o.orcamento_os = $id   ";
$exeor = mysqli_query($conn, $sqlor);
$orcamento = mysqli_fetch_array($exeor);

?>
<!-- Sweet Alert css-->
<link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<!-- INICIO DADOS INICIAIS -->
<style>
  .container {
    max-width: 450px;
  }

  .imgGallery img {
    padding: 8px;
    max-width: 100px;
  }
</style>




<div class="row">



  <!--Inicio Formulario-->
  <div class="row">

    <h4 class="mb-sm-0">Técnica / OS / ORÇAMENTOS</h4>
    <div class="row gy-3">
      <div class="card">
        <div class="card-body">

          <div class="row">

            <h4>Detalhes</h4>


            <div class="row gy-3">

              <div class="col-lg-12">
                <div>

                  <strong> Cliente:</strong> <?php echo $orcamento[cliente_fantasia] ?> <br>
                  <strong> Equipamento:</strong> <?php echo $orcamento[equipamento_nome] ?> <strong> Marca: </strong> <?php echo $orcamento[marca_nome] ?> <strong> Modelo: </strong> <?php echo $orcamento[modelo_nome] ?>
                  <strong> Porta: </strong> <?php echo $orcamento[equipamentos_porta] ?> <strong> Paradas: </strong> <?php echo $orcamento[equipamentos_paradas] ?> <br>

                  <strong>Produtos</strong><br>



                  <?php
                  $pattern = '/(?<=\[)(\d+(,\d+)*)(?=\])/';
                  preg_match_all($pattern, $orcamento['orcamento_produtos'], $produtos);
                  $produtos = explode(",", $produtos[0][0]);
                  $lista_fornecedores = [];

                  for ($i = 0; $i < count($produtos); $i++) {
                    $sql_produto = "SELECT * FROM produtos WHERE produto_id = $produtos[$i]";
                    $exe = mysqli_query($conn, $sql_produto);
                    $produto = mysqli_fetch_array($exe);
                    echo $produto['produto_nome'] . "<br>";
                    echo "Valor Compra R$". $produto['produto_valor_compra'] . "<br>";
                    echo "Valor Venda R$". $produto['produto_valor_venda'] . "<br>";
                    preg_match_all($pattern, $produto['produto_fornecedores'], $fornecedores);
                    if (count($fornecedores) > 0) {
                      $fornecedores = explode(",", $fornecedores[0][0]);
                      for ($j = 0; $j < count($fornecedores); $j++) {
                        array_push($lista_fornecedores, $fornecedores[$j]);
                      }
                    }
                   
                  }
                  //print_r($lista_fornecedores);


                  ?>

                  <br>


                </div>
              </div>




            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>










</form>

</div>
</div>
</div>
</div>
</div>