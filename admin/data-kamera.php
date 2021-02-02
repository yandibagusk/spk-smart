<script type="text/javascript">
	$(document).ready(function(){
		$(".editlink").click(function(){
			var myModal = $('#myModal');
			var id_kamera = $(this).closest('tr').find('td.edt_idkamera').html();
			var merk_kamera = $(this).closest('tr').find('td.edt_merk').html();
			var seri_kamera = $(this).closest('tr').find('td.edt_seri').html();
			var iso_max = $(this).closest('tr').find('td.edt_iso').html();
			var shutterspeed_max = $(this).closest('tr').find('td.edt_shutter').html();
			var video_res = $(this).closest('tr').find('td.edt_video').html();
			var megapixel = $(this).closest('tr').find('td.edt_sensor').html();
			var jum_titikfokus = $(this).closest('tr').find('td.edt_fokus').html();
			var battery_life = $(this).closest('tr').find('td.edt_baterai').html();
			var harga = $(this).closest('tr').find('td.edt_harga').html();
			var foto = $(this).closest('tr').find('td.edt_foto').html();
			$('.m_id_kamera', myModal).val(id_kamera);
			$('.m_merk', myModal).val(merk_kamera);
			$('.m_seri', myModal).val(seri_kamera);
			$('.m_iso', myModal).val(iso_max);
			$('.m_shutter', myModal).val(shutterspeed_max);
			$('.m_video', myModal).val(video_res);
			$('.m_sensor', myModal).val(megapixel);
			$('.m_fokus', myModal).val(jum_titikfokus);
			$('.m_baterai', myModal).val(battery_life);
			$('.m_harga', myModal).val(harga);
			$('.m_foto', myModal).val(foto);
			myModal.modal({ show: true });
			return false;
		});
	});
</script>

