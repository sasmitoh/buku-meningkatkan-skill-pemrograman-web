<?php 

include_once 'include/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM anggota WHERE id_anggota = '{$id}'";

$result = mysqli_query($conn, $sql);

header('location: index.php');
 ?>