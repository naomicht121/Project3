<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body id="page-top">

    <div id="wrapper">


        <div id="content-wrapper">

            <div class="container-fluid">

                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?= base_url('admin/input_pengiriman'); ?>"> <i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo base_url('admin/pengiriman_add') ?>" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label for="id_kendaraan">id_kendaraan</label>
                                <input class="form-control <?php echo form_error('id_kendaraan') ? 'is-invalid':'' ?>"
                                 type="number" name="id_kendaraan" placeholder="id_kendaraan" />
                                <div class="invalid-feedback">
                                    
                                    <?php echo form_error('id_kendaraan') ?>
                                <label for="id_supir">id_supir</label>
                                <input class="form-control <?php echo form_error('id_supir') ? 'is-invalid':'' ?>"
                                 type="number" name="id_supir" placeholder="id_supir" />
                                <div class="invalid-feedback">


                                    <label for="id_barang">id_barang</label>
                                <input class="form-control <?php echo form_error('id_barang') ? 'is-invalid':'' ?>"
                                 type="number" name="id_barang" placeholder="id_barang" />
                                <div class="invalid-feedback">

                                    <label for="alamat">alamat</label>
                                <input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
                                 type="text" name="alamat" placeholder="alamat" />
                                <div class="invalid-feedback">
                                    
                                </div>
                            </div>

                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                        </form>

                    </div>

                    <div class="card-footer small text-muted">
                        * required fields
                    </div>


</body>

</html>