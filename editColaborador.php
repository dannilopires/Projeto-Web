<?php
	require_once("db.php");
	if (isset($_POST['submit'])) {		
        $sql = $conn->prepare("UPDATE Colaborador SET nome=?  WHERE id=?");
		$nome = $_POST['nome'];
		$sql->bind_param("si", $nome, $_GET["id"]);	
		if($sql->execute()) {
			$success_message = "Alterado com sucesso";
		} else {
			$error_message = "Error ao alterar";
		}

	}
	$sql = $conn->prepare("SELECT * FROM Setor WHERE id=?");
	$sql->bind_param("i",$_GET["id"]);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {		
		$row = $result->fetch_assoc();
	}
	$conn->close();
?>
<html>
<head>
<link href="matriz.css" rel="stylesheet" type="text/css" />
<style>
.tbl-qa{border-spacing:0px;border-radius:4px;border:#6ab5b9 1px solid;}
</style>
<title>setor edit </title>
</head>
<body>

<?php if(!empty($success_message)) { ?>

<div class="success message"><?php echo $success_message; ?></div>

<?php } if(!empty($error_message)) { ?>

<div class="error message"><?php echo $error_message; ?></div>

<?php } ?>

<form name="frmUser" method="post" action="">
<div class="button_link"><a href="addColaborador.php" > Voltar </a></div>
<table cellpadding="10" cellspacing="0" width="500" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Setor</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row">
			<td><label>Nome</label></td>
			<td><input type="text" name="nome" class="txtField" value="<?php echo $row["nome"]?>"></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit"  name="submit" value="Submit" class="demo-form-submit"></td>
		</tr>
	</tbody>	
</table>
</form>
</body>
</html>