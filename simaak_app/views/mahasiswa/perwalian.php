Content Wrapper. Contains page content -->
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
                  if ($user['image'] == null) {
                    if ($user['jenis_kelamin'] == 'L') {
                      echo "<img src='".base_url('assets/uploads/profiles/default_male.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                    } else {
                      echo "<img src='".base_url('assets/uploads/profiles/default_female.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                    };
                  } else {
                  ?>
                    <img src="<?=base_url('assets/uploads/profiles/'.$user['image'])?>" class="profile-user-img img-responsive img-circle" alt="User Image">
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
                    <?=$user['nim']?>
                  </p>

                  <strong>Program Studi</strong>
                  <p class="text-muted">
                    <?=$user['jenjang'].' - '.$user['kode_prodi']?>
                  </p>

                  <strong>Angkatan</strong>
                  <p class="text-muted">
                    <?=$user['angkatan']?>
                  </p>

                  <strong>Kelas</strong>
                  <p class="text-muted">
                    <?=$user['kelas']?>
                  </p>

                  <!-- <strong>IP Terakhir</strong>
                  <p class="text-muted">

                  </p> -->


      </div>      
      </div>

              <hr>

<?php
if (!empty($statusperwalian)) {
?>

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
?>
</p>
<?php
} else {

foreach ($semester as $value) {
?>
<h3>Semester <?=$value['semester']?></h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Kode Matakuliah</th>
      <th>Nama Matakuliah</th>
      <th>SKS</th>
      <th>Nama Dosen</th>
      <th>Hari, Jam</th>
      <th>Ruangan</th>
    </tr>
  </thead>
  <tbody>
<form method="post">
<?php
$i = 0;
foreach ($jadwal as $data) {
if (($data['semester'] == $value['semester']) && ($data['kelas'] == $this->session->kelas)) {
?>
    <tr>
      <td>
        <input type="hidden" name="nama_mhs[]" value="<?=$user['nama']?>">
        <input type="hidden" name="kode_matkul[]" value="<?=$data['kode_matkul']?>">
        <?=$data['kode_matkul']?>
      </td>
      <td>
        <input type="hidden" name="nama_matkul[]" value="<?=$data['nama_matkul']?>">
        <?=$data['nama_matkul']?>
      </td>
      <td>
        <input type="hidden" name="sks[]" value="<?=$data['sks']?>">
        <?=$data['sks']?>
      </td>
      <td>
        <input type="hidden" name="nidn[]" value="<?=$data['nidn']?>">
        <input type="hidden" name="nama_dosen[]" value="<?=$data['nama_dosen']?>">
        <input type="hidden" name="kelas[]" value="<?=$data['kelas']?>">
        <?=$data['nama_dosen']?>
      </td>
      <td>
        <input type="hidden" name="id_jadwal[]" value="<?=$data['id_jadwal']?>">
        <?=ucfirst($data['hari']).', '.$data['waktu']?>
      </td>
      <td>
        <input type="hidden" name="semester[]" value="<?=$data['semester']?>">
        <?=$data['ruangan']?>
      </td>
    </tr>

<?php 
$i++;
} else {
  continue;
}
} ?>

  </tbody>
</table>
<hr/>
<button id="btnSubmitPerwalian" class="btn btn-primary btn-xs" name="submitperwalian">Kirim</button>
</form>
<hr/>
<?php
}
}
?>
<hr/>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper