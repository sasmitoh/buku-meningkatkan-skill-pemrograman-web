<?php

// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

$title = 'Home';
$image = '<img src = "img/nsc-logo.png" alt="">';
include_once 'include/koneksi.php';

$id = $_GET['id'];

$sql = ("SELECT anggota.id_anggota, anggota.nama, jurusan.jurusan, anggota.tanggal, anggota.kelas, 
				anggota.alamat, anggota.no_hp, anggota.email, anggota.moto, anggota.foto 
                FROM anggota
                JOIN jurusan ON jurusan.id_jurusan = anggota.jurusan_id
                WHERE id_anggota = '{$id}'");
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia');

include_once 'include/header.php';
include_once 'include/nav.php';
?>
<div class="full">
	<div class="cetak">
		<a href="data.php?id=<?php echo $id;?>" class="btn btn-alert">Print</a>
	
 	 <table>
 	 	<tr>
 	 		<th colspan="3">Data Anggota</th>
 	 	</tr>
 	 	<?php while($row = mysqli_fetch_array($result)): ?>
 	 	<tr>
 	 		<td rowspan="9"><?php echo "<img src=\"{$row['foto']}\" />";?></td>
 	 	</tr>
			
				<tr>
					<td><b>Nama</b></td>
					<td><?php echo $row['nama'];?></td>
	 	 		</tr>
	 	 		<tr>
					<td><b>Jurusan</b></td>
					<td><?php echo $row['jurusan'];?></td>
	 	 		</tr>
	 	 		<tr>
					<td><b>Tgl Daftar</b></td>
					<td><?php echo $row['tanggal'];?></td>
	 	 		</tr>
	 	 		<tr>
					<td><b>Kelas</b></td>
					<td><?php echo $row['kelas'];?></td>
	 	 		</tr>
	 	 		<tr>
					<td><b>Alamat</b></td>
					<td><?php echo $row['alamat'];?></td>
	 	 		</tr>
	 	 		<tr>
					<td><b>No. Telp</b></td>
					<td><?php echo $row['no_hp'];?></td>
	 	 		</tr>
	 	 		<tr>
					<td><b>Email</b></td>
					<td><?php echo $row['email'];?></td>
	 	 		</tr>
	 	 		<tr>
					<td><b>Description</b></td>
					<td><?php echo $row['moto'];?></td>
	 	 		</tr>

			<?php endwhile; ?>
 	 </table>
	</div>
</div>

<?php
include_once 'include/footer.php'; 
 ?>


