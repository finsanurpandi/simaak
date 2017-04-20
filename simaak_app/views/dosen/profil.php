Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil Dosen
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<!-- error message for upload file -->
<?php
if ($error == true) {
?>

<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	<?=$error?>
</div>

<?php } ?>

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$user['nama'].', '.$user['gelar_belakang']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            <div class="row">
				<div class="col-md-2 text-center">
                <?php
                  if ($user['image'] == null) {
                    if ($user['jenis_kelamin'] == 'L') {
                      echo "<img src='".base_url('assets/img/profiles/default_male.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                    } else {
                      echo "<img src='".base_url('assets/img/profiles/default_female.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                    };
                  } else {
                  ?>
                    <img src="<?=base_url('assets/img/profiles/'.$user['image'])?>" class="profile-user-img img-responsive img-circle" alt="User Image">
                  <?php
                  } 
                 ?>
					<br/>
					<div class="dropdown">
					  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    Edit
					    <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					    <li><a href="#" data-toggle="modal" data-target="#editPictureModal">Edit Picture</a></li>
					    <li><a href="#" data-toggle="modal" data-target="#ubahPassModal">Ubah Password</a></li>
					  </ul>
					</div>
					<!-- <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editPictureModal">edit picture</button>
					<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ubahPassModal">ubah password</button> -->
				</div>

				<div class="col-md-10">
			   		<strong>NIDN</strong>
		        <p class="text-muted">
		          <?=$user['nidn']?>
		        </p>

		        <strong>NIK</strong>
		        <p class="text-muted">
              <?=$user['nik']?>
            </p>

		        <strong>Nama</strong>
		        <p class="text-muted">
              <?=$user['nama']?>
	          </p>

            <strong>Program Studi</strong>
            <p class="text-muted">
              <?=$user['kode_prodi'].' - '.$prodi['prodi']?>
            </p>

            <strong>Jenis Kelamin</strong>
            <p class="text-muted">
              <?php
                if ($user['jenis_kelamin'] == 'L') {
                  echo 'Laki-Laki';
                } else {
                  echo 'Perempuan';
                }
              ?>
            </p>

            <strong>Jabatan Fungsional</strong>
            <p class="text-muted">
              <?=$user['jabatan_fungsional']?>
            </p>

            <strong>Golongan</strong>
            <p class="text-muted">
              <?=$user['golongan']?>
            </p>


			</div>			
			</div>

              

              <hr>
              
              <!-- CONTENT HERE -->

			<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#alamat" data-toggle="tab">Alamat</a></li>
                  <li><a href="#pendidikan" data-toggle="tab">Riwayat Pendidikan</a></li>
                  <li><a href="#pengajaran" data-toggle="tab">Riwayat Mengajar</a></li>
                  <li><a href="#penelitian" data-toggle="tab">Penelitian</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="alamat">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td><strong>NIK</strong></td>
                          <td><?=$alamat['nik']?></td>
                        </tr>
                        <tr>
                          <td><strong>Kewarganegaraan</strong></td>
                          <td><?=$alamat['kewarganegaraan']?></td>
                        </tr>
                        <tr>
                          <td><strong>Jalan</strong></td>
                          <td><?=$alamat['jalan']?></td>
                        </tr>
                        <tr>
                          <td><strong>RT</strong></td>
                          <td><?=$alamat['rt']?></td>
                        </tr>
                        <tr>
                          <td><strong>RW</strong></td>
                          <td><?=$alamat['rw']?></td>
                        </tr>
                        <tr>
                          <td><strong>Dusun</strong></td>
                          <td><?=$alamat['dusun']?></td>
                        </tr>
                        <tr>
                          <td><strong>Kelurahan</strong></td>
                          <td><?=$alamat['kelurahan']?></td>
                        </tr>
                        <tr>
                          <td><strong>Kecamatan</strong></td>
                          <td><?=$alamat['kecamatan']?></td>
                        </tr>
                        <tr>
                          <td><strong>Kodepos</strong></td>
                          <td><?=$alamat['kodepos']?></td>
                        </tr>
                        <tr>
                          <td><strong>HP</strong></td>
                          <td><?=$alamat['hp']?></td>
                        </tr>
                        <tr>
                          <td><strong>Email</strong></td>
                          <td><?=$alamat['email']?></td>
                        </tr>

                      </tbody>
                    </table>

                  </div>

                  <div class="tab-pane" id="pendidikan">
                    <!-- Post -->
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Perguruan Tinggi</th>
                          <th>Fakultas</th>
                          <th>Program Studi</th>
                          <th>IPK</th>
                          <th>Gelar</th>
                          <th>Tahun Lulus</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
$i = 1;
foreach ($pendidikan as $value) {
?>
<tr>
  <td><?=$i?></td>
  <td><?=$value['perguruan_tinggi']?></td>
  <td><?=$value['fakultas']?></td>
  <td><?=$value['program_studi']?></td>
  <td><?=$value['ipk']?></td>
  <td><?=$value['gelar']?></td>
  <td><?=$value['tahun_lulus']?></td>
</tr>
<?php
$i++;
}
?>
                      </tbody>
                    </table>

                  </div>

                  <div class="tab-pane" id="pengajaran">
                    <!-- Post -->
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Semester</th>
                          <th>Kode Mata Kuliah</th>
                          <th>Nama Mata Kuliah</th>
                          <th>Kode Kelas</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>

                  </div>

                  <div class="tab-pane" id="penelitian">
                    <!-- Post -->
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul Penelitian</th>
                          <th>Bidang Ilmu</th>
                          <th>Lembaga</th>
                          <th>Penerbit</th>
                          <th>Tahun</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
$i = 1;
foreach ($penelitian as $value) {
?>
<tr>
  <td><?=$i?></td>
  <td><?=$value['judul_penelitian']?></td>
  <td><?=$value['bidang_ilmu']?></td>
  <td><?=$value['lembaga']?></td>
  <td><?=$value['penerbit']?></td>
  <td><?=$value['tahun']?></td>
</tr>
<?php
$i++;
}
?>
                      </tbody>
                    </table>

                  </div>

                </div>

              </div>	

              <!-- END OF CONTENT -->
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper