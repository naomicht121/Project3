<?php  
		$judul['title'] = 'edit Gudang';
		$session['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $session);
		$this->load->view('templates/topbar', $session);
?>


		<div id="content-wrapper">

			<div class="container-fluid">


				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?= base_url('admin/gudang'); ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo base_url('gudang/edit_data') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<?php var_dump($data);
								foreach ($data as $key => $value) : {
									?>
								<label for="gudang">Name*</label>
								<input type="text" name="id" hidden="hidden" value="<?=$value['id'];?>">
								<input class="form-control <?php echo form_error('gudang') ? 'is-invalid':'' ?>"
								 type="text" name="gudang" placeholder="Nama gudang" value="<?=$value['nama_gudang'];?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('gudang') ?>
								</div>
								<?php }
							endforeach ?>
								
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					
					<div class="card-footer small text-muted">
						* required fields
					</div>

<?php 
$this->load->view('templates/footer');
?>