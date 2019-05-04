<?php
// Initialize the session
session_start();
 
//If session variable is not set it will redirect to login page
if(!isset($_SESSION['is_admin']) || empty($_SESSION['is_admin'])){
  header("location: ../login.php");
  exit;
}
error_reporting(E_ALL); 
include_once '../include/koneksi.php';
$title = 'add jurusan';
$image = '<img class="admin" src = "../img/sas.png" alt="">';


$jurusan ='';
$jurusanerr ='';

if (isset($_POST['submit'])) {
	$jurusan = trim($_POST['jurusan']);
	if (empty($jurusan)) {
		$jurusanerr = " * jurusan kosong";
		
	}elseif(is_numeric($jurusan)){
		$jurusanerr = "jurusan harus berupa huruf";
	}elseif (!preg_match("/^[a-zA-Z .]*$/",$jurusan)) {
		$jurusanerr = "jurusan harus berupa huruf";
	}elseif (!empty($jurusan)) {
		$sql = "INSERT INTO jurusan (jurusan) VALUES ('{$jurusan}')";
		$result = mysqli_query($conn, $sql);

		if (!$result) {
			die(mysqli_error($conn));
			# code...
		}
		header('location: daftar-jurusan.php');
	}
}
include_once '../include/header.php';
include_once '../include/nav_admin.php';
 ?>
 <div class="main">
	<h2>Tambah Jurusan</h2>
	<fieldset>
		<legend>Information Jurusan</legend>
	<form action="" method="post" enctype="">
		<div class="input">
 			<label>Jurusan <b style="color: red">*</b></label>
 			<input type="text" name="jurusan" value="<?php echo $jurusan ?>">
 			<span class="error"><?php echo $jurusanerr; ?></span>
 			
 		</div>

	 	<div class="submit">
	 		<input type="submit" name="submit" value="Simpan" class="btn btn-large">
	 	</div>
	</form>
	</fieldset>
 </div>

 <?php
 include_once '../include/sidebar-admin.php';
 include_once '../include/footer.php'; 
  ?>