<div style="padding: 25px" class="animated fadeIn" id="tampil">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;"> Data Spesifikasi Kamera Mirrorless</h6>
		</div>
		<div class="col-md-6">
			<button class="btn btn-primary btn-sm" style="float: right" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Kamera</button>
		</div>
	</div>
	<hr>
	<form method="POST">
		<table id="myTables" class="table table-hover table-bordered table-responsive-sm">
			<thead class="thead-light" style="text-align: center; font-size: 13px;">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Kode</th>
					<th scope="col">Merk</th>
					<th scope="col">Seri</th>
					<th scope="col">Maks ISO</th>
					<th scope="col">Maks Shutter</th>
					<th scope="col">Resolusi Video</th>
					<th scope="col">Sensor</th>
					<th scope="col">Titik Fokus</th>
					<th scope="col">Battery</th>
					<th scope="col">Harga</th>
					<!--th scope="col">Foto</th-->
					<th nowrap scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody style="font-size: 13px;">
				<?php $kamera=$data->select_kamera()?>
				<?php foreach ($kamera as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td class="edt_idkamera"><?php echo $value['id_kamera']; ?></td>
						<td class="edt_merk"><?php echo $value['merk_kamera']; ?></td>
						<td class="edt_seri"><?php echo $value['seri_kamera']; ?></td>
						<td class="edt_iso"><?php echo $value['iso_max']; ?></td>
						<td class="edt_shutter"><?php echo $value['shutterspeed_max'] ?></td>
						<td class="edt_video"><?php echo $value['video_res']; ?></td>
						<td class="edt_sensor"><?php echo $value['megapixel']; ?></td>
						<td class="edt_fokus"><?php echo $value['jum_titikfokus']; ?></td>
						<td class="edt_baterai"><?php echo $value['battery_life']; ?></td>
						<td class="edt_harga"><?php echo $value['harga']; ?> </td>
						<td>
							<button type="button" class="editlink btn btn-warning btn-sm" style="color: white;" title="Edit Data"></style><i class="fa fa-edit"></i></button>
							<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?page=delkamera&id=<?php echo $value['id_kamera'];?>" style="margin: 1px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</form>
</div>


<!--TAMBAH KAMERA-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Kamera</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col">
							<div hidden class="form-group">
								<!--label for="id_spesifikasi"><b>Kode Kamera</b></label-->
								<?php $id_kamera = $data->create_idkamera(); ?>
								<input readonly type="text" value="<?php echo $id_kamera; ?>" name="id_kamera" class="form-control">
							</div>
							<div class="form-group">
								<label for="merk_kamera" style="margin-top: -810px;"><b>Merk Kamera</b></label>
								<input type="text" name="merk_kamera" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="seri_kamera"><b>Seri Kamera</b></label>
								<input type="text" name="seri_kamera" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="iso_max"><b>ISO Maksimum</b></label>
								<input type="number" name="iso_max" min="0" class="form-control" autocomplete="off">
							</div>
							<label for="shutterspeed_max"><b>Shutter Speed Maksimum</b></label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text user" id="basic-addon1">1/</span>
								</div>
								<input type="number" name="shutterspeed_max" min="0" class="form-control" aria-label="harga" aria-describedby="basic-addon1" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="video_res"><b>Resolusi Video</b></label>
								<input type="number" name="video_res" min="0" class="form-control" autocomplete="off">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="megapixel"><b>Megapixel</b></label>
								<input type="number" name="megapixel" min="0" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="jum_titikfokus"><b>Jumlah Titik Fokus</b></label>
								<input type="number" name="jum_titikfokus" min="0" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="battery_life"><b>Ketahanan Baterai</b></label>
								<input type="number" name="battery_life" min="0" class="form-control" autocomplete="off">
							</div>
							<label class="harga" for="harga"><b>Harga</b></label>
							<div class="input-group mb-2 mr-sm-2">
								<div class="input-group-prepend">
									<div class="input-group-text">Rp.</div>
								</div>
								<input type="text" class="form-control" name="harga" placeholder="">
							</div>
							<label for="laporan"><b>Foto Kamera (.jpeg/.png) [max. 2MB]</b></label>
							<div class="form-group">
								<input type="file" name="foto" class="form-control" accept="image/png, image/jpeg">
							</div>
						</div>
					</div>
					<hr>
					<div style="float: right">
						<button class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
						<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</button>
					</div>
					<?php 
					if (isset($_POST['simpan'])) {
						$data->add_kamera($_POST['id_kamera'],$_POST['merk_kamera'],$_POST['seri_kamera'], $_POST['iso_max'],$_POST['shutterspeed_max'],$_POST['video_res'],$_POST['megapixel'],$_POST['jum_titikfokus'],$_POST['battery_life'],$_POST['harga'],$_FILES['foto']);
					}
					?>
				</form>
			</div>
		</div>
	</div>
</div>


<!--EDIT KAMERA-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Kamera</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col">
							<!--?php $select=$data->one_select_kamera($_GET['id']); ?>
								<div><img src="foto/<?php echo $select['foto']?>" width="100px" class="img-thumbnail"></div-->
									<div hidden class="form-group">
										<label for="id_kamera"><b>Kode Spesifikasi</b></label>
										<input readonly type="text" name="id_kamera" class="form-control m_id_kamera">
									</div>
									<div class="form-group">
										<label for="merk_kamera"><b>Merk Kamera</b></label>
										<input type="text" name="merk_kamera" class="form-control m_merk" autocomplete="off">
									</div>
									<div class="form-group">
										<label for="seri_kamera"><b>Seri Kamera</b></label>
										<input type="text" name="seri_kamera" class="form-control m_seri" autocomplete="off">
									</div>
									<div class="form-group">
										<label for="iso_max"><b>ISO Maksimum</b></label>
										<input type="number" name="iso_max" min="0" class="form-control m_iso" autocomplete="off">
									</div>
									<label for="shutterspeed_max"><b>Shutter Speed Maksimum</b></label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text user" id="basic-addon1">1/</span>
										</div>
										<input type="number" name="shutterspeed_max" min="0" class="form-control m_shutter" aria-label="harga" aria-describedby="basic-addon1" autocomplete="off">
									</div>
									<div class="form-group">
										<label for="video_res"><b>Resolusi Video</b></label>
										<input type="number" name="video_res" min="0" class="form-control m_video" autocomplete="off">
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<label for="megapixel"><b>Megapixel</b></label>
										<input type="number" name="megapixel" min="0" class="form-control m_sensor" autocomplete="off">
									</div>
									<div class="form-group">
										<label for="jum_titikfokus"><b>Jumlah Titik Fokus</b></label>
										<input type="number" name="jum_titikfokus" min="0" class="form-control m_fokus" autocomplete="off">
									</div>
									<div class="form-group">
										<label for="battery_life"><b>Ketahanan Baterai</b></label>
										<input type="number" name="battery_life" min="0" class="form-control m_baterai" autocomplete="off">
									</div>
									<label class="harga" for="harga"><b>Harga</b></label>
									<div class="input-group mb-2 mr-sm-2">
										<div class="input-group-prepend">
											<div class="input-group-text">Rp.</div>
										</div>
										<input type="text" class="form-control m_harga" name="harga" autocomplete="off">
									</div>
									<label for="laporan"><b>Foto Kamera (.jpeg/img) [max. 2MB]</b></label>
									<div class="form-group">
										<input type="file" name="foto" class="form-control m_foto" accept="image/png, image/jpeg">
									</div>
								</div>
							</div>			
							<hr>
							<div style="float: right">
								<button class="btn btn-success" name="ubah"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
								<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</button>
							</div>
							<?php
							if (isset($_POST['ubah'])) {
								$data->update_kamera($_POST['id_kamera'],$_POST['merk_kamera'],$_POST['seri_kamera'], $_POST['iso_max'],$_POST['shutterspeed_max'],$_POST['video_res'],$_POST['megapixel'],$_POST['jum_titikfokus'],$_POST['battery_life'],$_POST['harga'],$_FILES['foto']);
							}
							?>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready( function () {
				$('#myTables').DataTable();
			} );
		</script>

		<script type="text/javascript">
			$('[data-toggle=confirmation]').confirmation({
				rootSelector: '[data-toggle=confirmation]',});
			</script>
			<script>
				$(document).ready(function(){
					$('[data-toggle="popover"]').popover({
						placement : 'top',
						trigger : 'hover'
					});
				});
			</script>