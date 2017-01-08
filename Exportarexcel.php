<?php
	include("conexao.php");

	$output = '';

	if(isset($_POST["export_excel"]))  
 {  
      $sql = "SELECT * FROM cambio ORDER BY id ";  
      $result = mysqli_query($conn, $sql); 

      if(mysqli_num_rows($result) > 0)  
      {  
           $output .= '  
                <table class="table" bordered="1">  
                     <tr>  
                          <th>Codigo</th>  
                          <th>Data/Hora</th>  
                          <th>Dia da Semana</th>
                          <th>Valor</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'.$row["id"].'</td>  
                          <td>'.$row["dt_cambio"].'</td>  
                          <td>'.$row["dt_dia_semana"].'</td>
                          <td>'.$row["vl_cambio"].'</td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
           header("Content-Type: application/xls");   
           header("Content-Disposition: attachment; filename=download.xls");  
           echo $output;  
      }  
 }  


?>

<script type="text/javascript">
  alert("Dados Exportados com Sucesso!!! ");
  window.location.href = "Index.php";
</script> 