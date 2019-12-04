<?php
	if (isset($_POST['submit'])) {
		require_once("db.php");
		$sql = $conn->prepare("INSERT INTO Setor (nome) VALUES (?)");  
		$nome = $_POST['nome'];
		$sql->bind_param("s", $nome); 
		if($sql->execute()) {
			$success_message = "Cadastrado com sucesso";
		} else {
			$error_message = "Erro ao cadastrar";
		}
		$sql->close();   
		$conn->close();
	} 
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="matriz.css">
<style>
.tbl-qa{border-spacing:0px;border-radius:4px;border:#6ab5b9 1px solid;}
</style>
  <title>Adicionar novo setor</title> 	
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
			<th colspan="2" class="table-header">Adicionar novo setor</th>
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
$sql = "SELECT * FROM Setor";
$result = $conn->query($sql);	
$conn->close();		
?>

<table class="tbl-qa">	
		<thead>
			 <tr>
				<th class="table-header" width="40%"> Nome do setor </th>
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
				<td class="table-row" colspan="2"><a href="editSetor.php?id=<?php echo $row["id"]; ?>" class="link"><img title="Edit" src="icon/edit.png"/></a> <a href="deleteSetor.php?id=<?php echo $row["id"]; ?>" class="link"><img name="delete" id="delete" title="Delete" onclick="return confirm('Tem certeza de que deseja deletar?')" src="icon/delete.png"/></a></td>
			</tr>
			<?php
                    }
				}
			?>
        </tbody>
</table>

</body>
</html>
