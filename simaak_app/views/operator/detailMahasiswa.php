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
        <li class="active">Edit</li>
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
            
<!-- <div class="alert alert-info">Informasi Dasar</div> -->

<!-- <form method="post" class="form-horizontal">

  <div class="form-group">
    <label for="nim" class="col-sm-2 control-label">NIM</label>
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
    <label for="jenjang" class="col-sm-2 control-label">Jenjang</label>
    <div class="col-sm-6">
      <select class="form-control" name="jenjang" id="jenjang">
              <?php
                foreach ($jenjang as $key => $value) {
              ?>
                <option value="<?=$value['jenjang']?>"><?=$value['jenjang']?></option>
              <?php
                  }
              ?>
      </select>
    </div>
  </div>

  <div class="form-group">
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
  </div>

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
      <input type="date" class="form-control" name="tanggal_lahir" id="nim" value="<?=$mhs['tanggal_lahir']?>">
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
      <a href="<?=base_url('operator/mahasiswa')?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
      <button type="submit" name="submit" class="btn btn-success btn-sm">Update</button>
    </div>
  </div>
</form> -->


<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#info" data-toggle="tab">Informasi Dasar</a></li>
                  <li><a href="#alamat" data-toggle="tab">Alamat</a></li>
                  <li><a href="#orangtua" data-toggle="tab">Orang Tua</a></li>
                  <li><a href="#wali" data-toggle="tab">Wali</a></li>
                  <li><a href="#kebutuhankhusus" data-toggle="tab">Kebutuhan Khusus</a></li>
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
    <label for="nim" class="col-sm-2 control-label">NIM</label>
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
    <label for="jenjang" class="col-sm-2 control-label">Jenjang</label>
    <div class="col-sm-6">
      <select class="form-control" name="jenjang" id="jenjang">
              <?php
                foreach ($jenjang as $key => $value) {
              ?>
                <option value="<?=$value['jenjang']?>"><?=$value['jenjang']?></option>
              <?php
                  }
              ?>
      </select>
    </div>
  </div>

  <div class="form-group">
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
  </div>

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
      <input type="date" class="form-control" name="tanggal_lahir" id="nim" value="<?=$mhs['tanggal_lahir']?>">
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
      <a href="<?=base_url('operator/mahasiswa')?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
      <button type="submit" name="submit" class="btn btn-success btn-sm">Update</button>
    </div>
  </div>
</form>
<!-- END OF TAB INFO -->
                  </div>

                  <div class="tab-pane" id="alamat">
<!-- CONTENT TAB ALAMAT -->                    

<!-- END OF CONTENT TAB ALAMAT -->
                  </div> <!-- END DIV TAB ALAMAT -->

                  <div class="tab-pane" id="orangtua">
<!-- CONTENT TAB ORANGTUA -->                    

<!-- END OF CONTENT TAB ORANGTUA -->
                  </div> <!-- END DIV TAB ORANGTUA -->

                  <div class="tab-pane" id="wali">
<!-- CONTENT TAB WALI -->                    

<!-- END OF CONTENT TAB WALI -->
                  </div> <!-- END DIV TAB WALI -->

                  <div class="tab-pane" id="kebutuhankhusus">
<!-- CONTENT TAB KEBUTUHAN KHUSUS -->                    

<!-- END OF CONTENT TAB KEBUTUHAN KHUSUS -->
                  </div> <!-- END DIV TAB KEBUTUHAN KHUSUS -->

                </div>

              </div>  <!-- END OF TABS -->

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


// PROGRAM STUDI
var prodi = document.getElementById('prodi');

for (var i = 0; i < prodi.options.length; i++) {
  if (prodi.options[i].value == "<?=$mhs['prodi']?>") {
    prodi.options[i].setAttribute('selected', 'true');   
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



