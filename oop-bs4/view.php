<?php
$title = 'View';
include_once 'action.php';
include_once 'header.php'; 
 ?>
 <div class="jumbotron text-center">
	<h1>Ngoding study club</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta aspernatur velit dolorem consequatur incidunt id quo, recusandae quod perspiciatis laudantium, ratione asperiores commodi dignissimos at minus inventore repellat dolorum eaque!</p>
</div>
 <div class="container">
	<div class="row">
		<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="table-responsive">
					<table class="table table-hover">
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>No Telp</th>
						<th>Addres</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
					<?php
						$myrow = $obj->fetch_record("data");
						foreach ($myrow as $row) {
							//breaking point
							?>
								<tr>
									<td><?php echo $row['id_data']; ?></td>
									<td><?php echo $row['nama']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['no_telp']; ?></td>
									<td><?php echo $row['alamat']; ?></td>
									<td><a href="add-form.php?update=1&id=<?php echo $row['id_data']; ?>" class="btn btn-info btn-md">edit</a></td>
									<td><a href="action.php?delete=1&id=<?php echo $row['id_data']; ?>" class="btn btn-danger btn-md">delete</a></td>
								</tr>
							<?php
						}

					 ?>
					
				</table>
				</div>
			</div>
		<div class="col-md-2"></div>
	</div>
</div>