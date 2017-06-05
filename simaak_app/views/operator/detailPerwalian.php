<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perwalian Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Perwalian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$user['nama']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<div class="row">
        <div class="col-md-2 text-center">
                <?php
                  if ($mhs['image'] == null) {
                    if ($mhs['jenis_kelamin'] == 'L') {
                      echo "<img src='".base_url('assets/uploads/profiles/default_male.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                    } else {
                      echo "<img src='".base_url('assets/uploads/profiles/default_female.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                    };
                  } else {
                  ?>
                    <img src="<?=base_url('assets/uploads/profiles/'.$mhs['image'])?>" class="profile-user-img img-responsive img-circle" alt="User Image">
                  <?php
                  } 
                 ?>
          <br/>
          <!-- <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editPictureModal">edit picture</button>
          <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ubahPassModal">ubah password</button> -->
        </div>

        <div class="col-md-10">
                  <strong>NPM</strong>
                  <p class="text-muted">
                    <?=$mhs['nim']?>
                  </p>
                  
                  <strong>Nama</strong>
                  <p class="text-muted">
                    <?=$mhs['nama']?>
                  </p>

                  <strong>Program Studi</strong>
                  <p class="text-muted">
                    <?=$mhs['jenjang'].' - '.$mhs['kode_prodi']?>
                  </p>

                  <strong>Angkatan</strong>
                  <p class="text-muted">
                    <?=$mhs['angkatan']?>
                  </p>

                  <strong>Kelas</strong>
                  <p class="text-muted">
                    <?=$mhs['kelas']?>
                  </p>

                  <strong>Dosen Wali</strong>
                  <p class="text-muted" id="mhsdosenwali">
                    <?php
                    echo $dosenwali[0]['gelar_depan'].' '.$dosenwali[0]['nama'].', '.$dosenwali[0]['gelar_belakang'];
                    ?>
                  </p>

                  <!-- <strong>Dosen Wali</strong>
                  <p class="text-muted">
                    <?php
                      echo $user['gelar_depan'].' '.$user['nama'].', '.$user['gelar_belakang'];
                    ?>
                  </p> -->

                  <!-- <strong>IP Terakhir</strong>
                  <p class="text-muted">

                  </p> -->


      </div>      
      </div>

              <hr>

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
$totalsks = 0;
foreach ($perwalian as $key => $value) {
?>
<tr>
  <td><?=$i++?></td>
  <td><?=$value['kode_matkul']?></td>
  <td><?=$value['nama_matkul']?></td>
  <td><?=$value['sks']?></td>
</tr>
<?php
$totalsks += $value['sks'];
 } ?>

  </tbody>
</table>
<hr/>

<strong>Tahun Ajaran</strong>
<p class="text-muted">
  <?=$this->session->tahun_ajaran?>
</p>

<strong>Total SKS</strong>
<p class="text-muted">
  <?=$totalsks?> SKS
</p>

<strong>Waktu Perwalian</strong>
<p class="text-muted">
  <?php
  $date = new DateTime($statusperwalian['tgl_perwalian']);
  echo $date->format('l, d/m/Y - H:i:s'). ' WIB';
  ?>
</p>

<strong>Status Validasi</strong>
<p class="text-muted">
  Dosen Wali = <?=$statusperwalian['v_dosen']?>
<?php
// $validasidosen = $statusperwalian['v_dosen'];
//   if (empty($validasidosen)) {
//     echo 'Menunggu';
//   } else {
//     echo $statusperwalian['v_dosen'];
//   }
if ($statusperwalian['v_dosen'] !== 'Menunggu') {

?>
</p>
<a href="<?=base_url('cetak/cetak_kartu_rencana_studi/')?><?=$this->encrypt->encode($mhs['nim'])?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak KRS</a>
<?php
}
?>
<hr/>
<a href="<?=base_url('operator/perwalian')?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> kembali</a>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper-->

