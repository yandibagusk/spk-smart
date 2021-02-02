<style type="text/css">
	td{
		text-align: center;
	}
</style>

<div style="padding: 25px" class="animated fadeIn" id="tampil">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Data Perhitungan</h6>
		</div>
	</div>
	<hr>
	<form method="POST">
		<table id="myTables" class="table table-hover table-bordered table-responsive-sm">
			<thead class="thead-light" style="text-align: center; font-size: 14px;">
				<tr>
					<th scope="col" width="20">No</th>
					<th scope="col">Tanggal Perhitungan</th>
					<th scope="col">Kamera</th>
					<!--th scope="col">Normalisasi</th>
					<th scope="col">Skor Utility</th-->
					<th scope="col">Skor Akhir</th>
					<th scope="col" width="20">Aksi</th>
				</tr>
			</thead>
			<tbody style="font-size: 14px;">
				<?php $perhitungan=$data->select_perhitungan()?>
				<?php foreach ($perhitungan as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<?php $tgl = $value["tanggal"];?>
						<td><?php echo date("d F Y (H:i:s)", strtotime($tgl)); ?></td>
						<td><?php echo $value['merk_kamera']; echo ' ';;echo $value['seri_kamera']; ?></td>
						<!--td><?php echo $value['normalisasi']; ?></td>
						<td><?php echo $value['utility_score']; ?></td-->
						<td><?php echo $value['skor_akhir']; ?></td>
						<td>
							<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?page=delperhitungan&id_perhitungan=<?php echo $value['id_perhitungan'];?>&id_detail=<?php echo $value['id_detail'];?>" style="margin: 1px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</form>
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