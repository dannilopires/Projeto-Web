<?php
	if (isset($_POST['submit'])) {
		require_once("db.php");
		$sql = $conn->prepare("INSERT INTO Colaborador (nome) VALUES (?)");  
		$nome = $_POST['nome'];
		$sql->bind_param("s", $nome); 
		if($sql->execute()) {
			$success_message = "Added Successfully";
		} else {
			$error_message = "Problem in Adding New Record";
		}
		$sql->close();   
		$conn->close();
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="matriz.css">
    <style>
    .tbl-qa{border-spacing:0px;border-radius:4px;border:#6ab5b9 1px solid;}
    </style>
    <title>Matriz de Competências</title>
</head>
<body>

<?php if(!empty($success_message)) { ?>
<div class="success message"><?php echo $success_message; ?></div>
<?php } if(!empty($error_message)) { ?>
<div class="error message"><?php echo $error_message; ?></div>
<?php } ?>

<form name="frmUser" method="post" action="">
<div class="button_link"><a href="index.php"> Voltar </a></div>
<table cellpadding="10" cellspacing="0" width="500" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Adicionar novo colaborador</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row">
			<td><label>Nome</label></td>
			<td><input type="text" name="nome" class="txtField"></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit" name="submit" value="Cadastrar" class="demo-form-submit"></td>
		</tr>
	</tbody>
</table>
</form>

<br> <br>

<?php 
require_once("db.php");
$sql = "SELECT * FROM Colaborador";
$result = $conn->query($sql);	
$conn->close();		
?>

<table class="tbl-qa">	
		<thead>
			 <tr>
				<th class="table-header" width="40%"> Nome do Colaborador </th>
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
				<td class="table-row" colspan="2"><a href="editColaborador.php?id=<?php echo $row["id"]; ?>" class="link"><img title="Edit" src="icon/edit.png"/></a> <a href="deleteColaborador.php?id=<?php echo $row["id"]; ?>" class="link"><img name="delete" id="delete" title="Delete" onclick="return confirm('Are you sure you want to delete?')" src="icon/delete.png"/></a></td>
			</tr>
			<?php
                    }
				}
			?>
        </tbody>
</table>

</body>
</html>
