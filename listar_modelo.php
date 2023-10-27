<?php

                                           

echo "<SELECT NAME='modelo[]' SIZE='1' class='form-control' id='nome' required>



<OPTION VALUE='' SELECTED> Modelo ";





$sql5 = "SELECT * FROM marcas ORDER BY marca_nome";

$resultado5 = mysqli_query($conn, $sql5);

while ($linha5=mysqli_fetch_array($resultado5)) {

echo "<OPTION VALUE='".$linha5['marca_id']."'>".($linha5['marca_nome']);

}

echo "</SELECT>";



?>