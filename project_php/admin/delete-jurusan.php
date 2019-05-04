<?php 
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['is_admin']) || empty($_SESSION['is_admin'])){
  header("location: ../login.php");
  exit;
}

include_once '../include/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM jurusan WHERE id_jurusan = '{$id}'";

$result = mysqli_query($conn, $sql);

header('location: daftar-jurusan.php');
 ?>