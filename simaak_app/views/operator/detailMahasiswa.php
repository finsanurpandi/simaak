<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url('operator/mahasiswa')?>">Mahasiswa</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">


<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#info" data-toggle="tab">Profil</a></li>
                  <li><a href="#alamat" data-toggle="tab">Informasi Lainnya</a></li>
                  <li><a href="#orangtua" data-toggle="tab">Orang Tua</a></li>
                  <li><a href="#dokumen" data-toggle="tab">Dokumen</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="info">
<?php
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
<!-- CONTENT TAB INFO -->
<form method="post" class="form-horizontal">

  <div class="form-group">
    <label for="nim" class="col-sm-2 control-label">NPM</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nim" id="nim" value="<?=$mhs['nim']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nama" id="nama" value="<?=$mhs['nama']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="angkatan" class="col-sm-2 control-label">Angkatan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="angkatan" id="angkatan" value="<?=$mhs['angkatan']?>">
    </div>
  </div>

   <div class="form-group">
    <label for="kelas" class="col-sm-2 control-label">Kelas</label>
    <div class="col-sm-6">
      <select class="form-control" name="kelas" id="kelasmhs">
<?php
if ($mhs['kelas'] == 'A') {
?>
        <option value="A" selected="true">A</option>
        <option value="B">B</option>
        <option value="C">C</option>

<?php } elseif ($mhs['kelas'] == 'B') {
?>

        <option value="A">A</option>
        <option value="B" selected="true">B</option>
        <option value="C">C</option>

<?php } elseif ($mhs['kelas'] == 'C') {
?>

        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C" selected="true">C</option>

<?php } elseif (empty($mhs['kelas'])) {
?>

        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>

<?php } ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="jenjang" class="col-sm-2 control-label">Jenjang</label>
    <div class="col-sm-6">
      <select class="form-control" name="jenjang" id="jenjang">
        <option value="S1">S1</option>
        <option value="S2">S2</option>
      </select>
    </div>
  </div>

  <!-- <div class="form-group">
    <label for="prodi" class="col-sm-2 control-label">Prodi</label>
    <div class="col-sm-6">
      <select class="form-control" name="prodi" id="prodi">
              <?php
                foreach ($prodi as $key => $value) {
              ?>
                <option value="<?=$value['prodi']?>"><?=$value['prodi']?></option>
              <?php
                  }
              ?>
      </select>
    </div>
  </div> -->

  <div class="form-group">
    <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
    <div class="col-sm-6">
      <label class="radio-inline">
        <input type="radio" name="jenis_kelamin" id="lakilaki" value="L"> Laki-Laki
      </label>
      <label class="radio-inline">
        <input type="radio" name="jenis_kelamin" id="perempuan" value="P"> Perempuan
      </label>
    </div>
  </div>

  <div class="form-group">
    <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="tempat_lahir" id="nim" value="<?=$mhs['tempat_lahir']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="col-sm-6">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
         <input type="date" class="form-control" name="tanggal_lahir" id="nim" value="<?=$mhs['tanggal_lahir']?>">
        </div>
      <!-- <input type="date" class="form-control" name="tanggal_lahir" id="nim" value="<?=$mhs['tanggal_lahir']?>"> -->
    </div>
  </div>

  <div class="form-group">
    <label for="dosen_wali" class="col-sm-2 control-label">Dosen Wali</label>
    <div class="col-sm-6">
      <select class="form-control" name="dosen_wali" id="dosen">
              <?php
                foreach ($dosen as $key => $value) {
                  if ($value['gelar_depan'] == null) {
              ?>
                <option value="<?=$value['nidn']?>"><?=$value['nidn'].' - '.$value['nama'].', '.$value['gelar_belakang']?></option>
              <?php
                  } else {
              ?>
                <option value="<?=$value['nidn']?>"><?=$value['nidn'].' - '.$value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang']?></option>
              <?php
                  }
              ?>

              
              <?php } ?>
      </select>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
      <button type="submit" name="submit" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Update</button>
    </div>
  </div>
</form>

<!-- END OF TAB INFO -->
                  </div>

                  <div class="tab-pane" id="alamat">
<!-- CONTENT TAB ALAMAT -->                    
<form method="post" class="form-horizontal">

  <div class="form-group">
    <label for="nim" class="col-sm-2 control-label">NIK</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nik" value="<?=$profil['nik']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Alamat Lengkap</label>
    <div class="col-sm-6">
      <textarea class="form-control" name="alamat_lengkap"><?=$profil['alamat_lengkap']?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="angkatan" class="col-sm-2 control-label">Golongan Darah</label>
    <div class="col-sm-6">
      <select class="form-control" name="golongan_darah">
<?php
  if ($profil['golongan_darah'] == 'A') {
?>        

<option value="A" selected="true">A</option>
<option value="B">B</option>
<option value="AB">AB</option>
<option value="O">O</option>

<?php
} elseif ($profil['golongan_darah'] == 'B') {
?>

<option value="A">A</option>
<option value="B" selected="true">B</option>
<option value="AB">AB</option>
<option value="O">O</option>

<?php
} elseif ($profil['golongan_darah'] == 'AB') {
?>

<option value="A">A</option>
<option value="B">B</option>
<option value="AB" selected="true">AB</option>
<option value="O">O</option>

<?php
} elseif ($profil['golongan_darah'] == 'O') {
?>

<option value="A">A</option>
<option value="B">B</option>
<option value="AB">AB</option>
<option value="O" selected="true">O</option>

<?php } ?>

      </select>
    </div>
  </div>

   <div class="form-group">
    <label for="kelas" class="col-sm-2 control-label">No Tlp/HP</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="no_tlp" value="<?=$profil['no_tlp']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="jenjang" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="email" value="<?=$profil['email']?>">
    </div>
  </div>


  <div class="form-group">
    <label for="jenis_kelamin" class="col-sm-2 control-label">Asal Sekolah</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="asal_sekolah" value="<?=$profil['asal_sekolah']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="tempat_lahir" class="col-sm-2 control-label">Nomor Induk Siswa Nasional</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nomor_induk" value="<?=$profil['nomor_induk']?>">
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit_profil" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Update</button>
    </div>
  </div>
