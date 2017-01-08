<?php
include('conexao.php');

  $id = $_GET['id'];
  $result= "DELETE FROM cambio WHERE id='$id'";
  mysqli_query($conn, $result)
?>

<script type="text/javascript">
  alert("Dado Excluido com Sucesso!!! ");
  window.location.href = "index.php";
</script> 