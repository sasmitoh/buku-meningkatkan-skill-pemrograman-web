<?php 
$title = 'daftar';
$image = '<img class="admin" src = "img/nsc-login.png" alt="">';

include_once 'include/koneksi.php';
$no=0;
$sql = 'SELECT * FROM angota';
$sql = ("SELECT anggota.id_anggota, anggota.nama, jurusan.jurusan, anggota.tanggal, anggota.kelas, 
                anggota.alamat, anggota.no_hp, anggota.email, anggota.moto, anggota.foto 
                FROM anggota
                JOIN jurusan ON jurusan.id_jurusan = anggota.jurusan_id");

$result = mysqli_query($conn, $sql);
include_once('include/header.php');
include_once 'include/nav.php';
?>
<div class="full">
    <?php
        echo '<a href="add-anggota.php" class="btn btn-large"><img src="img/add.png"  style = "width: 30px;" />Anggota</a>'; 
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
            <th>Aksi</th>
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
                <td><a class="btn btn-default" href="edit-anggota.php?id=<?php echo $row['id_anggota'];?>">Edit</a><a class="btn btn-alert" onclick="return confirm('Yakin akan menghapus data?');" href="delete-anggota.php?id=<?php echo $row['id_anggota'];?>">Delete</a></td>
            </tr>
        <?php endwhile; ?>
     </table>
  
</div>

<?php
    // include_once('../include/sidebar.php');
    include_once('include/footer.php'); 
?>
 