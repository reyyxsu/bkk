<div class="content-wrapper">
<section class="content-header">
    <h1>
        Data Siswa
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Siswa</li>
    </ol>
</section>

<section class="content">
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class = "fa fa-plus"></i>Tambah Data Siswa</button>
    <table class="table">
        <tr>
            <th>NAMA SISWA</th>
            <th>ALAMAT SISWA</th>
            <th>TINGGI BADAN</th>
            <th>BERAT BADAN</th>
            <th>PENDIDIKAN TERAKHIR</th>
            <th colspan="1">AKSI</th>
        </tr>
        <?php
        foreach ($siswa as $swa): ?>
            <tr>
                <td><?php echo $swa->nama; ?></td>
                <td><?php echo $swa->alamat; ?></td>
                <td><?php echo $swa->tb; ?></td>
                <td><?php echo $swa->bb; ?></td>
                <td><?php echo $swa->pendidikan_terakhir; ?></td>
                <td onclick="javascript: return confirm ('Anda yakin hapus?')"><?php echo anchor('siswa/hapus/'.$swa->id, '<div class="btn btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                <td><?php echo anchor('siswa/edit/'.$swa->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
                <td><?php echo anchor('siswa/detail/'.$swa->id,'<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>')?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">FORM INPUT DATA SISWA</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('siswa/tambah_aksi'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Alamat Siswa</label>
                <input type="text" name="alamat" class="form-control"required>
            </div>

            <div class="form-group">
                <label>Tinggi Badan (cm)</label>
                <input type="number" name="tb" class="form-control"required>
            </div>

            <div class="form-group">
                <label>Berat Badan (kg)</label>
                <input type="number" name="bb" class="form-control"required>
            </div>

            <div class="form-group">
                <label>Pendidikan Terakhir</label>
                <input type="text" name="pendidikan_terakhir" class="form-control"required>
            </div>

            <div class="form-group">
                <label>Upload Foto Pas</label>
                <input type="file" name="foto_pas" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Upload Foto Ijazah</label>
                <input type="file" name="foto_ijazah" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Upload Foto SK Pekerjaan</label>
                <input type="file" name="foto_sk_kerja" class="form-control" required>
            </div>

        <button type="reset" class="btn btn-danger" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
