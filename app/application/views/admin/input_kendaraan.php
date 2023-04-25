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
                        <a href="<?= base_url('admin/kendaraan'); ?>"> <i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo base_url('admin/kendaraan_add') ?>" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label for="nama_kendaraan">nama_kendaraan</label>
                                <input class="form-control <?php echo form_error('nama_kendaraan') ? 'is-invalid':'' ?>"
                                 type="text" name="nama_kendaraan" placeholder="nama_kendaraan" />
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


</body>

</html>