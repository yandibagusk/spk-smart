<body>
	<div class="container mt-3">
		<div class="row">
			<div class="col-md-5">
				<form method="post" enctype="multipart/form-data">

					<div class="form-group row mt-2">
						<div class="col-sm-10">
							<input type="text" name="keyword" class="form-control" id="">
						</div>
						<button type="submit" class="btn btn-sm btn-success" name="cari">Cari</button>
					</div>
				</form>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-md-5">
				<table class="table table-striped table-hover">
					<thead class="bg-info text-white">
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Gambar</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(isset($_POST["cari"])){
							$search = $_POST['keyword'];

							$query = $db->query("SELECT * FROM rsh_upload_image WHERE nama_gambar LIKE '%$search%' ORDER BY id ASC");
						} else {
							$query = $db->query("SELECT * FROM rsh_upload_image ORDER BY id ASC");
						}

						$no = 1;

						while($row = mysqli_fetch_assoc($query)) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $row['nama_gambar'] ?></td>
								<td>
									<img src="images/<?= $row['gambar'] ?>" width="80">
								</td>
								<td>
									<a href="" class="btn btn-sm btn-warning">Edit</a>
									<a href="" class="btn btn-sm btn-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>