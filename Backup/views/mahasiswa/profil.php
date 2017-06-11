<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Profil</li>
        <li class="active">Basic Info</li>

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
					<div class="dropdown">
					  <button class="btn btn-success btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    <i class="fa fa-refresh"></i> Edit
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

                  <strong>Dosen Wali</strong>
                  <p class="text-muted" id="mhsdosenwali">
                    <?php
                    echo $dosenwali[0]['gelar_depan'].' '.$dosenwali[0]['nama'].', '.$dosenwali[0]['gelar_belakang'];
                    ?>
                  </p>


			</div>			
			</div>

              

<br/>
              
              <!-- CONTENT HERE -->

			<!-- <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#profilmhs" data-toggle="tab">Profil</a></li>
                  <li><a href="#orangtua" data-toggle="tab">Orang Tua</a></li>
                  <li><a href="#upload" data-toggle="tab">Upload</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="profilmhs"> -->
<?php
if ($this->session->mhs_profil !== false) {
                  
  if (@$this->session->flashdata('profil_success') == true) {
?>
    <div class="alert alert-success">Data berhasil ditambahkan!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

<?php
  }
?>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td><strong>Nama</strong></td>
                          <td><?=$user['nama']?></td>
                        </tr>
                        <tr>
                          <td><strong>NIK</strong></td>
                          <td><?=$profil['nik']?></td>
                        </tr>
                        <tr>
                          <td><strong>Tempat Lahir</strong></td>
                          <td><?=$user['tempat_lahir']?></td>
                        </tr>
                        <tr>
                          <td><strong>Tanggal Lahir</strong></td>
                          <td><?php
                          $date = new DateTime($user['tanggal_lahir']);
                          echo $date->format('d-M-Y');
                          ?></td>
                        </tr>
                        <tr>
                          <td><strong>Alamat Lengkap</strong></td>
                          <td><?=$profil['alamat_lengkap']?></td>
                        </tr>
                        <tr>
                          <td><strong>Golongan Darah</strong></td>
                          <td><?=$profil['golongan_darah']?></td>
                        </tr>
                        <tr>
                          <td><strong>No Tlp/HP</strong></td>
                          <td><?=$profil['no_tlp']?></td>
                        </tr>
                        <tr>
                          <td><strong>email</strong></td>
                          <td><?=$profil['email']?></td>
                        </tr>
                        <tr>
                          <td><strong>Asal Sekolah</strong></td>
                          <td><?=$profil['asal_sekolah']?></td>
                        </tr>
                        <tr>
                          <td><strong>Nomor Induk Siswa Nasional</strong></td>
                          <td><?=$profil['nomor_induk']?></td>
                        </tr>

                      </tbody>
                    </table>
                    <br/>

<button id="editProfil" class="btn btn-success btn-sm"
data-toggle="modal"
data-target="#editProfilModal"
data-nama="<?=$user['nama']?>"
data-tempat="<?=$user['tempat_lahir']?>"
data-tanggal="<?=$user['tanggal_lahir']?>"
data-nik="<?=$profil['nik']?>"
data-alamat="<?=$profil['alamat_lengkap']?>"
data-darah="<?=$profil['golongan_darah']?>"
data-tlp="<?=$profil['no_tlp']?>"
data-email="<?=$profil['email']?>"
data-sekolah="<?=$profil['asal_sekolah']?>"
data-nisn="<?=$profil['nomor_induk']?>"
><i class="fa fa-refresh"></i> update</button>

                    <?php } else {
                    ?>

<form method="post" class="form-horizontal">

  <div class="form-group required">
    <label for="nik" class="col-sm-2 control-label">NIK</label>
    <div class="col-sm-6">
      <input type="number" class="form-control" name="nik" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="alamat_lengkap" class="col-sm-2 control-label">Alamat Lengkap</label>
    <div class="col-sm-6">
      <textarea name="alamat_lengkap" class="form-control" rows="3" required></textarea>
    </div>
  </div>

  <div class="form-group required">
    <label for="nik" class="col-sm-2 control-label">Tempat Lahir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="tempat_lahir" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="nik" class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="col-sm-6">
      <input type="date" class="form-control" name="tanggal_lahir" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="golongan_darah" class="col-sm-2 control-label">Golongan Darah</label>
    <div class="col-sm-6">
      <select name="golongan_darah">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="AB">AB</option>
        <option value="O">O</option>
      </select>
    </div>
  </div>

  <div class="form-group required">
    <label for="no_tlp" class="col-sm-2 control-label">No Tlp/HP</label>
    <div class="col-sm-6">
      <input type="number" class="form-control" name="no_tlp" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" name="email" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="asal_sekolah" class="col-sm-2 control-label">Asal Sekolah</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="asal_sekolah">
    </div>
  </div>

  <div class="form-group required">
    <label for="nomor_induk" class="col-sm-2 control-label">Nomor Induk Siswa Nasional</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nomor_induk" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit_profil" class="btn btn-success btn-sm"><i class="fa fa-cloud-upload"></i> insert</button>
    </div>
  </div>


</form>
                    <?php
                    }
                    ?>
                  

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
  <!-- /.content-wrapper -->
  
