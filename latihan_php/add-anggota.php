<?php
include_once 'include/header.php'; 
include_once 'include/nav_admin.php';
 ?>
 <div class="main">
	<h2>Tambah Anggota</h2>
	<fieldset>
	<legend>Information Anggota</legend>
	<form action="add-anggota.php" method="post" enctype="multipart/form-data">
		<div class="input">
 			<label> Nama <b style="color: red">*</b></label>
 			<input type="text" name="nama"  placeholder="---- nama ------" >
 		</div>
 		<div class="input">
 			<label> Jurusan <b style="color: red">*</b></label>
 			<select name="jurusan" >
 				<option >---pilih jurusan---</option>
 				<option value="">Teknik Informatika</option>
 				<option value="">Teknik Lingkungan</option>
 				<option value="">Teknik Arsitektur</option>
				
			</select>
 		</div>
 		<div class="input">
 			<label>Kelas</label>
 			<select name="kelas" id="">
 				<option >--- Pilih Kelas ----</option>
 				<option value="Reguler">Reguler</option>
 				<option value="Non Reguler">Non Reguler</option>
 			</select>
 		</div>
 		<div class="input">
 			<label>Tanggal Daftar <b style="color: red">*</b></label>
 			<input type="text" name="ttb" id="datepicker" >
 		</div>
 		<div class="input">
 			<label>Alamat <b style="color: red">*</b></label>
 			<textarea name="alamat" id="" cols="10" rows="5" ></textarea>
 		</div>
 		<div class="input">
 			<label> No. HP <b style="color: red">*</b></label>
 			<input type="text" name="no_hp"  placeholder="---- +6281282463431 ------"  >
 		</div>
 		<div class="input">
 			<label> email <b style="color: red">*</b></label>
 			<input type="text" name="email"  placeholder="---- eample@ngodingstudy.com ------">
 		</div>
 		<div class="input">
 			<label>Description <b style="color: red">*</b></label>
 			<textarea name="moto" id="" cols="10" rows="5" ></textarea>
 		</div>
 		<div class="input">
 			<label> File Gambar</label>
 			<input type="file" name="file_gambar">
 		</div>

	 	<div class="submit">
	 		<input type="submit" name="submit" value="Simpan" class="btn btn-large" />
	 	</div>
	</form>
 	</fieldset>
 </div>
<?php
include_once 'include/sidebar.php';
include_once 'include/footer.php'; 
  ?>