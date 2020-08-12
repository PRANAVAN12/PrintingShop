<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM orders ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title></title>
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../table/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../table/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../table/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../table/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../table/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../table/css/util.css">
	<link rel="stylesheet" type="text/css" href="../table/css/main.css">
<!--===============================================================================================-->
</head>
<a href="../Admin.php">Home</a>
<body>
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Categary</th>
									<th class="cell100 column2">quantity</th>
									<th class="cell100 column3">description</th>
									
								
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
							<?php 
//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
while($res = mysqli_fetch_array($result)) { 		
  echo "<tr>";
  echo "<td>".$res['categary']."</td>";
  echo "<td>".$res['quantity']."</td>";
  echo "<td>".$res['description']."</td>";	


  		
}
?>

								
							</tbody>
						</table>
					</div>
			
				

</body>
<!--===============================================================================================-->	
<script src="table/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="table/vendor/bootstrap/js/popper.js"></script>
	<script src="table/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="table/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="table/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
</html>
