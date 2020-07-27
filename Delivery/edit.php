<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$UserName = mysqli_real_escape_string($mysqli, $_POST['UserName']);
	$mobile = mysqli_real_escape_string($mysqli, $_POST['mobile']);
	$Address = mysqli_real_escape_string($mysqli, $_POST['Address']);	
	

	// checking empty fields
	if(empty($UserName) || empty($mobile) || empty($Address)) {	
			
		if(empty($UserName)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($mobile)) {
			echo "<font color='red'>email field is empty.</font><br/>";
		}
		
		if(empty($Address)) {
			echo "<font color='red'>description field is empty.</font><br/>";
		}
				
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE delivery SET UserName='$UserName',mobile='$mobile',Address='$Address'  WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM delivery WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$UserName = $res['UserName'];
	$mobile = $res['mobile'];
	$Address = $res['Address'];
	
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
				<td>UserName</td>
				<td><input type="text" name="UserName" value="<?php echo $UserName;?>"></td>
			</tr>
			<tr> 
				<td>mobile</td>
				<td><input type="text" name="mobile" value="<?php echo $mobile;?>"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="Address" value="<?php echo $Address;?>"></td>
			</tr>
			
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
