<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Siswa</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?php foreach($siswa as $swa): ?>

<form action="<?php echo base_url('siswa/update'); ?>" method="post">
    <div class="card-body">
        <input type="hidden" name="id" value="<?php echo $swa->id; ?>">  <!-- Input hidden untuk ID -->

        <div class="form-group">
            <label for="nama">Nama Siswa</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $swa->nama; ?>" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $swa->alamat; ?>" required>
        </div>

        <div class="form-group">
            <label for="tb">Tinggi Badan (cm)</label>
            <input type="number" name="tb" class="form-control" value="<?php echo $swa->tb; ?>" required>
        </div>

        <div class="form-group">
            <label for="bb">Berat Badan (kg)</label>
            <input type="number" name="bb" class="form-control" value="<?php echo $swa->bb; ?>" required>
        </div>

        <div class="form-group">
            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
            <input type="text" name="pendidikan_terakhir" class="form-control" value="<?php echo $swa->pendidikan_terakhir; ?>" required>
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
