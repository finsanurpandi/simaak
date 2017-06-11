<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, 
        <?php
          if ($user['gelar_depan'] !== '') {
            echo $user['gelar_depan'].' '.$user['nama'].', '.$user['gelar_belakang'];
          } else {
            echo $user['nama'].', '.$user['gelar_belakang'];
          }
        ?>
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

  <!-- <div class="form-group">
    <label for="nidn" class="col-sm-2 control-label">NIDN</label>
    <div class="col-sm-6">
      <p class="form-control"><?=$user['nidn']?></p>
    </div>
  </div>

  <div class="form-group">
    <label for="nik" class="col-sm-2 control-label">NIK</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nik" id="nik" value="<?=$user['nik']?>">
    </div>
  </div> -->

  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nama" id="nama" value="<?=$user['nama']?>">
    </div>
  </div>

  <!-- <div class="form-group">
    <label for="gelar_depan" class="col-sm-2 control-label">Gelar Depan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="gelar_depan" id="gelar_depan" value="<?=$user['gelar_depan']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="gelar_belakang" class="col-sm-2 control-label">Gelar Belakang</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="gelar_belakang" id="gelar_belakang" value="<?=$user['gelar_belakang']?>">
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

  <!-- <div class="form-group">
    <label for="jabatan_fungsional" class="col-sm-2 control-label">Jabatan Fungsional</label>
    <div class="col-sm-6">
      <select class="form-control" name="jabatan_fungsional" id="jabatan_fungsional" onchange="checkGolongan();">
              <?php
                foreach ($jabfung as $key => $value) {
              ?>
                <option value="<?=$user['jabatan_fungsional']?>"><?=$user['jabatan_fungsional']?></option>
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
                <option value="<?=$user['golongan']?>"><?=$user['golongan']?></option>
              <?php
                  }
              ?>
      </select>
    </div>
  </div> -->

  <!-- <div class="form-group">
    <label for="jabatan_fungsional" class="col-sm-2 control-label">Jenis Dosen</label>
    <div class="col-sm-6">
      <select class="form-control" name="jenis_dosen" id="jenisdosen">
        <option id="ds" value="DS">Dosen Biasa</option>
        <option id="pr" value="PR">Professor</option>
        <option id="dt" value="DT">Dosen dengan Tugas Tambahan</option>
        <option id="pt" value="PT">Professor dengan Tugas Tambahan</option>
      </select>
      </div>
  </div>

  <div class="form-group">
    <label for="jabatan_struktural" class="col-sm-2 control-label">Jabatan Struktural</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="jabatan_struktural" id="jabatan_struktural" value="<?=$user['jabatan_struktural']?>">
    </div>
  </div>
  
  <div class="form-group">
    <label for="jabatan_fungsional" class="col-sm-2 control-label">Tipe Dosen</label>
    <div class="col-sm-6">
      <select class="form-control" name="status_dosen" id="statusdosen">
        <option value="0">Dosen Tetap</option>
        <option value="1">Dosen Tetap di Luar Bidang Keahlian</option>
        <option value="2">Dosen Tidak Tetap</option>
        <option value="3">Dosen Tidak Tetap Struktural</option>
      </select>
      </div>
  </div> -->

  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Tempat Lahir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="tempat_lahir" value="<?=$user['tempat_lahir']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="col-sm-6">
      <input type="date" class="form-control" name="tgl_lahir" value="<?=$user['tgl_lahir']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">No Handphone</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="no_hp" value="<?=$user['no_hp']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="email" value="<?=$user['email']?>">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="hidden" name="nidn" value="<?=$user['nidn']?>">
      <button type="submit" name="submit-edit-dosen" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Update</button>
    </div>
  </div>
</form>
<!-- END OF TAB INFO -->




<hr/>

               
<a href="<?=base_url('dosen/profil')?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> kembali</a>

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
  var lakil = document.getElementById('lakilaki');
  var perem = document.getElementById('perempuan');

  if (lakil.value == "<?=$user['jenis_kelamin']?>") {
    lakil.setAttribute('checked', 'true');
  } else {
    perem.setAttribute('checked', 'true');
  };


  

</script>



