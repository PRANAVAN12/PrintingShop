<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$categary = mysqli_real_escape_string($mysqli, $_POST['categary']);
	$quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);	
	

	// checking empty fields
	if(empty($name) || empty($quantity) || empty($description)) {	
			
		if(empty($categary)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($quantity)) {
			echo "<font color='red'>email field is empty.</font><br/>";
		}
		
		if(empty($description)) {
			echo "<font color='red'>description field is empty.</font><br/>";
		}
				
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE orders SET categary='$categary',quantity='$quantity',description='$description'  WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM orders WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$categary = $res['categary'];
	$quantity = $res['quantity'];
	$description = $res['description'];
	
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Categary</td>
				<td><input type="text" name="categary" value="<?php echo $categary;?>"></td>
			</tr>
			<tr> 
				<td>quantity</td>
				<td><input type="text" name="quantity" value="<?php echo $quantity;?>"></td>
			</tr>
			<tr> 
				<td>description</td>
				<td><input type="text" name="description" value="<?php echo $description;?>"></td>
			</tr>
			
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
