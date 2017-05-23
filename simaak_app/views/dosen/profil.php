<!--Content Wrapper. Contains page content -->
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

				<!-- <div class="col-md-10">
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


			</div>	 -->		
			</div>

              

              <hr>
              
              <!-- CONTENT HERE -->

			<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#identitas" data-toggle="tab">Identitas Dosen</a></li>
                  <li><a href="#pendidikan" data-toggle="tab">Riwayat Pendidikan</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="identitas">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td><strong>NIK</strong></td>
                          <td><?=$user['nik']?></td>
                        </tr>
                        <tr>
                          <td><strong>NIDN</strong></td>
                          <td><?=$user['nidn']?></td>
                        </tr>
                        <tr>
                          <td><strong>Nama</strong></td>
                          <td>
<?php
if (!empty($user['gelar_depan'])) {
  echo $user['gelar_depan'].'. '.$user['nama'].', '.$user['gelar_belakang'];
} else {
  echo $user['nama'].', '.$user['gelar_belakang'];
}

?>
                          </td>
                        </tr>
                        <tr>
                          <td><strong>Nama PT</strong></td>
                          <td>Universitas Suryakancana</td>
                        </tr>
                        <tr>
                          <td><strong>Alamat PT</strong></td>
                          <td>Jl. Pasir Gede Raya</td>
                        </tr>
                        <tr>
                          <td><strong>Fakultas / Prog.Studi</strong></td>
                          <td>
<?php
if ($user['kode_prodi'] == 'MPI') {
  echo "Manajemen Pendidikan Islam";
} elseif ($user['kode_prodi'] == 'ES') {
  echo "Ekonomi Syariah";
} elseif ($user['kode_prodi'] == 'PBS') {
  echo "Perbankan Syariah";
}
?>
                          </td>
                        </tr>
                        <tr>
                          <td><strong>Jenis Dosen</strong></td>
                          <td>
<?php
$jenis = $user['jenis_dosen'];
switch ($jenis) {
  case 'PR':
    echo 'Profesor';
    break;
  case 'DT':
    echo 'Dosen Dengan Tugas Tambahan';
    break;
  case 'PT':
    echo 'Profesor Dengan Tugas Tambahan';
    break;
  default:
    echo 'Dosen Biasa';
    break;
}
?>
                          </td>
                        </tr>
                        <tr>
                          <td><strong>Jabatan Fungsional - Golongan</strong></td>
                          <td><?=$user['jabatan_fungsional'].' - '.$user['golongan']?></td>
                        </tr>
                        <tr>
                          <td><strong>Tanggal Lahir</strong></td>
                          <td><?=$user['tgl_lahir']?></td>
                        </tr>

                        <tr>
                          <td><strong>Tempat Lahir</strong></td>
                          <td><?=$user['tempat_lahir']?></td>
                        </tr>

                        <tr>
                          <td><strong>No. HP</strong></td>
                          <td><?=$user['no_hp']?></td>
                        </tr>

                        <tr>
                          <td><strong>Email</strong></td>
                          <td><?=$user['email']?></td>
                        </tr>

                      </tbody>
                    </table>

                  </div>

                  <div class="tab-pane" id="pendidikan">
                    <!-- Post -->
<button id="btnTambahPendidikanDosen" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataPendidikanDosenModal" data-nidn="<?=$this->session->username?>"><i class="fa fa-user-plus"></i> Tambah Data</button>                   
<div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenjang</th>
                          <th>Perguruan Tinggi</th>
                          <th>Fakultas</th>
                          <th>Program Studi</th>
                          <th>IPK</th>
                          <th>Gelar</th>
                          <th>Tahun Lulus</th>
                          <th>Ijazah</th>
                          <th>Transkrip</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
$i = 1;
foreach ($pendidikan as $value) {
?>
<tr>
  <td><?=$i?></td>
  <td><?=$value['jenjang']?></td>
  <td><?=$value['perguruan_tinggi']?></td>
  <td><?=$value['fakultas']?></td>
  <td><?=$value['program_studi']?></td>
  <td><?=$value['ipk']?></td>
  <td><?=$value['gelar']?></td>
  <td><?=$value['tahun_lulus']?></td>
  <td>
  <?php
    if ($value['ijazah'] == null) {
?>
    <button type="button" id="btnTambahIjazahDosen" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahIjazahModal" data-id="<?=$value['id']?>"><i class='fa fa-plus'></i> Tambah</button>
<?php   } else {
    echo "<a href='".base_url('assets/uploads/documents/dosen/').$value['ijazah']."' target='_blank' class='btn btn-primary btn-xs'><i class='fa fa-image'></i></a>";
?>
    <button type="button" id="btnEditIjazahDosen" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#editIjazahModal" data-id="<?=$value['id']?>" data-img="<?=$value['ijazah']?>"><i class="fa fa-pencil"></i></button>
<?php    }
?>
  </td>

  <td>
  <?php
    if ($value['transkrip'] == null) {
?>
    <button type="button" id="btnTambahTranskripDosen" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahTranskripModal" data-id="<?=$value['id']?>"><i class="fa fa-plus"></i> Tambah</button>
<?php   } else {
    echo "<a href='".base_url('assets/uploads/documents/dosen/').$value['transkrip']."' target='_blank' class='btn btn-primary btn-xs'><i class='fa fa-image'></i></a>";
?>
    <button type="button" id="btnEditTranskripDosen" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#editTranskripModal" data-id="<?=$value['id']?>" data-img="<?=$value['transkrip']?>"><i class="fa fa-pencil"></i></button>
<?php    }
?>
  </td>

  <td></td>
  <td>
    <button type="button" id="btnEditPendidikanDosen" class="btn btn-success btn-xs" 
  data-toggle="modal" 
  data-target="#editPendidikanDosenModal"
  data-id="<?=$value['id']?>"
  data-jenjang="<?=$value['jenjang']?>"
  data-perguruantinggi="<?=$value['perguruan_tinggi']?>"
  data-fakultas="<?=$value['fakultas']?>"
  data-programstudi="<?=$value['program_studi']?>"
  data-ipk="<?=$value['ipk']?>"
  data-gelar="<?=$value['gelar']?>"
  data-tahunlulus="<?=$value['tahun_lulus']?>">
      <i class="fa fa-pencil"></i>
    </button>
  <button type="button" id="btnHapusDataPendidikanDosen" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapusDataPendidikan" data-id="<?=$value['id']?>"><i class="fa fa-remove"></i></button>
  </td>
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