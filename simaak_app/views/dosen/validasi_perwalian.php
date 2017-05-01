<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Perwalian Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mahasiswa</li>
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

<strong>NPM</strong>
<p class="text-muted">
  <?=$perwalianmhs[0]['nim']?>
</p>

<strong>Nama</strong>
<p class="text-muted">
  <?=$perwalianmhs[0]['nama_mhs']?>
</p>

<strong>Status Perwalian</strong>
<p class="text-muted">
  <?=$statusperwalian[0]['v_dosen']?>
</p>

            <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Matakuliah</th>
                  <th>Nama Matakuliah</th>
                  <th>SKS</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($perwalianmhs as $key => $value) {
                  echo "<tr>";
                  echo "<td>".$i++."</td>";
                  echo "<td>".$value['kode_matkul']."</td>";
                  echo "<td>".$value['nama_matkul']."</td>";
                  echo "<td>".$value['sks']."</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>

            </table>


<!-- <div class="text-center">
    <ul class="pagination pagination-sm">
        <?php echo $link?>
    </ul>    
</div> -->
<a href="<?=base_url('dosen/perwalian')?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
<?php
if ($statusperwalian[0]['v_dosen'] == 'Menunggu') {
?>
<button id="validasiPerwalianDosen" class="btn btn-success btn-xs" data-toggle="modal" data-target="#validasiModal" data-nim="<?=$perwalianmhs[0]['nim']?>"><i class="fa fa-check"></i> Validasi</button>
<?php } else { ?>
<button class="btn btn-success btn-xs" disabled="true"><i class="fa fa-check" ></i> Validasi</button>
<?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->