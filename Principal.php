<table id="table1" style="width:100%">
	<thead>
		<th class="title-table">
			<td>Data</td>
			<td>Hora</td>
			<td>Valor</td>
			<td>Dia</td>
		</th>
	</thead>
	<tbody>
		<!-- <tr class="iten-table">
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
		</tr> -->
	</tbody>
</table>



<script type="text/javascript">
	$('#table > tbody').remove();
	$('#table').append('<tbody></tbody>');

	for ... {
		var data;
		var hora;
		var valor;
		var diaSemana;

		var html = ('<tr><td></td>'+data+'<td></td>'+hora+'<td></td>'+valor+'<td></td><td>'+diaSemana+'</td></tr>')

		$('#table > tbody').append(html);
	}
</script>