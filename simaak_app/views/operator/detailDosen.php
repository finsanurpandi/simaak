<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url('operator/dosen')?>">Dosen</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">

<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#info" data-toggle="tab">Informasi Dasar</a></li>
                  <li><a href="#alamat" data-toggle="tab">Alamat</a></li>
                  <li><a href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
                  <li><a href="#penelitian" data-toggle="tab">Penelitian</a></li>
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
    <label for="nidn" class="col-sm-2 control-label">NIDN</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nidn" id="nidn" value="<?=$dosen['nidn']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="nik" class="col-sm-2 control-label">NIK</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nik" id="nik" value="<?=$dosen['nik']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nama" id="nama" value="<?=$dosen['nama']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="gelar_depan" class="col-sm-2 control-label">Gelar Depan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="gelar_depan" id="gelar_depan" value="<?=$dosen['gelar_depan']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="gelar_belakang" class="col-sm-2 control-label">Gelar Belakang</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="gelar_belakang" id="gelar_belakang" value="<?=$dosen['gelar_belakang']?>">
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
    <label for="jabatan_fungsional" class="col-sm-2 control-label">Jabatan Fungsional</label>
    <div class="col-sm-6">
      <select class="form-control" name="jabatan_fungsional" id="jabatan_fungsional" onchange="checkGolongan();">
              <?php
                foreach ($jabfung as $key => $value) {
              ?>
                <option value="<?=$value['jabatan_fungsional']?>"><?=$value['jabatan_fungsional']?></option>
              <?php
                  }
              ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="golongan" class="col-sm-2 control-label">Golongan</label>
    <div class="col-sm-6">
      <select class="form-control" name="golongan" id="golongan">
              <?php
                foreach ($golongan as $key => $value) {
              ?>
                <option value="<?=$value['golongan']?>"><?=$value['golongan']?></option>
              <?php
                  }
              ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="jabatan_struktural" class="col-sm-2 control-label">Jabatan Struktura;</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="jabatan_struktural" id="jabatan_struktural" value="<?=$dosen['jabatan_struktural']?>">
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <a href="<?=base_url('operator/dosen')?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
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

                  <div class="tab-pane" id="pendidikan">
<!-- CONTENT TAB PENDIDIKAN -->                    

<!-- END OF CONTENT TAB PENDIDIKAN -->
                  </div> <!-- END DIV TAB PENDIDIKAN -->

                  <div class="tab-pane" id="penelitian">
<!-- CONTENT TAB PENELITIAN -->                    

<!-- END OF CONTENT TAB PENELITIAN -->
                  </div> <!-- END DIV TAB PENELITIAN -->


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

  if (laki.value == "<?=$dosen['jenis_kelamin']?>") {
    laki.setAttribute('checked', 'true');
  } else {
    pere.setAttribute('checked', 'true');
  };


// PROGRAM STUDI
var prodi = document.getElementById('prodi');

for (var i = 0; i < prodi.options.length; i++) {
  if (prodi.options[i].value == "<?=$dosen['prodi']?>") {
    prodi.options[i].setAttribute('selected', 'true');   
  };
};

// JABATAN FUNGSIONAL
var jabfung = document.getElementById('jabatan_fungsional');

for (var i = 0; i < jabfung.options.length; i++) {
  if (jabfung.options[i].value == "<?=$dosen['jabatan_fungsional']?>") {
    jabfung.options[i].setAttribute('selected', 'true');   
  };
};

// GOLONGAN
var golongan = document.getElementById('golongan');

for (var i = 0; i < golongan.options.length; i++) {
  if (golongan.options[i].value == "<?=$dosen['golongan']?>") {
    golongan.options[i].setAttribute('selected', 'true');   
  };
};

var baseurl = "<?=base_url()?>";
var vGolongan = "<?=$dosen['golongan']?>";


  

</script>



