<?php 
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

error_reporting(E_ALL); 
$title = 'List jurusan';
$image = '<img src = "img/nsc-logo.png" alt="">';
include_once 'include/koneksi.php';

$sql = 'SELECT * FROM jurusan';
$result = mysqli_query($conn, $sql);



include_once 'include/header.php';
include_once 'include/nav.php';

 ?>
 <div class="main">
 	<h2>List Jurusan</h2>
 	<table>
 		<tr>
 			<th>No.</th>
 			<th>Jurusan</th>
 		</tr>
 		<?php while($row = mysqli_fetch_array($result)): ?>
 			<!-- <?php $no++ ?> -->
 			<tr>
 				<td><?php echo $no; ?></td>
 				<td><?php echo $row['jurusan'];?>
				 
				 </td>
 			</tr>
 		<?php endwhile; ?>
 	</table>	
 </div>

 <?php
 include_once 'include/sidebar.php';
 include_once 'include/footer.php'; 
  ?>