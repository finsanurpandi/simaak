<!--Content Wrapper. Contains page content -->
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
                  <li class="active"><a href="#profil" data-toggle="tab">Profil</a></li>
                  <li><a href="#orangtua" data-toggle="tab">Orang Tua</a></li>
                  <li><a href="#transkrip" data-toggle="tab">Transkrip Nilai</a></li>
                </ul>
                <div class="tab-content">

                <div class="tab-pane" id="transkrip">
                    <!-- Post -->  

<table class="table table-hover">
  <thead>
    <tr>
      <th>NO.</th>
      <th>MATA KULIAH</th>
      <th>KODE</th>
      <th>SKS</th>
      <th>NILAI</th>
    </tr>
  </thead>
  <tbody>

<?php
$i = 1;
$totalsks = 0;
$ip = 0;
foreach ($nilai as $key => $value) {
?>

  <tr>
    <td><?=$i?></td>
    <td><?=$value['nama_matkul']?></td>
    <td><?=$value['kode_matkul']?></td>
    <td><?=$value['sks']?></td>
    <td>
<?php
if (!empty($value['nilai'])) {
  
    switch ($value['nilai']) {
      case 4:
        $ip += ($value['nilai']*$value['sks']);
        echo 'A';
        break;
      case 3.5:
        $ip += ($value['nilai']*$value['sks']);
        echo 'AB';
        break;
      case 3:
        $ip += ($value['nilai']*$value['sks']);
        echo 'B';
        break;
      case 2.5:
        $ip += ($value['nilai']*$value['sks']);
        echo 'BC';
        break;
      case 2:
        $ip += ($value['nilai']*$value['sks']);
        echo 'C';
        break;
      case 1.5:
        $ip += ($value['nilai']*$value['sks']);
        echo 'CD';
        break;
      case 1:
        $ip += ($value['nilai']*$value['sks']);
        echo 'D';
        break;
      case 0.5:
        $ip += ($value['nilai']*$value['sks']);
        echo 'DE';
        break;
      case 0:
        $ip += ($value['nilai']*$value['sks']);
        echo 'E';
        break;
      case -1:
        $ip += 0;
        echo 'T';
        break;
      default:
        $ip += 0;
        break;
    }
}    

    ?>
    </td>
  </tr>

<?php
$totalsks += $value['sks'];
$i++;
}
@$totalip = $ip/$totalsks;
?>

  </tbody>
</table>
<hr/>
<p>
  Jumlah SKS : 
  <strong><?=$totalsks?></strong>
</p>

<p>
  IPK : 
  <strong><?=round($totalip, 2)?></strong>
</p>  

                </div>


                  <div class="tab-pane" id="orangtua">
                    <!-- Post -->
<div class="table-responsive">
<table class="table table-hover">
  <tr>
    <th>Nama Ibu</th>
    <th>Tempat, Tanggal Lahir</th>
    <th>Pendidikan</th>
    <th>Pekerjaan</th>
    <th>Pendapatan</th>
    <th>Alamat</th>
    <th>Telepon</th>
  </tr>
  <tr>
    <td><?=$ortu['ibu_nama']?></td>
    <td><?=$ortu['ibu_ttl']?></td>
    <td><?=$ortu['ibu_pendidikan']?></td>
    <td><?=$ortu['ibu_pekerjaan']?></td>
    <td><?=$ortu['ibu_pendapatan']?></td>
    <td><?=$ortu['ibu_alamat']?></td>
    <td><?=$ortu['ibu_tlp']?></td>
  </tr>
</table>

<br/>

<table class="table table-hover">
  <tr>
    <th>Nama Ayah</th>
    <th>Tempat, Tanggal Lahir</th>
    <th>Pendidikan</th>
    <th>Pekerjaan</th>
    <th>Pendapatan</th>
    <th>Alamat</th>
    <th>Telepon</th>
  </tr>
  <tr>
    <td><?=$ortu['ayah_nama']?></td>
    <td><?=$ortu['ayah_ttl']?></td>
    <td><?=$ortu['ayah_pendidikan']?></td>
    <td><?=$ortu['ayah_pekerjaan']?></td>
    <td><?=$ortu['ayah_pendapatan']?></td>
    <td><?=$ortu['ayah_alamat']?></td>
    <td><?=$ortu['ayah_tlp']?></td>
  </tr>
</table>
  
</div>

                  </div>

                  <div class="tab-pane active" id="profil">
<!-- CONTENT TAB PENGAJARAN -->                    
<table class="table table-hover">
  <tr>
    <th>NPM</th>
    <td><?=$profil['nim']?></td>
  </tr>
  <tr>
    <th>NIK</th>
    <td><?=$profil['nik']?></td>
  </tr>
  <tr>
    <th>Alamat Lengkap</th>
    <td><?=$profil['alamat_lengkap']?></td>
  </tr>
  <tr>
    <th>Golongan Darah</th>
    <td><?=$profil['golongan_darah']?></td>
  </tr>
  <tr>
    <th>no_tlp</th>
    <td><?=$profil['no_tlp']?></td>
  </tr>
  <tr>
    <th>email</th>
    <td><?=$profil['email']?></td>
  </tr>
  <tr>
    <th>Asal Sekolah</th>
    <td><?=$profil['asal_sekolah']?></td>
  </tr>
  <tr>
    <th>Nomor Induk</th>
    <td><?=$profil['nomor_induk']?></td>
  </tr>

</table>
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