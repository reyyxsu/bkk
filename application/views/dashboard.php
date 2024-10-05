<style>
    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        text-align: left;
    }
    
    .table th, .table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
    }
    
    .table th {
        background-color: #4CAF50;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
    }
    
    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tr:hover {
        background-color: #f1f1f1;
    }
    
    .table td {
        font-size: 16px;
    }
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">

    <h2><b>Data Siswa</b></h2>
    
<table class="table">
    <tr>
        <th>NAMA SISWA</th>
        <th>ALAMAT SISWA</th>
        <th>TINGGI BADAN</th>
        <th>BERAT BADAN</th>
        <th>PENDIDIKAN TERAKHIR</th>
    </tr>
    <?php foreach ($siswa as $swa): ?>
    <tr>
        <td><?php echo $swa->nama; ?></td>
        <td><?php echo $swa->alamat; ?></td>
        <td><?php echo $swa->tb; ?></td>
        <td><?php echo $swa->bb; ?></td>
        <td><?php echo $swa->pendidikan_terakhir; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<br><br>

<h2><b>Data Perusahaan</b></h2>

<table class="table">
    <tr>
            <th>NAMA PERUSAHAAN</th>
            <th>NAMA HRD</th>
            <th>NO TELEPON</th>
            <th>NIK HRD</th>
            <th>ALAMAT PERUSAHAAN</th>
            <th>EMAIL PERUSAHAAN</th>
    </tr>
    <?php foreach ($perusahaan as $prs): ?>
    <tr>
                <td><?php echo $prs->nama_perusahaan; ?></td>
                <td><?php echo $prs->nama_hrd; ?></td>
                <td><?php echo $prs->telepon_hrd; ?></td>
                <td><?php echo $prs->nik; ?></td>
                <td><?php echo $prs->alamat_perusahaan; ?></td>
                <td><?php echo $prs->email; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</section>
</body>
</html>
