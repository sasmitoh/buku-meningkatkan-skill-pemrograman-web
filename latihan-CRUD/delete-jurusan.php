<?php 
include_once 'include/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM jurusan WHERE id_jurusan = '{$id}'";

$result = mysqli_query($conn, $sql);

header('location: daftar-jurusan.php');
 ?>