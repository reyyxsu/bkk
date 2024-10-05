<div class="content-wrapper">
<section class="content-header">
    <h1>
        Data Perusahaan
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Perusahaan</li>
    </ol>
</section>

<section class="content">
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class = "fa fa-plus"></i>Tambah Data perusahaan</button>
    <table class="table">
        <tr>
            <th>NAMA PERUSAHAAN</th>
            <th>NAMA HRD</th>
            <th>NO TELEPON</th>
            <th>NIK HRD</th>
            <th>ALAMAT PERUSAHAAN</th>
            <th>EMAIL PERUSAHAAN</th>
            <th colspan="1">AKSI</th>
        </tr>
        <?php
        foreach ($perusahaan as $prs): ?>
            <tr>
                <td><?php echo $prs->nama_perusahaan; ?></td>
                <td><?php echo $prs->nama_hrd; ?></td>
                <td><?php echo $prs->telepon_hrd; ?></td>
                <td><?php echo $prs->nik; ?></td>
                <td><?php echo $prs->alamat_perusahaan; ?></td>
                <td><?php echo $prs->email; ?></td>
                <td onclick="javascript: return confirm ('Anda yakin hapus?')"><?php echo anchor('perusahaan/hapus/'.$prs->id, '<div class="btn btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                <td><?php echo anchor('perusahaan/edit/'.$prs->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
                <td><?php echo anchor('perusahaan/detail/'.$prs->id,'<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>')?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">FORM INPUT DATA PERUSAHAAN</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method = "post" action="<?php echo base_url('perusahaan/tambah_aksi')?>">
            <div class="form-group">
                <label>Nama perusahaan</label>
                <input type="text" name="nama_perusahaan" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Nama HRD</label>
                <input type="text" name="nama_hrd" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="number" name="telepon_hrd" class="form-control" required>
            </div>

            <div class="form-group">
                <label>NIK HRD</label>
                <input type="number" name="nik" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Alamat Perusahaan</label>
                <input type="text" name="alamat_perusahaan" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email Perusahaan</label>
                <input type="text" name="email" class="form-control" required>
            </div>

        <button type="reset" class="btn btn-danger" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan</button>

        </form>
      </div>
    </div>
  </div>
</div>
