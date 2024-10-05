<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Data perusahaan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?php foreach($perusahaan as $prs): ?>

<form action="<?php echo base_url('perusahaan/update'); ?>" method="post">
    <div class="card-body">
        <input type="hidden" name="id" value="<?php echo $prs->id; ?>">  <!-- Input hidden untuk ID -->

        <div class="form-group">
            <label for="nama_perusahaan">Nama perusahaan</label>
            <input type="text" name="nama_perusahaan" class="form-control" value="<?php echo $prs->nama_perusahaan; ?>" required>
        </div>

        <div class="form-group">
            <label for="nama_hrd">Nama HRD</label>
            <input type="text" name="nama_hrd" class="form-control" value="<?php echo $prs->nama_hrd; ?>" required>
        </div>

        <div class="form-group">
            <label for="telepon_hrd">Nomor Telepon HRD</label>
            <input type="number" name="telepon_hrd" class="form-control" value="<?php echo $prs->telepon_hrd; ?>" required>
        </div>

        <div class="form-group">
            <label for="nik">NIK HRD</label>
            <input type="number" name="nik" class="form-control" value="<?php echo $prs->nik; ?>" required>
        </div>

        <div class="form-group">
            <label for="alamat_perusahaan">Alamat perusahaan</label>
            <input type="text" name="alamat_perusahaan" class="form-control" value="<?php echo $prs->alamat_perusahaan; ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email Perusahaan</label>
            <input type="text" name="email" class="form-control" value="<?php echo $prs->email; ?>" required>
        </div>
    </div>

    <div class="card-footer">
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<?php endforeach; ?>
       
            </div>
        </div>
    </section>
</div>
