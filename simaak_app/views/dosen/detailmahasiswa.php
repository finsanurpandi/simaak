Content Wrapper. Contains page content -->
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

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$mhs['nama']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            <div class="row">
				<div class="col-md-2 text-center">
                <?php
                  if ($mhs['image'] == null) {
                    if ($user['jenis_kelamin'] == 'L') {
                      echo "<img src='".base_url('assets/img/profiles/default_male.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                    } else {
                      echo "<img src='".base_url('assets/img/profiles/default_female.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                    };
                  } else {
                  ?>
                    <img src="<?=base_url('assets/img/profiles/'.$mhs['image'])?>" class="profile-user-img img-responsive img-circle" alt="User Image">
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

		              <strong>Program Studi</strong>
		              <p class="text-muted">
		                <?=$mhs['jenjang'].' '.$mhs['kode_prodi']?>
		              </p>

		              <strong>Angkatan</strong>
		              <p class="text-muted">
		                <?=$mhs['angkatan']?>
		              </p>
          

			</div>			
			</div>

              

              <hr>
              
              <!-- CONTENT HERE -->

			<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#transkrip" data-toggle="tab">Transkrip Nilai</a></li>
                  <li><a href="#alamat" data-toggle="tab">Alamat</a></li>
                  <li><a href="#orangtua" data-toggle="tab">Orang Tua</a></li>
                  <li><a href="#wali" data-toggle="tab">Wali</a></li>
                  <li><a href="#kebutuhankhusus" data-toggle="tab">Kebutuhan Khusus</a></li>
                </ul>
                <div class="tab-content">

                <div class="tab-pane active" id="transkrip">
                    <!-- Post -->
                    <div class="alert alert-info">
                      Nilai Mahasiswa
                    </div>    

                </div>

                  <div class="tab-pane" id="alamat">
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
                          <td><strong>Jenis Tinggal</strong></td>
                          <td><?=$alamat['jenis_tinggal']?></td>
                        </tr>
                        <tr>
                          <td><strong>Alat Transportasi</strong></td>
                          <td><?=$alamat['alat_transportasi']?></td>
                        </tr>
                        <tr>
                          <td><strong>Telepon</strong></td>
                          <td><?=$alamat['telepon']?></td>
                        </tr>
                        <tr>
                          <td><strong>HP</strong></td>
                          <td><?=$alamat['hp']?></td>
                        </tr>
                        <tr>
                          <td><strong>Email</strong></td>
                          <td><?=$alamat['email']?></td>
                        </tr>
                        <tr>
                          <td><strong>Penerima KPS?</strong></td>
                          <td><?=$alamat['penerima_kps']?></td>
                        </tr>
                        <tr>
                          <td><strong>No KPS</strong></td>
                          <td><?=$alamat['no_kps']?></td>
                        </tr>

                      </tbody>
                    </table>

                  </div>

                  <div class="tab-pane" id="orangtua">
                    <!-- Post -->
                    <table class="table">
                      <tbody>
                        <tr>
                          <td><strong>Nama Ayah</strong></td>
                          <td>Nama Ayah</td>
                        </tr>
                        <tr>
                          <td><strong>Nama Ibu</strong></td>
                          <td>Nama Ibu</td>
                        </tr>
                        <tr>
                          <td><strong>Alamat Tinggal</strong></td>
                          <td>Cianjur</td>
                        </tr>
                      </tbody>
                    </table>

                  </div>

                  <div class="tab-pane" id="pengajaran">
<!-- CONTENT TAB PENGAJARAN -->                    

<!-- END OF CONTENT TAB PENGAJARAN -->
                  </div> <!-- END DIV TAB PENDIDIKAN -->

                </div>

              </div>	

              <!-- END OF CONTENT -->

<a href="<?=base_url('dosen/mahasiswa')?>" class="btn btn-primary btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper