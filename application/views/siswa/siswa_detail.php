<div class="content-wrapper">
    <section class="content">
        <h4><strong>DETAIL DATA SISWA</strong></h4>

        <table class="table">
            <tr>
                <th>NAMA SISWA</th>
                <td><?php echo $detail->nama ?></td>
            </tr>
            <tr>
                <th>ALAMAT</th>
                <td><?php echo $detail->alamat ?></td>
            </tr>
            <tr>
                <th>TINGGI BADAN (cm)</th>
                <td><?php echo $detail->tb ?></td>
            </tr>
            <tr>
                <th>BERAT BADAN (kg)</th>
                <td><?php echo $detail->bb ?></td>
            </tr>
            <tr>
                <th>PENDIDIKAN TERAKHIR</th>
                <td><?php echo $detail->pendidikan_terakhir ?></td>
            </tr>
        </table>

        <a href="<?php echo base_url('siswa/index'); ?>" class="btn btn-primary">Kembali</a>
    </section>
</div>
