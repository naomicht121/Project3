				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/input_pengiriman') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>id</th>
										<th>Kendaraan</th>
										<th>Supir</th>
										<th>Alamat</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0; 
										foreach ($pengiriman->result() as $result): 
										$no++;?>
										<tr align="center">
											<td><?php echo htmlentities($no);?></td>
											<td><?php echo htmlentities($result->nama_kendaraan);?></td>
											<td><?php echo htmlentities($result->nama_barang);?></td>
											<td><?php echo htmlentities($result->nama);?></td>
											<td><?php echo htmlentities($result->alamat);?></td>
											<td>
											<a href="<?php echo site_url('pengiriman/edit/'.$result->id) ?>"
											 class="btn btn-small">
											<span class="fa fa-edit"></span>Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('pengiriman/delete/'.$result->id) ?>')"
											 href="#!" class="btn btn-small text-danger">
											<span class="fa fa-trash"></span>Hapus</a>
											</td>
										</tr>
										<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>