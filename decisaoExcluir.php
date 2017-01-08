<?php
	
  $id = $_GET['id'];
?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
  decisao = confirm("Tem certexa que deseja excluir esse imóvel?");
  if (decisao){
    window.location.href = "Excluir.php?id=<?php echo $id;?>";
  } else {
    window.location.href = "index.php";
  }
</SCRIPT>