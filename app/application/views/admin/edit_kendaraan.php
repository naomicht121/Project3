<?php  
		$judul['title'] = 'edit_kendaraaan';
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
						<a href="<?= base_url('admin/kendaraan'); ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo base_url('kendaraan/edit_data') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="nama_kendaraan">Name*</label>
								<input type="text" name="id" hidden="hidden" value="<?php echo $nama->id ?>">
								<input class="form-control <?php echo form_error('nama_kendaraan') ? 'is-invalid':'' ?>"
								 type="text" name="nama_kendaraan" placeholder="Nama kendaraan" value="<?php echo $nama->nama_kendaraan ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama_kendaraan') ?>
								</div>
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