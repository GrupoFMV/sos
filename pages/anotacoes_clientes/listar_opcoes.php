<?php // CODIGO DA SESSION
include "../../database/conexao.php";

@session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

// PEGANDO DADOS DO CLIENTE
$sql = "SELECT * FROM equipamentos e left join modelos m on e.equipamento_modelo = m.modelo_id WHERE e.equipamento_id = '$_POST[equipamentos]' ";
$resultado = mysqli_query($conn, $sql);
$linha=mysqli_fetch_array($resultado);

?> 
 <?php if ($linha[modelo_oleo] == 'SIM') { ?>
  <div class="row">
                                    <div class="col-lg-12 gy-3">
                                        <h6>TROCA DE ÓLEO</h6>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label mb-0">Data:</label>
                                        <input name="data_troca" required type="date" class="form-control" id="data_troca">
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label mb-0">Tempo de Troca:</label>
                                        <select name="troca_mes" required class="form-control" id="troca_mes">
                                            <option value="12">12 MESES</option>
                                            <option value="24">24 MESES</option>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                                
                             <?php if ($linha[modelo_bateria] == 'SIM') { ?>   
                                
                                 <div class="row ">
                                    <div class="col-lg-12 gy-3">
                                        <h6>TROCA DE BATERIA</h6>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label mb-0">Data:</label>
                                        <input name="data_bateria" required type="date" class="form-control" id="data_bateria">
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label mb-0">Modelo da Bateria:</label>
                                        <select name="bateria" required class="form-control" id="bateria">
                                            <option value="12V 7A">12V 7A</option>
                                            <option value="12V 12A">12V 12A</option>
                                        </select>
                                    </div>

                                </div>
                                <hr>
                            </div>

                        </div>

                    </div>

<?php } ?>
                                