
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Gudang</th>
										<th><a href="<?= base_url('admin/input_gudang'); ?>"><i class="fa fa-plus"></i> Add New</a></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0; 
										foreach ($gudang as $result): 
										$no++;?>
										<tr align="center">
											<td><?php echo htmlentities($no);?></td>
											<td><?php echo htmlentities($result->nama_gudang);?></td>
											<td>
											<a href="<?php echo site_url('gudang/edit/'.$result->id) ?>"
											 class="btn btn-small">
											<span class="fa fa-edit"></span>Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('gudang/delete/'.$result->id) ?>')"
											 href="#!" class="btn btn-small text-danger">
											<span class="fa fa-trash"></span>Hapus</a>
											</td>
										</tr>
										<?php endforeach; ?>
								</tbody> 
							</table>
						</div>
					</div>

						<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>