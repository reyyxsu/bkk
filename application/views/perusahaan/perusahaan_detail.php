<div class="content-wrapper">
    <section class="content">
        <h4><strong>DETAIL DATA PERUSAHAAN</strong></h4>

        <table class="table">
    <tr>
        <th>NAMA PERUSAHAAN</th>
        <td><?php echo $detail->nama_perusahaan ?></td>
    </tr>
    <tr>
        <th>NAMA HRD</th>
        <td><?php echo $detail->nama_hrd ?></td>
    </tr>
    <tr>
        <th>TELEPON HRD</th>
        <td><?php echo $detail->telepon_hrd ?></td>
    </tr>
    <tr>
        <th>NIK</th>
        <td><?php echo $detail->nik ?></td>
    </tr>
    <tr>
        <th>ALAMAT PERUSAHAAN</th>
        <td><?php echo $detail->alamat_perusahaan ?></td>
    </tr>
    <tr>
        <th>EMAIL</th>
        <td><?php echo $detail->email ?></td>
    </tr>
</table>


        <a href="<?php echo base_url('perusahaan/index'); ?>" class="btn btn-primary">Kembali</a>
    </section>
</div>
