<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil Mahasiswa
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
              <h3 class="box-title"><?=$user['nama']?></h3>
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


			</div>			
			</div>

              

              <hr>
              
              <!-- CONTENT HERE -->

			<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#profilmhs" data-toggle="tab">Profil</a></li>
                  <li><a href="#orangtua" data-toggle="tab">Orang Tua</a></li>
                  <li><a href="#upload" data-toggle="tab">Upload</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="profilmhs">
<?php
if ($this->session->mhs_profil !== false) {
                  
  if (@$this->session->flashdata('success') == true) {
?>
    <div class="alert alert-success">Data berhasil diupdate!
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
                          <td><strong>NIK</strong></td>
                          <td><?=$profil['nik']?></td>
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

                    <?php } else {
                    ?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">

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
      <button type="submit" name="submit_profil" class="btn btn-success btn-sm">Update</button>
    </div>
  </div>


</form>
                    <?php
                    }
                    ?>
                  </div>

                  <div class="tab-pane" id="orangtua">
                    <!-- Post -->
<?php
if ($this->session->mhs_ortu !== FALSE) {
                  
  if (@$this->session->flashdata('success') == true) {
?>
    <div class="alert alert-success">Data berhasil diupdate!
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
                          <td><strong>Nama Ibu</strong></td>
                          <td><?=$ortu['ibu_nama']?></td>
                        </tr>
                        
                        <tr>
                          <td><strong>Tempat, Tgl. Lahir</strong></td>
                          <td><?=$ortu['ibu_ttl']?></td>
                        </tr>

                        <tr>
                          <td><strong>Pendidikan Terakhir</strong></td>
                          <td><?=$ortu['ibu_pendidikan']?></td>
                        </tr>

                        <tr>
                          <td><strong>Pekerjaan</strong></td>
                          <td><?=$ortu['ibu_pekerjaan']?></td>
                        </tr>

                        <tr>
                          <td><strong>Pendapatan/Bulan</strong></td>
                          <td><?=$ortu['ibu_pendapatan']?></td>
                        </tr>

                        <tr>
                          <td><strong>Alamat</strong></td>
                          <td><?=$ortu['ibu_alamat']?></td>
                        </tr>

                        <tr>
                          <td><strong>No Tlp/HP</strong></td>
                          <td><?=$ortu['ibu_tlp']?></td>
                        </tr>

                        <tr>
                          <td><strong></strong></td>
                          <td></td>
                        </tr>


                        <tr>
                          <td><strong>Nama Ayah</strong></td>
                          <td><?=$ortu['ayah_nama']?></td>
                        </tr>
                        
                        <tr>
                          <td><strong>Tempat, Tgl. Lahir</strong></td>
                          <td><?=$ortu['ayah_ttl']?></td>
                        </tr>

                        <tr>
                          <td><strong>Pendidikan Terakhir</strong></td>
                          <td><?=$ortu['ayah_pendidikan']?></td>
                        </tr>

                        <tr>
                          <td><strong>Pekerjaan</strong></td>
                          <td><?=$ortu['ayah_pekerjaan']?></td>
                        </tr>

                        <tr>
                          <td><strong>Pendapatan/Bulan</strong></td>
                          <td><?=$ortu['ayah_pendapatan']?></td>
                        </tr>

                        <tr>
                          <td><strong>Alamat</strong></td>
                          <td><?=$ortu['ayah_alamat']?></td>
                        </tr>

                        <tr>
                          <td><strong>No Tlp/HP</strong></td>
                          <td><?=$ortu['ayah_tlp']?></td>
                        </tr>

                      </tbody>
                    </table>

                    <?php } else {
                    ?>

<form method="post" class="form-horizontal">

  <div class="form-group required">
    <label for="ibu_nama" class="col-sm-2 control-label">Nama Ibu</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_nama" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ibu_ttl" class="col-sm-2 control-label">Tempat, Tanggal. Lahir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_ttl" placeholder="Kota, dd/mm/yyyy" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ibu_pendidikan" class="col-sm-2 control-label">Pendidikan Terakhir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_pendidikan" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ibu_pekerjaan" class="col-sm-2 control-label">Pekerjaan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_pekerjaan" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ibu_pendapatan" class="col-sm-2 control-label">Pendapatan/Bulan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_pendapatan" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ibu_alamat" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-6">
      <textarea name="ibu_alamat" rows="3" class="form-control"></textarea>
    </div>
  </div>

  <div class="form-group required">
    <label for="ibu_no_tlp" class="col-sm-2 control-label">No. Tlp/HP</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_no_tlp" required>
    </div>
  </div>

  <hr/>

  <div class="form-group required">
    <label for="ayah_nama" class="col-sm-2 control-label">Nama Ayah</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_nama" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ayah_ttl" class="col-sm-2 control-label">Tempat, Tanggal. Lahir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_ttl" placeholder="Kota, dd/mm/yyyy" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ayah_pendidikan" class="col-sm-2 control-label">Pendidikan Terakhir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_pendidikan" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ayah_pekerjaan" class="col-sm-2 control-label">Pekerjaan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_pekerjaan" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ayah_pendapatan" class="col-sm-2 control-label">Pendapatan/Bulan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_pendapatan" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ayah_alamat" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-6">
      <textarea name="ayah_alamat" rows="3" class="form-control"></textarea>
    </div>
  </div>

  <div class="form-group required">
    <label for="ayah_no_tlp" class="col-sm-2 control-label">No. Tlp/HP</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_no_tlp" required>
    </div>
  </div>

  

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit_profil" class="btn btn-success btn-sm">Update</button>
    </div>
  </div>


</form>
                    <?php
                    }
                    ?>

                  </div>

                   <div class="tab-pane" id="upload">
                    <!-- Post -->
<form class="form-horizontal" method="post" action="<?=base_url()?>mahasiswa/editPicture" enctype="multipart/form-data">

  <div class="form-group required">
    <label for="pas_photo" class="col-sm-2 control-label">Pas Photo</label>
    <div class="col-sm-6">
      <input class="form-control" type="file" name="pas_photo" id="pas_photo">
      <button type="submit" name="submit_profil" class="btn btn-success btn-sm">Upload</button>
    </div>
  </div>

  <div class="form-group required">
    <label for="ijazah" class="col-sm-2 control-label">Ijazah</label>
    <div class="col-sm-6">
      <input class="form-control" type="file" name="ijazah" id="ijazah">
      <button type="submit" name="submit_profil" class="btn btn-success btn-sm">Upload</button>
    </div>
  </div>
            
</form>


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
  <!-- /.content-wrapper -->
  
