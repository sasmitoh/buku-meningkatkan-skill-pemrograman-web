<?php
$title = 'FORM Add';
include_once 'header.php';
include_once 'action.php'; 
 ?>

<div class="jumbotron text-center">
	<h1>Ngoding study club</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta aspernatur velit dolorem consequatur incidunt id quo, recusandae quod perspiciatis laudantium, ratione asperiores commodi dignissimos at minus inventore repellat dolorum eaque!</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card text-white">
				<div class="card-header bg-primary">entering data</div>
				<div class="card-body text-dark">
					<?php 
						if (isset($_GET["update"])) {
								$id = $_GET["id"] ?? null;
								$where = array("id_data"=>$id,);
								$row = $obj->select_record("data",$where);
								?>
									<form method="post" action="action.php" class="was-validated">

										<div class="form-group">
											
											<input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
									    </div>

										<div class="form-group">
											<label for="uname">Nama:</label>
											<input type="text" class="form-control" id="name" value="<?php echo $row['nama']; ?>" placeholder="Enter Your Name" name="name" required>
											<div class="valid-feedback">Valid.</div>
											<div class="invalid-feedback">Please fill out this field.</div>
									    </div>
									    <div class="form-group">
											<label for="pwd">Email:</label>
											<input type="text" class="form-control" id="email" value="<?php echo $row['email']; ?>" placeholder="Enter your email" name="email" required>
											<div class="valid-feedback">Valid.</div>
											<div class="invalid-feedback">Please fill out this field.</div>
									    </div>
									    <div class="form-group">
											<label for="pwd">No Telp:</label>
											<input type="text" class="form-control" id="telp" value="<?php echo $row['no_telp']; ?>" placeholder="Enter your no telp" name="telp" required>
											<div class="valid-feedback">Valid.</div>
											<div class="invalid-feedback">Please fill out this field.</div>
									    </div>
									    <div class="form-group">
											<label for="comment">Address:</label>
											<textarea class="form-control" rows="5" id="address"  name="address" required><?php echo $row['alamat']; ?></textarea>
									  	<div class="valid-feedback">Valid.</div>
									      <div class="invalid-feedback">Please fill out this field.</div>
									  	</div>
									    <button type="submit" name="edit" class="btn btn-primary">Update</button>
									</form>

								<?php
						}else{
							?>
								<form method="post" action="action.php" class="was-validated">
									<div class="form-group">
										<label for="uname">Nama:</label>
										<input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required>
										<div class="valid-feedback">Valid.</div>
										<div class="invalid-feedback">Please fill out this field.</div>
								    </div>
								    <div class="form-group">
										<label for="pwd">Email:</label>
										<input type="text" class="form-control" id="email" placeholder="Enter your email" name="email" required>
										<div class="valid-feedback">Valid.</div>
										<div class="invalid-feedback">Please fill out this field.</div>
								    </div>
								    <div class="form-group">
										<label for="pwd">No Telp:</label>
										<input type="text" class="form-control" id="telp" placeholder="Enter your no telp" name="telp" required>
										<div class="valid-feedback">Valid.</div>
										<div class="invalid-feedback">Please fill out this field.</div>
								    </div>
								    <div class="form-group">
										<label for="comment">Address:</label>
										<textarea class="form-control" rows="5" id="address" name="address" required></textarea>
								  	<div class="valid-feedback">Valid.</div>
								      <div class="invalid-feedback">Please fill out this field.</div>
								  	</div>
								    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
								</form>
							<?php
						}
					 ?>
					
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
<br>
<div class="jumbotron text-center" style="margin-bottom:0">
      <footer>
        <p>&copy; NSC 2019</p>
      </footer>
</div>
</body>
</html>
	

	
