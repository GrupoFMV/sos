<?php
include "../../database/conexao.php";
@session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

// PEGANDO DADOS DO USUARIO
$iduser = $_SESSION['user_id'];
$sqluser = "SELECT * FROM users WHERE user_id = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);



$conn->query($insert = "INSERT INTO dependentes (dependente_nome, dependente_sexo,dependente_responsavel_1, dependente_responsavel_2, dependente_quem, dependente_emp, dependente_nascimento, dependente_escola, dependente_tel_escola ) VALUES ('$_POST[nome]','$_POST[sexo]','$_POST[responsavel_1]','$_POST[responsavel_2]','$iduser','1','$_POST[nascimento]','$_POST[escola]','$_POST[tel]')");



	
	//$ultimo_id = $conn->insert_id;


?>

 <style>

.button {     
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;        
}

</style>

<button type="button" class="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="sa-departamento"></button>


                                                <!-- staticBackdrop Modal -->
                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center p-5">
                                                                <lord-icon
                                                                    src="https://cdn.lordicon.com/lupuorrc.json"
                                                                    trigger="loop"
                                                                    colors="primary:#121331,secondary:#08a88a"
                                                                    style="width:120px;height:120px">
                                                                </lord-icon>
                                                                
                                                                <div class="mt-4">
                                                                    <h4 class="mb-3">Tudo certo!</h4>
                                                                    <p class="text-muted mb-4"> Cadastro realizado com sucesso.</p>
                                                                    <div class="hstack gap-2 justify-content-center">
                                                                        
                                                                        <a href="listar_dependentes" class="btn btn-success">Fechar</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<script>

function click(id)
{
    var element = document.getElementById(id);
    if(element.click)
        element.click();
    else if(document.createEvent)
    {
        var eventObj = document.createEvent('MouseEvents');
        eventObj.initEvent('click',true,true);
        element.dispatchEvent(eventObj);
    }
}

click('sa-departamento');

</script>