<?php
error_reporting(E_ALL); 
include_once 'include/koneksi.php';
$title = 'add jurusan';
$image = '<img class="admin" src = "img/nsc-logo.png" alt="">';


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
include_once 'include/header.php';
include_once 'include/nav.php';
 ?>
 <div class="main">
	<h2>Tambah Jurusan</h2>
	<fieldset>
		<legend>Information Jurusan</legend>
	<form action="add-jurusan.php" method="post" enctype="multipart/form-data">
		<div class="input">
 			<label>Jurusan <b style="color: red">*</b></label>
 			<input type="text" name="jurusan" value="<?php echo $jurusan; ?>">
 			<span class="error"><?php echo $jurusanerr; ?></span>
 		</div>

	 	<div class="submit">
	 		<input type="submit" name="submit" value="Simpan" class="btn btn-large">
	 	</div>
	</form>
	</fieldset>
 </div>

 <?php
 include_once 'include/sidebar.php';
 include_once 'include/footer.php'; 
  ?>

