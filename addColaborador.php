<?php
	if (isset($_POST['submit'])) {
		require_once("db.php");
		$sql = $conn->prepare("INSERT INTO colaborador (nome) VALUES (?)");  
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
<div class="button_link"><a href="index.php"> Back to List </a></div>
<table cellpadding="10" cellspacing="0" width="500" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Adicionar novo colaborador</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row">
			<td><label>Name</label></td>
			<td><input type="text" name="nome" class="txtField"></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit" name="submit" value="Submit" class="demo-form-submit"></td>
		</tr>
	</tbody>
</table>
</form>
</body>
</html>
