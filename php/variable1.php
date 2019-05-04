<?php
$name ="";
$email = "";
$namaerr = "";
$emailerr = "";

if (isset($_POST['submit'])) {
	$name = trim($_POST['nama']);
	$email =  trim($_POST['email']);

	if (empty($name)) {
		$namaerr = "maaf nilai tidak boleh kosong";
		# code...
	}
	if (empty($email)) {
		$emailerr = "email tidak boleh kosong";
		# code...
	}

	if (!empty($name) && !empty($email)) {
		echo "selamat data terisi";
		# code...
	}
	# code...
}

 ?>
<html>
	<head>
		<title>get</title>
	</head>
<body>
	<form action="variable1.php" method="post">
		<input type="text" name="nama" value="<?php echo $name; ?>">
		<span style="color: red;"><?php echo $namaerr; ?></span>
		<input type="text" name="email" value="<?php echo $email; ?>">
		<span style="color: red"><?php echo $emailerr; ?></span>
		<input type="submit" value="simpan" name="submit">
	</form>
<!--        	 -->



</body>
</html>