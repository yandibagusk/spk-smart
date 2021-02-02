<script type="text/javascript">
	$(document).ready(function(){
		$(".editlink").click(function(){
			var myModal = $('#myModal');
			var id_kriteria = $(this).closest('tr').find('td.edt_idkriteria').html();
			var kriteria = $(this).closest('tr').find('td.edt_kriteria').html();
			var deskripsi = $(this).closest('tr').find('td.edt_deskripsi').html();
			$('.m_idkriteria', myModal).val(id_kriteria);
			$('.m_kriteria', myModal).val(kriteria);
			$('.m_deskripsi', myModal).val(deskripsi);
			myModal.modal({ show: true });
			return false;
		});
	});
</script>
<style type="text/css">
	td{
		text-align: center;
	}
</style>

<div style="padding: 25px" class="animated fadeIn" id="tampil">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Data Kriteria</h6>
		</div>
		<!--div class="col-md-6">
			<button class="btn btn-primary btn-sm" style="float: right" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Kriteria</button>
		</div-->
	</div>
	<hr>
	<form method="POST">
		<table id="myTables" class="table table-hover table-bordered table-responsive-sm">
			<thead class="thead-light" style="text-align: center; font-size: 14px;">
				<tr>
					<th scope="col" width="15">No</th>
					<th scope="col" width="80">ID Kriteria</th>
					<th scope="col" width="180">Kriteria</th>
					<th scope="col">Deskripsi</th>
					<th scope="col" width="60">Aksi</th>
				</tr>
			</thead>
			<tbody style="font-size: 14px;">
				<?php $kriteria=$data->select_kriteria()?>
				<?php foreach ($kriteria as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td class="edt_idkriteria"><?php echo $value['id_kriteria']; ?></td>
						<td class="edt_kriteria"><?php echo $value['kriteria']; ?></td>
						<td class="edt_deskripsi"><?php echo $value['deskripsi']; ?></td>
						<td>
							<button type="button" class="editlink btn btn-warning btn-sm" style="color: white;" title="Edit Data"></style><i class="fa fa-edit"></i></button>
							<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?page=delkriteria&id=<?php echo $value['id_kriteria'];?>" style="margin: 1px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</form>
</div>


<!--TAMBAH KRITERIA-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Tambah Kriteria</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST">
					<div hidden class="input-group mb-3">
						<div class="input-group-prepend">
							<?php $id_kriteria = $data->create_idkriteria(); ?>
							<span class="input-group-text user" id="basic-addon1"><i class="fa fa-key"></i></span>
						</div>
						<input readonly type="text" name="id_kriteria" class="form-control" aria-label="id_kriteria" value="<?php echo $id_kriteria; ?>" aria-describedby="basic-addon1">
					</div>
					<div class="form-group">
						<label for="kriteria"><b>Kriteria</b></label>
						<input type="text" name="kriteria" class="form-control" autofocus="yes" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="dekskripsi"><b>Deskripsi</b></label>
						<textarea class="form-control" name="deskripsi" rows="5" autocomplete="off"></textarea>
					</div>
					<hr>
					<div style="float: right">
						<button class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
						<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</button>
					</div>
					<?php 
					if (isset($_POST['simpan'])) {
						$data->add_kriteria($_POST['id_kriteria'],$_POST['kriteria'],$_POST['deskripsi']);
					}
					?>
				</form>
			</div>
		</div>
	</div>
</div>

<!--EDIT KRITERIA-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Edit Kriteria</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST">
					<div hidden class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text user" id="basic-addon1"><i class="fa fa-key"></i></span>
						</div>
						<input readonly type="text" name="id_kriteria" class="form-control m_idkriteria" aria-label="id_kriteria" aria-describedby="basic-addon1">
					</div>
					<div class="form-group">
						<label for="kriteria"><b>Kriteria</b></label>
						<input type="text" name="kriteria" class="form-control m_kriteria" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="dekskripsi"><b>Deskripsi</b></label>
						<textarea class="form-control m_deskripsi" name="deskripsi" rows="5" autocomplete="off"></textarea>
					</div>
					<hr>
					<div style="float: right">
						<button class="btn btn-success" name="ubah"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
						<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</button>
					</div>
					<?php 
					if (isset($_POST['ubah'])) {
						$data->update_kriteria($_POST['id_kriteria'],$_POST['kriteria'],$_POST['deskripsi']);
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