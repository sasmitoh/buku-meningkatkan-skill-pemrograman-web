<!DOCTYPE html>
<html>
<head>
	<title>Get</title>
</head>
<body>
	<form method="POST" action="">
		<input type="text" name="nama"> <br />
		<input type="text" name="email"><br />
		<input type="submit" value="submit" name="submit">
	</form>

	<?php
		echo "nama :" .$_POST['nama']; 
		echo "<br />";
		echo "email : " .$_POST['email'];
	 ?>
</body>
</html>