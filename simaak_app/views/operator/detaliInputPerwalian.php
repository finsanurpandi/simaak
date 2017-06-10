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
                  <strong>NIM</strong>
                  <p class="text-muted">
                    <?=$mhs['nim']?>
                  </p>

                  <strong>Nama</strong>
                  <p class="text-muted">
                    <?=$mhs['nama']?>
                  </p>

                  <strong>Program Studi</strong>
                  <p class="text-muted">
                    <?=$mhs['jenjang'].' - '.$user['kode_prodi']?>
                  </p>

                  <strong>Angkatan</strong>
                  <p class="text-muted">
                    <?=$mhs['angkatan']?>
                  </p>

                  <strong>Kelas</strong>
                  <p class="text-muted">
                    <?=$mhs['kelas']?>
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

<?php
if (!empty($statusperwalian)) {
?>
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
</div>
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
<a href="<?=base_url('cetak/cetak_kartu_rencana_studi/')?><?=$this->encrypt->encode($this->session->username)?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak KRS</a>
<?php
}
} else {

foreach ($semester as $value) {
?>
<h3>Semester <?=$value['semester']?></h3>
<div class="table-responsive">
<table class="table table-hover" id="mytable">
  <thead>
    <tr>
      <th>Pilih</th>
      <th>Kode Matakuliah</th>
      <th>Nama Matakuliah</th>
      <th>SKS</th>
      <th>Nama Dosen</th>
      <th>Hari, Jam</th>
      <th>Ruangan</th>
    </tr>
  </thead>
  <tbody>
<form method="post" id="add">
<?php
$i = 0;
foreach ($jadwal as $data) {
if (($data['semester'] == $value['semester']) && ($data['kelas'] == $kelas) && ($data['pilihan'] == 0)) {
?>
    <tr>
      <td align="center"><input type="checkbox" class="case" name="idjadwal[]" value="<?=$data['id_jadwal']?>"/></td>
      <td>
        <?=$data['kode_matkul']?>
      </td>
      <td>
        <?=$data['nama_matkul']?>
      </td>
      <td>
        <?=$data['sks']?>
      </td>
      <td>
        <?=$data['nama_dosen']?>
      </td>
      <td>
        <?=ucfirst($data['hari']).', '.$data['waktu']?>
      </td>
      <td>
        <?=$data['ruangan']?>
      </td>
    </tr>

<?php 
$i++;
} else {
  continue;
}
} ?>
<tr>
  <td><h3>Pilihan</h3></td>
</tr>
<?php
$j = 0;
foreach ($jadwal as $data) {
if (($data['semester'] == $value['semester']) && ($data['kelas'] == $kelas) && ($data['pilihan'] == 1)) {
?>
    <tr>
    <td align="center"><input type="checkbox" class="case" name="idjadwal[]" value="<?=$data['id_jadwal']?>"/></td>
      <td>
        <?=$data['kode_matkul']?>
      </td>
      <td>
        <?=$data['nama_matkul']?>
      </td>
      <td>
        <?=$data['sks']?>
      </td>
      <td>
        <?=$data['nama_dosen']?>
      </td>
      <td>
        <?=ucfirst($data['hari']).', '.$data['waktu']?>
      </td>
      <td>
        <?=$data['ruangan']?>
      </td>
    </tr>

<?php 
$j++;
} else {
  continue;
}
} ?>

  </tbody>
</table>
</div>
<hr/>
<!-- <button id="btnSubmitPerwalian" class="btn btn-primary btn-xs" name="submitperwalian">Kirim</button>
</form> -->
<hr/>
<?php
}
?>
<input type="hidden" name="nim" value="<?=$mhs['nim']?>">
<input type="hidden" name="nama" value="<?=$mhs['nama']?>">
<button id="btn-submit-perwalian" type="submit" class="btn btn-primary btn-xs" name="submitperwalian">Kirim</button>
<?php 
}
?>

</form>
<hr/>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper-->

  <script type="text/javascript">
    var baseurl = "<?=base_url()?>";
  </script>

