<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, Bagian Keuangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Mahasiswa</li>
        <li class="active">Detail Pembayaran</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Bukti Pembayaran Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">

<strong>NPM</strong>
<p class="text-muted"><?=$datamhs[0]['nim']?></p>

<strong>Nama</strong>
<p class="text-muted"><?=$datamhs[0]['nama']?></p>

<strong>Angkatan</strong>
<p class="text-muted"><?=$datamhs[0]['angkatan']?></p>

<strong>Kelas</strong>
<p class="text-muted"><?=$datamhs[0]['kelas']?></p>

<strong>Program Studi</strong>
<p class="text-muted">
<?php
switch ($datamhs[0]['kode_prodi']) {
  case 'ES':
    echo "Ekonomi Syariah";
    break;
  
  case 'MPI':
    echo "Manajemen Pendidikan Islam";
    break;

  case 'PBS':
    echo "Perbankan Syariah";
    break;
}
?>
</p>
<hr/>
<h3>Histori Pembayaran</h3>
      <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Bukti Pembayaran</th>
          <th>Tanggal Upload</th>
          <th>Status</th>
          <th>Persentase</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
<?php
$i = 1;
foreach ($mhs as $key => $value) {
  $url = base_url('assets/uploads/documents/mahasiswa/'.$value['image']);
?>
<tr>
  <td><?=$i++?></td>
  <td><a href="<?=$url?>" target="_blank"><?=$value['image']?></a></td>
  <td><?php
    echo date("d-M-Y H:i:s", strtotime($value['log']));
  ?>
  </td>
  <td>
    <?php
      if ($value['status'] == 1) {
        echo "Sudah Divalidasi";
      } else {
        echo "Menunggu";
      }
    ?>
  </td>
  <td><?=$value['persentase']?> %</td>
  <td>
    <button 
    class="btn btn-success btn-xs" 
    data-toggle="modal" 
    data-target="#validasiModal"
    data-id="<?=$value['id']?>"
    data-nim="<?=$value['nim']?>"
    data-image="<?=$value['image']?>"
    data-status="<?=$value['status']?>"
    data-persentase="<?=$value['persentase']?>"
    id="btn-validasi"
    ><i class="fa fa-check"></i> Validasi</button>
<?php
if ($value['persentase'] == 0) {
?>
    <button id="btn-hapus-validasi"
    class="btn btn-danger btn-xs"
    data-toggle="modal"
    data-target="#hapusValidasiModal"
    data-id="<?=$value['id']?>"
    ><i class="fa fa-close"></i> Hapus</button>
<?php } else {
echo "<button class='btn btn-danger btn-xs' disabled='true'><i class='fa fa-close'></i> Hapus</button>";
}
?>
  </td>
</tr>
<?php } ?>
      </tbody>
      </table>

<hr/>

<a href="<?=base_url('keuangan/pembayaran')?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->