<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['is_admin']) || empty($_SESSION['is_admin'])){
  header("location: ../login.php");
  exit;
}

error_reporting(E_ALL); 
include_once '../include/koneksi.php';
$title = 'Edit Jurusan';
$image = '<img class="admin" src = "../img/sas.png" alt="">';


$jurusan ='';
$jurusanerr ='';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$jurusan = trim($_POST['jurusan']);
	if (empty($jurusan)) {
		$jurusanerr = " * jurusan kosong";
	}elseif(is_numeric($jurusan)){
		$jurusanerr = "jurusan harus berupa huruf";
	}elseif (!preg_match("/^[a-zA-Z .]*$/",$jurusan)) {
		$jurusanerr = "jurusan harus berupa huruf";
	}elseif (!empty($jurusan)) {
		$sql = 'UPDATE jurusan SET ';					
		$sql .= "jurusan = '{$jurusan}' ";
		$sql .= "WHERE id_jurusan = '{$id}'";
		$result = mysqli_query($conn, $sql);

		if (!$result) {
			die(mysqli_error($conn));
			# code...
		}
		header('location:daftar-jurusan.php');
	}
}

// if (isset($_POST['submit'])) {
// 	$id = $_POST['id'];
// 	$jurusan = $_POST['jurusan'];


// 	$sql = 'UPDATE jurusan SET ';					
// 	$sql .= "jurusan = '{$jurusan}' ";
// 	$sql .= "WHERE id_jurusan = '{$id}'";
// 	$result = mysqli_query($conn, $sql);

// 		if (!$result) {
// 			die(mysqli_error($conn));
// 			# code...
// 		}
// 	// header('location:daftar-jurusan.php');
// }

$id = $_GET['id'];
$sql = "SELECT * FROM jurusan WHERE id_jurusan = '{$id} '";
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia');
$data = mysqli_fetch_array($result);

function is_select($var, $val) {
	if ($var == $val) return 'selected="selected"';
	return false;
}

// $id = $_GET['id'];
// $sql = "SELECT * FROM jurusan WHERE id_jurusan = '{$id} '";
// $result = mysqli_query($conn, $sql);
// if (!$result) die('Error: Data tidak tersedia');
// $data = mysqli_fetch_array($result);

// function is_select($var, $val) {
// 	if ($var == $val) return 'selected="selected"';
// 	return false;
// }

include_once '../include/header.php';
include_once '../include/nav_admin.php';

 ?>

  <div class="main">
	<h2>Edit Jurusan</h2>
	<form action="edit-jurusan.php" method="post" enctype="multipart/form-data">
		<div class="input">
 			<label>Jurusan <b style="color: red">*</b></label>
 			<input type="text" name="jurusan" value="<?php echo $data['jurusan'];?>" >
 			<span class="error"><?php echo $jurusanerr; ?></span>
 		</div>

	 	<div class="submit">
	 		<input type="hidden" name="id" value="<?php echo $data['id_jurusan'];?>">
	 		<input type="submit" name="submit" value="Edit" class="btn btn-large">
	 	</div>
	</form>
 	
 </div>

 <?php
 include_once '../include/sidebar-admin.php';
 include_once '../include/footer.php'; 
  ?>