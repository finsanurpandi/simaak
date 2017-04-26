<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
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
              <h3 class="box-title">Perwalian Mahasiswa <?=$this->session->kelas?></h3>
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

                  <strong>IP Terakhir</strong>
                  <p class="text-muted">

                  </p>


      </div>      
      </div>

              <hr>

<?php
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

<?php
foreach ($jadwal as $data) {
if (($data['semester'] == $value['semester']) && ($data['kelas'] == $this->session->kelas)) {
  
?>
    <tr>
      <td><?=$data['kode_matkul']?></td>
      <td><?=$data['nama_matkul']?></td>
      <td><?=$data['sks']?></td>
      <td><?=$data['nama_dosen']?></td>
      <td><?=ucfirst($data['hari']).', '.$data['waktu']?></td>
      <td><?=$data['ruangan']?></td>
    </tr>

<?php 
} else {
  continue;
}
} ?>

  </tbody>
</table>
<hr/>
<button class="btn btn-primary btn-xs">Kirim</button>
<hr/>
<?php
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
  <!-- /.content-wrapper -->