<?php
	$nama="";
	$username="";
	$pass = "";
	$namaErr = "";
	$usernameErr = "";
	$passErr = "";
	
	// Cek form sudah di klik submit/belum
	if(isset($_POST['submit'])){
		$nama = trim($_POST['nama']);
		$username = trim($_POST['username']);
		$pass = trim($_POST['pass']);
		
		// Cek input kosong
		if(empty($nama)){
			$namaErr = "Nama masih kosong.<br>";
		}
		if(empty($username)){
			$usernameErr = "Username masih kosong.<br>";
		}
		if(empty($pass)){
			$passErr = "Password masih kosong.<br>";
		}
		
		// Cek semua input sudah diisi apa belum
		if( !empty($nama) and !empty($username) and !empty($pass) ){
			echo "Selamat semua input sudah diisi.<br>";
		}
	}
?>
 
<h3>From Register</h3>
 
<form action="validasi-form.php" method="post">
	Nama : <input type="text" name="nama" value="<?php echo $nama; ?>"><br>
		<span style="color: red" ><?php echo $namaErr; ?></span> 
	Username : <input type="text" name="username" value="<?php echo $username; ?>"><br>
		<span style="color: red" ><?php echo $usernameErr; ?></span>	
	Password : <input type="password" name="pass" value="<?php echo $pass; ?>"><br>
		<span style="color: red" ><?php echo $passErr; ?></span> 	
	<input type="submit" name="submit" value="Register">
</form>