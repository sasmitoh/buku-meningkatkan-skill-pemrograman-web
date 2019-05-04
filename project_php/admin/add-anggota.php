 <?php
session_start();
 

if(!isset($_SESSION['is_admin']) || empty($_SESSION['is_admin'])){
  header("location: ../login.php");
  exit;
}
error_reporting(E_ALL); 
include_once '../include/koneksi.php';
$title = 'add anggota';
$image = '<img class="admin" src = "../img/sas.png" alt="">';

$nama = $tanggal = $alamat = $no_hp = $email = $moto = $jurusan = $tgl_daftar ='';
$namaerr = $tanggalerr = $alamaterr = $no_hperr = $emailerr = $motoerr = $jurusanrr = $tgl_daftarerr = '';

if (isset($_POST['submit'])) {
	//validate name
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


	// if ($file_gambar['error'] ==0) {
	// 	$filename = str_replace('', '_', $file_gambar['name']);
	// 	$destination = dirname(__FILE__).'/gambar/'.$filename;
	// 	if
	// 	(move_uploaded_file($file_gambar['tmp_name'], $destination))	
	// 	{
	// 		$gambar ='gambar/'.$filename;;
	// 	}	
	// }

	
	if (!empty($nama) && !empty($jurusan) && !empty($tgl_daftar) && !empty($alamat) && !empty($no_hp) && !empty($email) && !empty($moto)) {
		$sql = 'INSERT INTO anggota (nama, jurusan_id, kelas, tanggal, alamat, no_hp, email, moto, foto) ';
		$sql .= "VALUE ('{$nama}', '{$jurusan}', '{$kelas}', '{$tgl_daftar}', '{$alamat}', '{$no_hp}', '{$email}' , '{$moto}' , '{$gambar}')";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			die(mysqli_error($conn));
		}
		header('location: index.php');
	}
	
}

include_once '../include/header.php';
include_once '../include/nav_admin.php';

?>

 <div class="main">
	<h2>Tambah Anggota</h2>
	<fieldset>
	<legend>Information Anggota</legend>
	<form action="add-anggota.php" method="post" enctype="multipart/form-data">
		<div class="input">
 			<label> Nama <b style="color: red">*</b></label>
 			<input type="text" name="nama"  placeholder="---- nama ------" value="<?php echo $nama; ?>">
 			<span class="error"><?php echo $namaerr; ?></span>
 		</div>
 		<div class="input">
 			<label> Jurusan <b style="color: red">*</b></label>
 			<select name="jurusan" value="<?php echo $jurusan; ?>" >
 				<option >---pilih jurusan---</option>
 				<?php
					include_once '../include/koneksi.php';
					$query ='SELECT * FROM jurusan';
            		$hasil = mysqli_query($conn, $query);
            			while ($qtabel = mysqli_fetch_array($hasil))
	            			{
	                			echo '<option value="'.$qtabel['id_jurusan'].'">'.$qtabel['jurusan'].'</option>';               
	            			} 
						
				?>
				<span class="error"><?php echo $jurusanrr; ?></span>
			</select>
 		</div>
 		<div class="input">
 			<label>Kelas</label>
 			<select name="kelas" id="">
 				<option >--- Pilih Kelas ----</option>
 				<option value="Reguler">Reguler</option>
 				<option value="Non Reguler">Non Reguler</option>
 			</select>
 		</div>
 		<div class="input">
 			<label>Tanggal Daftar <b style="color: red">*</b></label>
 			<input type="text" name="ttb" id="datepicker" value="<?php echo $tgl_daftar; ?>">
 			<span class="error"><?php echo $tgl_daftarerr; ?></span>
 		</div>
 		<div class="input">
 			<label>Alamat <b style="color: red">*</b></label>
 			<textarea name="alamat" id="" cols="10" rows="5" value="<?php echo $alamat; ?>"></textarea>
 			<span class="error"><?php echo $alamaterr; ?></span>
 		</div>
 		<div class="input">
 			<label> No. HP <b style="color: red">*</b></label>
 			<input type="text" name="no_hp"  placeholder="---- +6281282463431 ------" value="<?php echo $no_hp; ?>" >
 			<span class="error"><?php echo $no_hperr; ?></span>
 		</div>
 		<div class="input">
 			<label> email <b style="color: red">*</b></label>
 			<input type="text" name="email"  placeholder="---- eample@ngodingstudy.com ------" value="<?php echo $email; ?>">
 			<span class="error"><?php echo $emailerr; ?></span>
 		</div>
 		<div class="input">
 			<label>Description <b style="color: red">*</b></label>
 			<textarea name="moto" id="" cols="10" rows="5" value="<?php echo $moto; ?>"></textarea>
 			<span class="error"><?php echo $motoerr; ?></span>
 		</div>
 		<div class="input">
 			<label> File Gambar</label>
 			<input type="file" name="file_gambar">
 		</div>

	 	<div class="submit">
	 		<input type="submit" name="submit" value="Simpan" class="btn btn-large" />
	 	</div>
	</form>
 	</fieldset>
 </div>

 <?php 
  	include_once '../include/sidebar-admin.php';
 	include_once '../include/footer.php'; 
  ?>