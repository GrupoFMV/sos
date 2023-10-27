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
                  <br> <strong>Observações</strong><br>
                  <?php echo $orcamento[orcamento_observacoes] ?> <br><br>
                  <strong>Intens </strong><br>

                  <table class="table table-borderless align-middle mb-0">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th scope="col">Item</th>
                                                                        <th scope="col">Estoque</th>
                                                                        <th scope="col">Fornecedores</th>
                                                                        <th scope="col">Valor Compra</th>
                                                                        <th scope="col">Valor Venda</th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
<?php
$sqlor = "SELECT * FROM produtos_orcamentos po inner join produtos p on po.produto_or_produto = p.produto_id
where po.produto_or_os = $id   ";
$exeor = mysqli_query($conn, $sqlor);
while($orcamento = mysqli_fetch_array($exeor)) {
$valorvenda += $orcamento[produto_valor_venda];
$valorcompra += $orcamento[produto_valor_compra];

  ?>
 <tr>
 <td><?php echo $orcamento[produto_nome] ?></td>
 <td><?php echo $orcamento[produto_estoque] ?></td>
 <td></td>
 <td>R$<?php echo $orcamento[produto_valor_compra] ?></td>
 <td>R$<?php echo $orcamento[produto_valor_venda] ?></td>

 </tr>
  <?php } ?>

</table>
                  <br>
Valor total do compra: R$ <?php echo $valorcompra ?><br>
Valor total do venda: R$ <?php echo $valorvenda ?>
            
              <br> <br><br>
<div class="row"> 
<div class="col"> 
<button class="btn btn-info"> 
  Enviar Orçamento para Cliente
</button> 
</div>

<div class="col"> 
<button class="btn btn-success"> 
  Autorizar Execução
</button> 
</div>

<div class="col"> 
<button class="btn btn-primary"> 
 Adicionar Itens avulsos
</button> 



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