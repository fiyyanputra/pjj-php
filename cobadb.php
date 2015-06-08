<html>
<body>
	<form action="cobadb.php" method="post">
		Nama Depan: <input type="text" name="firstname"><br>
		Nama Belakang: <input type="text" name="lastname"><br>
		<input type="submit">
	</form>
	
	<?php
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		echo $firstname." ";
		echo $lastname;
		
		$host = $_ENV("OPENSHIFT_MYSQL_DB_HOST");
		$user = $_ENV("OPENSHIFT_MYSQL_DB_USERNAME");
		$pass = $_ENV("OPENSHIFT_MYSQL_DB_PASSWORD");
		$db = $_ENV("OPENSHIFT_GEAR_NAME");
		
		/*$host = "localhost";
		$user = "root";
		$pass = "";
		$db = "mydatabase";*/
		
		$conn = mysqli_connect($host, $user, $pass);
		mysqli_select_db($conn, $db);
		
		$sql="insert into Member (firstname, lastname) values ('.".$firstname."','".$lastname."')";
		mysqli_query($conn, $sql);
		
		if(!mysqli_query($conn, $sql)){
			die("Error: " .mysqli_query($conn));
		}		
		
	?>
</body>
</html>