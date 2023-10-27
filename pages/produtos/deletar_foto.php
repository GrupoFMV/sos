<?php // CODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

@$conn->query("DELETE FROM fotos  where foto_id = '$id' ");

?>

<script>

    window.location.href = "add_foto_produto/<?php echo $id2 ?>";

</script>