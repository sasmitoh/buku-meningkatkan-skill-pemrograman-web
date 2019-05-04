<?php 
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

$q="";
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = " WHERE nama LIKE '{$q}%'";
}

$title = 'List Anggota';
$image = '<img src = "img/nsc-logo.png" alt="">';
include_once 'include/koneksi.php';
$no=0;

$sql = ("SELECT anggota.id_anggota, anggota.nama, jurusan.jurusan, anggota.tanggal, anggota.kelas, 
				anggota.alamat, anggota.no_hp, anggota.email, anggota.moto, anggota.foto 
                FROM anggota
                JOIN jurusan ON jurusan.id_jurusan = anggota.jurusan_id");
$sql_count = "SELECT COUNT(*) FROM anggota";
if (isset($sql_where)) {
    $sql .= $sql_where;
    $sql_count .= $sql_where;
}
$result_count = mysqli_query($conn, $sql_count);
$count = 0;
if ($result_count) {
    $r_data = mysqli_fetch_row($result_count);
    $count = $r_data[0];
}
$per_page = 5;
$num_page = ceil($count / $per_page);
$limit = $per_page;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $offset = ($page - 1) * $per_page;
} else {
    $offset = 0;
    $page = 1;
}
$sql .= " LIMIT {$offset}, {$limit}";
$result = mysqli_query($conn, $sql);
include_once('include/header.php');
include_once 'include/nav.php';
?>
<div class="full">
	<h2>List Anggota</h2>
	<form action="" method="get">
		<label for="q">Cari data : </label>
			<input type="text" id="q" name="q" class="input-q" >
			<input type="submit" name="submit" value="Cari" class="btn btn-primary">
	</form>

    <?php
        if ($result):
    ?>
 	 <table>
 	 	<tr>
 	 		<th>No.</th>
 	 		<th>Gambar</th>
			<th>Nama</th>
			<th>Jurusan</th>
			<th>Tanggal Daftar</th>
			<th>Kelas</th>
			<th>Alamat</th>
			<th>No. Hp</th>
			<th>Email</th>
			<th>Description</th>
			
 	 	</tr>
 	 	
 	 	<?php while($row = mysqli_fetch_array($result)): ?>
 	 	<?php $no++ ?>
 	 		<tr>
 	 			<td><?php echo $no; ?></td>
 	 			<td><?php echo "<img src=\"{$row['foto']}\" />";?></td>
 	 			<td><?php echo $row['nama'];?></td>
 	 			<td><?php echo $row['jurusan'];?></td>
 	 			<td><?php echo $row['tanggal'];?></td>
 	 			<td><?php echo $row['kelas'];?></td>
 	 			<td><?php echo $row['alamat'];?></td>
 	 			<td><?php echo $row['no_hp'];?></td>
 	 			<td><?php echo $row['email'];?></td>
 	 			<td><?php echo $row['moto'];?></td>
 	 		</tr>
 	 	<?php endwhile; ?>
 	 </table>
	<ul class="pagination">
            <li><a href="?page=<?php if ($page > 1){
                $pagep = $page-1;
            }else{
                $pagep= $page;
            } 
            echo $pagep; ?>">&laquo;</a></li>
            <?php for ($i=1; $i <= $num_page; $i++) { 
                $link = "?page={$i}";
                if (!empty($q)) $link .= "&q={$q}";
                    $class = ($page == $i ? 'active' : '');
                    echo "<li><a class=\"{$class}\" href=\"{$link}\">{$i}</a></li>";
                } ?>
           <!--  <li>
                <a href="">...</a>
                <a href="">9</a>
                <a href="">10</a>
                <a href="">11</a>
            </li> -->
          <li><a href="?page=<?php if ($page < $num_page){
            $pagen = $page+1;
        }else{
            $pagen= $page;
        }
        echo $pagen; ?>">&raquo;</a></li>
        </ul>
</div>

<?php endif;
	// include_once('../include/sidebar.php');
 	include_once('include/footer.php'); 
?>
 