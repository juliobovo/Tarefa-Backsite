<?php
	include ("conexao.php");

	$id = $_GET['id'];

	$vl_cambio=$_POST['txt_valorCambio'];

	$SQL= "UPDATE cambio SET vl_cambio ='$vl_cambio' WHERE id='$id' ";
	mysqli_query($conn, $SQL);


?>

<script type="text/javascript">
  alert("Valor De Cambio Alterado com Sucesso!");
  window.location.href = "Index.php";
</script>