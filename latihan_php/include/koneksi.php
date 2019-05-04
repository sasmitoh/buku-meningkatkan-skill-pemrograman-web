<?php 
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'web';

$conn = mysqli_connect($server,$user,$pass,$db);
if ($conn==false) {
	echo "koneksi server gagal";
	die();
}


 ?>