</form>
<!-- END OF CONTENT TAB ALAMAT -->
                  </div> <!-- END DIV TAB ALAMAT -->

                  <div class="tab-pane" id="orangtua">
<!-- CONTENT TAB ORANGTUA -->                    
<form method="post" class="form-horizontal">
<h3>Informasi Ibu</h3>

  <div class="form-group">
    <label for="nim" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_nama" value="<?=$ortu['ibu_nama']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Tempat, Tanggal-Lahir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_ttl" value="<?=$ortu['ibu_ttl']?>">
    </div>
  </div>

   <div class="form-group">
    <label for="kelas" class="col-sm-2 control-label">Pendidikan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_pendidikan" value="<?=$ortu['ibu_pendidikan']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="jenjang" class="col-sm-2 control-label">Pekerjaan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_pekerjaan" value="<?=$ortu['ibu_pekerjaan']?>">
    </div>
  </div>


  <div class="form-group">
    <label for="jenis_kelamin" class="col-sm-2 control-label">Pendapatan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_pendapatan" value="<?=$ortu['ibu_pendapatan']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="tempat_lahir" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-6">
    <textarea class="form-control" name="ibu_alamat"><?=$ortu['ibu_alamat']?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="tempat_lahir" class="col-sm-2 control-label">No Tlp</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_tlp" value="<?=$ortu['ibu_tlp']?>">
    </div>
  </div>

<hr/>

<h3>Informasi Ayah</h3>

  <div class="form-group">
    <label for="nim" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_nama" value="<?=$ortu['ayah_nama']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Tempat, Tanggal-Lahir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_ttl" value="<?=$ortu['ayah_ttl']?>">
    </div>
  </div>

   <div class="form-group">
    <label for="kelas" class="col-sm-2 control-label">Pendidikan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_pendidikan" value="<?=$ortu['ayah_pendidikan']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="jenjang" class="col-sm-2 control-label">Pekerjaan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_pekerjaan" value="<?=$ortu['ayah_pekerjaan']?>">
    </div>
  </div>


  <div class="form-group">
    <label for="jenis_kelamin" class="col-sm-2 control-label">Pendapatan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_pendapatan" value="<?=$ortu['ayah_pendapatan']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="tempat_lahir" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-6">
    <textarea class="form-control" name="ayah_alamat"><?=$ortu['ayah_alamat']?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="tempat_lahir" class="col-sm-2 control-label">No Tlp</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_tlp" value="<?=$ortu['ayah_tlp']?>">
    </div>
  </div>
  
<hr/>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
      <button type="submit" name="submit_ortu" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Update</button>
    </div>
  </div>
</form>
<!-- END OF CONTENT TAB ORANGTUA -->
                  </div> <!-- END DIV TAB ORANGTUA -->

                  <div class="tab-pane" id="dokumen">
<!-- CONTENT TAB WALI -->                    
<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama Dokumen</th>
      <th>File</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Pas Photo</td>
      <td><?=$dokumen['pas_photo']?></td>
      <td>
        <a href="<?=base_url('assets/uploads/documents/mahasiswa/').$dokumen['pas_photo']?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-photo"></i> view</a>
        <a href="<?=base_url('operator/dl_dokumen/').$this->encrypt->encode($dokumen['pas_photo'])?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-download"></i> download</a>
      </td>
    </tr>
    <tr>
      <td>2</td>
      <td>Ijazah</td>
      <td><?=$dokumen['ijazah']?></td>
      <td>
        <a href="<?=base_url('assets/uploads/documents/mahasiswa/').$dokumen['ijazah']?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-photo"></i> view</a>
        <a href="<?=base_url('operator/dl_dokumen/').$this->encrypt->encode($dokumen['ijazah'])?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-download"></i> download</a>
      </td>
    </tr>

  </tbody>
</table>
<!-- END OF CONTENT TAB WALI -->
                  </div> <!-- END DIV TAB WALI -->


                </div>

              </div>  <!-- END OF TABS -->
<a href="<?=base_url('operator/mahasiswa')?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<script type="text/javascript">

// JENIS KELAMIN
  var laki = document.getElementById('lakilaki');
  var pere = document.getElementById('perempuan');

  if (laki.value == "<?=$mhs['jenis_kelamin']?>") {
    laki.setAttribute('checked', 'true');
  } else {
    pere.setAttribute('checked', 'true');
  };


// JENJANG
var jenjang = document.getElementById('jenjang');

for (var i = 0; i < jenjang.options.length; i++) {
  if (jenjang.options[i].value == "<?=$mhs['jenjang']?>") {
    jenjang.options[i].setAttribute('selected', 'true');   
  };
};



// DOSEN WALI
  var dosen = document.getElementById('dosen');

  for (var i = 0; i < dosen.options.length; i++) {
    if (dosen.options[i].value == "<?=$mhs['nidn']?>") {
      dosen.options[i].setAttribute('selected', 'true');
    };
  };

  

</script>



