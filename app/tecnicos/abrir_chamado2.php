<?php 
@session_start();
if(!empty($_SESSION['id'])){
	
}else{
	header("Location: logar.php");	
}

$cmdt = "select * from chamados c 
INNER JOIN clientes cl ON c.chamado_cliente = cl.cliente_id 
INNER JOIN os o ON c.chamado_os = o.os_id 
inner join users u  ON c.chamado_tecnico = u.user_id
where  c.chamado_status = '2' and c.chamado_id = $id    ";
$tarefas = mysqli_query($conn, $cmdt);
$totaltarefas = mysqli_num_rows($tarefas);
$tarefa = mysqli_fetch_array($tarefas);






?>



 <div class="col-12 mb-4">
 <h1><span class="font-weight-light small">Abrir novo chamado </span></h1> <br>


                           

                        <div class="card">
                            <div class="card-body">
                            
                            </div>
                        </div>  </div>

                        <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                               
                                <p class="mb-4"><strong> Informações do chamado </strong>  
                            </p>
                               

<form action="inseriros" method="POST">
       

<label>Técnico</label>

   <select name="tecnico" id="cliente-select"   class="form-control meuselect">
   <option value="">Informe</option>
   <option value="">Não informar</option>
   <?php
   $sqlu = "SELECT * FROM users WHERE user_tipo ='2' ORDER BY user_nome";
   $resultadou = mysqli_query($conn, $sqlu);
   while ($linhau = mysqli_fetch_array($resultadou)) { ?>
      <option value="<?php echo $linhau[user_id] ?>"><?php echo $linhau[user_nome] ?></option>
      <?php } ?>
   </select>

<label>Tipo OS</label>
<select name="tipo" id="cliente-select" required  class="form-control meuselect">
<option value="">Informe</option>

<?php
$sqlt = "SELECT * FROM os_tipos WHERE os_tipo_status ='1' and os_tipo_id <> '2' ORDER BY os_tipo_nome";
$resultadot = mysqli_query($conn, $sqlt);
while ($linhat = mysqli_fetch_array($resultadot)) { ?>
   <option value="<?php echo $linhat[os_tipo_id] ?>"><?php echo $linhat[os_tipo_nome] ?></option>
   <?php } ?>
</select>
<label>Nome do Solicitante</label>
  
  <input class="form-control" name="solicitante" required></textarea>

       <label>Informações Adicionais </label>
  
       <textarea class="form-control" id="story" name="consideracoes" rows="5" cols="33"></textarea>

     </div>
     <input name="cliente" type="hidden" value="<?php echo $id ?>" > 
     <div class="modal-footer">
     <button type="submit" class="btn btn-success">Abrir</button>
     </div>
</form>


                            </div>
                        </div>  </div>


                 

                        
                        <div class="col-12 mb-4 text-center">


                        <?php if($totaleventos >= '1') { ?>
                                <div class="alert alert-primary" role="alert">
                               Em deslocamento
                            </div>

                            <a  href="abrir_chamado2/<?php echo $tarefa[cliente_id] ?>/<?php echo $tarefa[os_status] ?>/<?php echo $evento[id] ?>"> <button class="btn btn-success dropdown-toggle" type="button" >
                                   Iniciar Atendimento
                                </button></a>
<?php } else {  ?>



                                

                                <?php } ?>
                    </div>
                            