<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Histori Perkuliahan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Profil</a></li>
        <li class="active">Pengajaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
<?php
$gelardepan = $user['gelar_depan'];
if (!empty($gelardepan)) {
  echo $user['gelar_depan'].'. '. $user['nama'].', '.$user['gelar_belakang'];
} else {
  echo $user['nama'].', '.$user['gelar_belakang'];
}
?>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<div>


</div>
            <br/>

            <div class="table-responsive">
            <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Semester</th>
                          <th>Tahun Ajaran</th>
                          <th>Kode Matakuliah</th>
                          <th>Nama Matakuliah</th>
                          <th>SKS</th>
                          <th>kelas</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
$i = 1;

foreach ($pengajaran as $value) {
?>
<tr>
  <td><?=$i?></td>
  <td><?=$value['semester']?></td>
  <td><?=$value['tahun_ajaran']?></td>
  <td><?=$value['kode_matkul']?></td>
  <td><?=$value['nama_matkul']?></td>
  <td><?=$value['sks']?></td>
  <td><?=$value['kelas']?></td>
</tr>
<?php
$i++;
}
?>
                      </tbody>
                    </table>
<?php
  if ($pengajaran == null) {
    echo "<p class='text-center text-danger'><strong>data tidak ditemukan!</strong></p>";
  }
?>

<!-- <div class="text-center">
    <ul class="pagination pagination-sm">
        <?php echo $link?>
    </ul>    
</div> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->