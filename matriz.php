<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="matriz.css">
    <title>Matriz de competências</title>
</head>
<body>

	<div class="button_link"><a href="addSetor.php">Adicionar Setor</a></div>
	<table class="tbl-qa">	
		<thead>
			 <tr>
				<th class="table-header" width="40%"> Setor </th>
				<th class="table-header" width="40%"> Nome </th>
				<th class="table-header" width="40%" colspan="2"> AÇÃO </th>
			  </tr>
		</thead>
		<tbody>		
			<?php
				if ($result->num_rows > 0) {		
					while($row = $result->fetch_assoc()) {
			?>
			<tr class="table-row" id="row-<?php echo $row["id"]; ?>"> 
				<td class="table-row"><?php echo $row["nome"]; ?></td>
                <!--ação-->        
				<td class="table-row" colspan="2"><a href="edit.php?id=<?php echo $row["id"]; ?>" class="link"><img title="Edit" src="icon/edit.png"/></a> <a href="delete.php?id=<?php echo $row["id"]; ?>" class="link"><img name="delete" id="delete" title="Delete" onclick="return confirm('Are you sure you want to delete?')" src="icon/delete.png"/></a></td>
			</tr>
			<?php
					}
				}
			?>
		</tbody>
    </table>
    
</body>
</html>