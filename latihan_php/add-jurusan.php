<?php
include_once 'include/header.php'; 
include_once 'include/nav_admin.php';
 ?>
 <div class="main">
	<h2>Tambah Jurusan</h2>
	<fieldset>
		<legend>Information Jurusan</legend>
	<form action="add-jurusan.php" method="post" enctype="multipart/form-data">
		<div class="input">
 			<label>Jurusan <b style="color: red">*</b></label>
 			<input type="text" name="jurusan">
 		</div>

	 	<div class="submit">
	 		<input type="submit" name="submit" value="Simpan" class="btn btn-large">
	 	</div>
	</form>
	</fieldset>
 </div>


<?php
include_once 'include/sidebar.php';
include_once 'include/footer.php'; 
  ?>