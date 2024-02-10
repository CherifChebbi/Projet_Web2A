
<!DOCTYPE html>
<html>
<head>
	<title>Search Bar using PHP</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">
	
</form>

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=projet_web ",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM reclamation WHERE id = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>ID</th>
				<th>DATE</th>
                <th>SUBJECT</th>
                <th>MESSAGE</th>
			</tr>
			<tr>
				<td><?php echo $row->ID; ?></td>
				<td><?php echo $row->DAEE;?></td>
                <td><?php echo $row->SUBJECTT; ?></td>
				<td><?php echo $row->MESSAGEE;?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "RECLAMATION Does not exist";
		}


}

?>
