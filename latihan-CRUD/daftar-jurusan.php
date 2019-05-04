<?php 
error_reporting(E_ALL); 
$title = 'List jurusan';
$image = '<img class="admin" src = "img/nsc-logo.png" alt="">';
include_once 'include/koneksi.php';

$sql = 'SELECT * FROM jurusan';
$result = mysqli_query($conn, $sql);



include_once 'include/header.php';
include_once 'include/nav.php';

 ?>
 <div class="main">
 	<?php
 		echo '<a href="add-jurusan.php" class="btn btn-large"><img src="img/add.png"  style = "width: 30px;" />Jurusan</a>'; 
 	 ?>
 	<table>
 		<tr>
 			<th>No.</th>
 			<th>Jurusan</th>
 			<th>Aksi</th>
 		</tr>
 		<?php while($row = mysqli_fetch_array($result)): ?>
 			<!-- <?php $no++ ?> -->
 			<tr>
 				<td><?php echo $no; ?></td>
 				<td><?php echo $row['jurusan'];?></td>
 				<td>
				<a class="btn btn-default" href="edit-jurusan.php?id=<?php echo $row['id_jurusan'];?>">Edit</a>
				<a class="btn btn-alert" onclick="return confirm('Yakin akan menghapus data?');" href="delete-jurusan.php?id=<?php echo $row['id_jurusan'];?>">Delete</a>
			</td>
 			</tr>
 		<?php endwhile; ?>
 	</table>
 	

 </div>

 <?php
 include_once 'include/sidebar.php';
 include_once 'include/footer.php'; 
  ?>