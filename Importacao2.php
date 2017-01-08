<?php
include("conexao.php");

function ObterCambio($url)
{
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 
    $output = curl_exec($ch);
 
    curl_close($ch);
    
	return $output;
}
       // --------------------------------------------
$string_cambio = ObterCambio("http://www.backsite.com.br/vagaphp");
$array_cambio = json_decode($string_cambio, true);

foreach ($array_cambio as $key => $cambio) {

	$data_cambio = date("Y-m-d H:i:s", strtotime(str_replace('/','-',$key)));  	
	$valor_cambio = $cambio[0];
	$dia_semana = $cambio[1];

	//echo $data_cambio . " // " . $valor_cambio . " // " . $dia_semana . "<br />";

	$SQL = "INSERT INTO cambio (id , dt_cambio, vl_cambio, dt_dia_semana) VALUES( ' ' ,'$data_cambio', $valor_cambio, $dia_semana)";
      
	mysqli_query($conn, $SQL);
	
}
?>

<script type="text/javascript">
  alert("Dados Importados com Sucesso!!! ");
  window.location.href = "Index.php";
</script> 