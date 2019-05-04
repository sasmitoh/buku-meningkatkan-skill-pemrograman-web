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
$title = 'edit anggota';
$image = '<img class="admin" src = "../img/sas.png" alt="">';

$nama = $tanggal = $alamat = $no_hp = $email = $moto = $jurusan = $tgl_daftar ='';
$namaerr = $tanggalerr = $alamaterr = $no_hperr = $emailerr = $motoerr = $jurusanrr = $tgl_daftarerr = '';


if (isset($_POST['submit'])) {
	 $id = $_POST['id'];
	// $nama = $_POST['nama'];
	// $jurusan = $_POST['jurusan'];
	// $kelas = $_POST['kelas'];
	// $tanggal = $_POST['ttb'];
	// $alamat = $_POST['alamat'];
	// $no_hp = $_POST['no_hp'];
	// $email = $_POST['email'];
	// $moto = $_POST['moto'];
	// $file_gambar = $_FILES['file_gambar'];
	// $gambar = null;

	// function ubahTanggal($tanggal){
	//  	$pisah = explode('/',$tanggal);
	//  	$array = array($pisah[2],$pisah[0],$pisah[1]);
	//  	$satukan = implode('-',$array);
	//  	return $satukan;
	// }
 
	// $tgl_daftar = ubahTanggal($tanggal);

	// if ($file_gambar['error'] == 0)
	// {
	// 	$filename = str_replace(' ', '_', $file_gambar['name']);
	// 	$destination = dirname( FILE ) . './img/' . $filename;
	// 	if (move_uploaded_file($file_gambar['tmp_name'], $destination))
	// 	{	
	// 		$gambar = 'img/' . $filename;
	// 	}	
	// }

		if (empty(trim($_POST['nama']))) {
		$namaerr = "tidak boleh kosong";
	}elseif (is_numeric(trim($_POST['nama']))) {
		$namaerr = "Menggunakan huruf";
	}else{
		$nama = trim($_POST['nama']);
	}

	//validate jurusan
	if (empty(trim($_POST['jurusan']))) {
		$jurusanrr = "Pilih Jurusan";
	}else{
		$jurusan = trim($_POST['jurusan']);
	}	
	
	$kelas = $_POST['kelas'];
	$tanggal = trim($_POST['ttb']);
	// $alamat = $_POST['alamat'];
	//$no_hp = $_POST['no_hp'];
	// $email = $_POST['email'];
	// $moto = $_POST['moto'];
	

	// function merubah format date 'd/m/Y'
	function ubahTanggal($tanggal){
	 	$pisah = explode('/',$tanggal);
	 	$array = array($pisah[2],$pisah[0],$pisah[1]);
	 	$satukan = implode('-',$array);
	 	return $satukan;
	}
	
	// validate tanggal
	if (empty(trim($tanggal))) {
		$tgl_daftarerr = "tanggal kosong"; 
	}else{
		$tgl_daftar = ubahTanggal($tanggal);
	}

	// validate alamat
	if (empty(trim($_POST['alamat']))) {
		$alamaterr = "tidakboleh kosong";
	}else{
		$alamat = trim($_POST['alamat']);
	}

	//validasi no hp
	if (empty(trim($_POST['no_hp']))) {
		$no_hperr = "tidak boleh kosong";
	}elseif (!is_numeric(trim($_POST['no_hp']))) {
		$no_hperr = "menggunakan angka";
	}elseif(strlen(trim($_POST['no_hp'])) !=12){
        $no_hperr = "No 12 angka";
    }elseif (!preg_match("/^[a-zA-Z .]*$/",$jurusan)) {
		$jurusanerr = "jurusan harus berupa huruf";
	}else{
		$no_hp = trim($_POST['no_hp']);
	}

	// validate email
	if(empty(trim($_POST['email']))){
        $emailerr = "tidak boleh kosong";   
	} elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
		$emailerr = "tidak valid";
    } else{
        $email = trim($_POST['email']);
    }

    // validate alamat
	if (empty(trim($_POST['moto']))) {
		$motoerr = "tidak boleh kosong";
	}else{
		$moto = trim($_POST['moto']);
	}

	//gambar
	$file_gambar = $_FILES['file_gambar'];
	$gambar = null;
	if ($file_gambar['error'] == 0)
	{
		$filename = str_replace(' ', '_', $file_gambar['name']);
		$destination = dirname( FILE ) . './img/' . $filename;
		if (move_uploaded_file($file_gambar['tmp_name'], $destination))
		{	
			$gambar = 'img/' . $filename;

		}	
	}


	$sql = 'UPDATE anggota SET ';
	$sql .= "nama = '{$nama}', jurusan_id = '{$jurusan}', kelas = '{$kelas}',	";					
	$sql .= "tanggal = '{$tgl_daftar}', alamat = '{$alamat}', no_hp = '{$no_hp}', ";
	$sql .= "email = '{$email}', moto = '{$moto}' ";
	echo $sql;
	if (!empty($gambar))
		$sql .= ", foto = '{$gambar}' ";
	$sql .= "WHERE id_anggota = '{$id}'";
	
	$result = mysqli_query($conn, $sql);
	if (!$result) die(mysqli_error($conn));
	header('location: index.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM anggota WHERE id_anggota = '{$id} '";
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia');
$data = mysqli_fetch_array($result);


function is_select($var, $val) {
	if ($var == $val) return 'selected="selected"';
	return false;
}

include_once '../include/header.php';
include_once '../include/nav_admin.php';

?>

 <div class="main">
	<h2>Edit Anggota</h2>
	<form action="edit-anggota.php" method="post" enctype="multipart/form-data">
		<div class="input">
 			<label> Nama</label>
 			<input type="text" name="nama"  value="<?php echo $data['nama'];?>" >
 		</div>
 		<div class="input">
 			<label> Jurusan</label>
 			<select name="jurusan" >
 				<?php
					include_once '../include/koneksi.php';
					$query ='SELECT * FROM jurusan';
            		$hasil = mysqli_query($conn, $query);
            			while ($qtabel = mysqli_fetch_array($hasil))
	            			{
	                			echo '<option value="'.$qtabel['id_jurusan'].'">'.$qtabel['jurusan'].'</option>';               
	            			} 
						
				?>
			</select>
 		</div>
 		<div class="input">
 			<label> Kelas</label>
 			<select name="kelas" id="">
 				<option value="Reguler" <?php echo is_select('Reguler', $data['kelas']);?>>Reguler</option>
 				<option value="Non Reguler" <?php echo is_select('Non Reguler', $data['kelas']);?>>Non Reguler</option>
 			</select>
 		</div>
 		<div class="input">
 			<label> Tanggal Daftar</label>
 			<input type="text" name="ttb" id="datepicker" value="<?php $date = date_create($data['tanggal']);
			echo date_format($date,"m/d/Y");?>">
 		</div>
 		<div class="input">
 			<label>Alamat</label>
 			<textarea name="alamat" id="" cols="10" rows="5" ><?php echo $data['alamat'];?></textarea>
 			
 		</div>
 		<div class="input">
 			<label> No. HP</label>
 			<input type="text" name="no_hp"  value="<?php echo $data['no_hp'];?>">
 			<span class="error"><?php echo $no_hperr; ?></span>
 		</div>
 		<div class="input">
 			<label> email</label>
 			<input type="text" name="email"  value="<?php echo $data['email'];?>">
 		</div>
 		<div class="input">
 			<label>Description</label>
 			<textarea name="moto" id="" cols="10" rows="5" ><?php echo $data['moto'];?></textarea>
 		</div>
 		<div class="input">
 			<label> File Gambar</label>
 		<input type="file" name="file_gambar" value="<?php echo $data['foto'];?>">
 		</div>

	 	<div class="submit">
	 		<input type="hidden" name="id" value="<?php echo $data['id_anggota'];?>" />
	 		<input type="submit" name="submit" value="Edit" class="btn btn-large" />
	 	</div>
	</form>
 	
 </div>

 <?php 
  	include_once '../include/sidebar-admin.php';
 	include_once '../include/footer.php'; 
  ?>