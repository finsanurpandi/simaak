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
                  <li id="doseninfo" class="active"><a href="#info" data-toggle="tab">Informasi Dasar</a></li>
                  <li id="dosenpendidikan"><a href="#pendidikan" data-toggle="tab">Riwayat Pendidikan</a></li>
                  <li id="dosenpengajaran"><a href="#pengajaran" data-toggle="tab">Riwayat Mengajar</a></li>
                  <li id="dosenpenelitian"><a href="#penelitian" data-toggle="tab">Penelitian</a></li>
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
      <!-- <input type="text" class="form-control" value="<?=$dosen['nidn']?>" disabled="true"> -->
      <p class="form-control"><?=$dosen['nidn']?></p>
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
      <input type="text" class="form-control" name="jabatan_struktural" id="jabatan_struktural" value="<?=$dosen['jabatan_struktural']?>">
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
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
      <button type="submit" name="submit" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Update</button>
    </div>
  </div>
</form>
<!-- END OF TAB INFO -->
                  </div>



                  <div class="tab-pane" id="pendidikan">
<!-- CONTENT TAB PENDIDIKAN --> 
<button id="btnTambahPendidikanDosen" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataPendidikanDosenModal" data-nidn="<?=$nidndosen?>"><i class="fa fa-user-plus"></i> Tambah Data</button>                   
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
  <button type="button" id="btnEditPendidikanDosen" class="btn btn-success btn-xs" 
  data-toggle="modal" 
  data-target="#editPendidikanDosenModal"
  data-id="<?=$value['id']?>"
  data-perguruantinggi="<?=$value['perguruan_tinggi']?>"
  data-fakultas="<?=$value['fakultas']?>"
  data-programstudi="<?=$value['program_studi']?>"
  data-ipk="<?=$value['ipk']?>"
  data-gelar="<?=$value['gelar']?>"
  data-tahunlulus="<?=$value['tahun_lulus']?>">
  <i class="fa fa-pencil"></i> edit </button>
  <button type="button" id="btnHapusDataPendidikanDosen" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapusDataPendidikan" data-id="<?=$value['id']?>"><i class="fa fa-remove"></i> hapus</button>
  </td>
</tr>
<?php
$i++;
}
?>
  </tbody>
</table>
<!-- END OF CONTENT TAB PENDIDIKAN -->
                  </div> <!-- END DIV TAB PENDIDIKAN -->

                  <div class="tab-pane" id="pengajaran">
<!-- CONTENT TAB PENGAJARAN -->                    

<!-- END OF CONTENT TAB PENGAJARAN -->
                  </div> <!-- END DIV TAB PENDIDIKAN -->

                  <div class="tab-pane" id="penelitian">
<!-- CONTENT TAB PENELITIAN -->                    
<button id="btnTambahPenelitianDosen" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataPenelitianDosenModal" data-nidn="<?=$nidndosen?>"><i class="fa fa-user-plus"></i> Tambah Data</button>                   
<table class="table table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul Penelitian</th>
      <th>Bidang Ilmu</th>
      <th>Lembaga</th>
      <th>Penerbit</th>
      <th>Tahun</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
<?php
$i = 1;
foreach (@$penelitian as $value) {
?>
<tr>
  <td><?=$i?></td>
  <td><?=$value['judul_penelitian']?></td>
  <td><?=$value['bidang_ilmu']?></td>
  <td><?=$value['lembaga']?></td>
  <td><?=$value['penerbit']?></td>
  <td><?=$value['tahun']?></td>
  <td>
  <button type="button" id="btnEditPenelitianDosen" class="btn btn-success btn-xs" 
  data-toggle="modal" 
  data-target="#editPenelitianDosenModal"
  data-id="<?=$value['id']?>"
  data-judul="<?=$value['judul_penelitian']?>"
  data-bidang="<?=$value['bidang_ilmu']?>"
  data-lembaga="<?=$value['lembaga']?>"
  data-penerbit="<?=$value['penerbit']?>"
  data-tahun="<?=$value['tahun']?>">
  <i class="fa fa-pencil"></i> edit </button>
  <button type="button" id="btnHapusDataPenelitianDosen" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapusDataPenelitian" data-id="<?=$value['id']?>"><i class="fa fa-remove"></i> hapus</button>
  </td>
</tr>
<?php
$i++;
}
?>
  </tbody>
</table>
<!-- END OF CONTENT TAB PENELITIAN -->
                  </div> <!-- END DIV TAB PENELITIAN -->


                </div>

              </div>  <!-- END OF TABS -->
<a href="<?=base_url('operator/dosen')?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
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

// JENIS DOSEN

var ds = document.getElementById('ds');
var dt = document.getElementById('dt');
var pr = document.getElementById('pr');
var pt = document.getElementById('pt');

if (ds.value == "<?=$dosen['jenis_dosen']?>") {
  ds.setAttribute('selected', 'true');
} else if (dt.value == "<?=$dosen['jenis_dosen']?>") {
  dt.setAttribute('selected', 'true');
} else if (pr.value == "<?=$dosen['jenis_dosen']?>") {
  pr.setAttribute('selected', 'true');
} else if (pt.value == "<?=$dosen['jenis_dosen']?>") {
  pt.setAttribute('selected', 'true');
};

// STATUS DOSEN
var e = document.getElementById('statusdosen');

for (var i = 0; i < e.options.length; i++) {
  if (e.options[i].value == "<?=$status['status_dosen']?>") {
    e.options[i].setAttribute('selected', 'true');
  };
};

// PROGRAM STUDI
// var prodi = document.getElementById('prodi');

// for (var i = 0; i < prodi.options.length; i++) {
//   if (prodi.options[i].value == "<?=$dosen['kode_prodi']?>") {
//     prodi.options[i].setAttribute('selected', 'true');   
//   };
// };

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



