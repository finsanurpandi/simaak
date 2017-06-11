<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Data Nilai Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mahasiswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
                  Program Studi 
                  <?php
                  if ($this->session->kode_prodi == 'ES') {
                    echo "Ekonomi Syariah";
                  } elseif ($this->session->kode_prodi == 'MPI') {
                    echo "Manajemen Pendidikan Islam";
                  } elseif ($this->session->kode_prodi == 'PBS') {
                    echo "Perbankan Syariah";
                  }
                  ?>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<div>
            <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataModal"><i class="fa fa-user-plus"></i> Tambah Data</button> -->
<form method="post" class="form-horizontal">

  <!-- <div class="form-group">
    <label for="nim" class="col-sm-2 control-label">NIM</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nim" id="nilaiOpNim">
    </div>
  </div> -->
  <div class="form-group">
    <label for="tempat_lahir" class="col-sm-2 control-label">Angkatan</label>
    <div class="col-sm-6">
      <select class="form-control" id="nilaiOpAngkatan" name="angkatan">
        <option></option>
<?php
foreach ($angkatan as $key => $value) {
?>
<option value="<?=$value['angkatan']?>"><?=$value['angkatan']?></option>    
<?php } ?>      
      </select>
    </div>
  </div>

  <!-- <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Nama Mahasiswa</label>
    <div class="col-sm-6">
      <select name="mhs" class="form-control">

<?php
  foreach ($mhs as $key => $value) {
?>
<option value="<?=$value['nim'].'-'.$value['nama'].'-'.$value['kelas'].'-'.$value['angkatan']?>"><?=$value['nim'].' - '.$value['nama']?></option>
<?php } ?>
      </select>
    </div>
  </div> -->

  <div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Nama Mahasiswa</label>
    <div class="col-sm-6">
      <select name="mhs" class="form-control" id="nilaiOpNama">

      <option></option>
      </select>
    </div>
  </div>


   <div class="form-group">
    <label for="kelas" class="col-sm-2 control-label">Matakuliah</label>
    <div class="col-sm-6">
      <select name="matkul" class="form-control">
      <option></option>
<?php
for ($i=1; $i <= 8 ; $i++) { 
  echo "<optgroup label='Semester ".$i."'>";
  for ($j=0; $j < count($matkul) ; $j++) { 
      if ($matkul[$j]['semester'] == $i) {
        
?>
    <option value="<?=$matkul[$j]['kode_matkul'].','.$matkul[$j]['nama_matkul'].','.$matkul[$j]['sks'].','.$matkul[$j]['semester']?>"><?=$matkul[$j]['kode_matkul'].' - '.$matkul[$j]['nama_matkul']?></option>
<?php
    }
  }
  echo "</optgroup>";
}

// foreach ($matkul as $key => $value) {
?>
       <!--  <option value="<?=$value['kode_matkul'].','.$value['nama_matkul'].','.$value['sks'].','.$value['semester']?>"><?=$value['kode_matkul'].' - '.$value['nama_matkul']?></option> -->
<?php //} ?>

      </select>
      <!-- <input type="text" class="form-control" name="matkul" id="nilaiOpMatkul"> -->
    </div>
  </div>

  <div class="form-group">
    <label for="jenjang" class="col-sm-2 control-label">Dosen</label>
    <div class="col-sm-6">
      <select name="dosen" class="form-control">
      <option></option>
<?php
foreach ($dosen as $key => $value) {
  if ($value['gelar_depan'] !== '') {
?>
        <option value="<?=$value['nidn'].'-'.$value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang']?>"><?=$value['nidn'].' - '.$value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang']?></option>
<?php } else { ?>
        <option value="<?=$value['nidn'].'-'.$value['nama'].', '.$value['gelar_belakang']?>"><?=$value['nidn'].' - '.$value['nama'].', '.$value['gelar_belakang']?></option>
<?php } }?>
      </select>
      <!-- <input type="text" class="form-control" name="dosen" id="nilaiOpDosen"> -->
    </div>
  </div>


  <div class="form-group">
    <label for="jenis_kelamin" class="col-sm-2 control-label">Tahun Ajaran</label>
    <div class="col-sm-6">
      <select class="form-control" id="nilaiOpTa" name="tahun_ajaran">
        <option></option>
<?php 
    foreach ($ta as $key => $value) {
?>
    <option value="<?=$value['tahun_ajaran']?>"><?=$value['tahun_ajaran']?></option>
<?php } ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="tempat_lahir" class="col-sm-2 control-label">Nilai</label>
    <div class="col-sm-6">
      <select class="form-control" id="nilaiOpNilai" name="nilai">
        <option></option>
        <option value="4">A</option>
        <option value="3.5">AB</option>
        <option value="3">B</option> 
        <option value="2.5">BC</option>
        <option value="2">C</option>
        <option value="1.5">CD</option>
        <option value="1">D</option>
        <option value="0.5">DE</option>
        <option value="0">E</option>
      </select>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit_nilai" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Update</button>
    </div>
  </div>
</form>
<?php
  // if ($statusperwalian == null) {
  //   echo "<p class='text-center text-danger'><strong>data tidak ditemukan!</strong></p>";
  // }
?>
<hr/>

<!-- <form method="post" class="form-inline">
  <div class="form-group form-group-sm">
  <select class="form-control" name="search_category">
        <option value="nim">NPM</option>
        <option value="nama">Nama Mahasiswa</option>
        <option value="kode_matkul">Kode Matakuliah</option>
        <option value="nama_dosen_mhs">Dosen</option>
        <option value="tahun_ajaran">Tahun Ajaran</option>
      </select>
    <div class="input-group">
      <input type="text" name="search_keyword" class="form-control">
      <div class="input-group-btn">
        <button type="submit" name="search_nilai" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Search</button>
      </div>
    </div>
  </div>
</form> -->
<form method="post" class="form-inline">
  <div class="form-group form-group-sm">
  <select class="form-control" name="search_category[]">
        <option value="nim">NPM</option>
        <option value="nama_mhs">Nama</option>
        <option value="tahun_ajaran">Tahun Ajaran</option>
        <option value="kelas">Kelas</option>
        <option value="kode_matkul">Kode Matakuliah</option>
        <option value="nidn">NIDN Dosen</option>
        <option value="semester">Semester</option>
      </select>
    <div class="input-group">
      <input type="text" name="search_key[]" class="form-control">                
    </div>
    <select class="form-control" name="search_category[]">
        <option value="nim">NPM</option>
        <option value="nama_mhs">Nama</option>
        <option value="tahun_ajaran">Tahun Ajaran</option>
        <option value="kelas">Kelas</option>
        <option value="kode_matkul">Kode Matakuliah</option>
        <option value="nidn">NIDN Dosen</option>
        <option value="semester">Semester</option>
      </select>
    <div class="input-group">
      <input type="text" name="search_key[]" class="form-control">                
    </div>
  <select class="form-control" name="search_category[]">
        <option value="nim">NPM</option>
        <option value="nama_mhs">Nama</option>
        <option value="tahun_ajaran">Tahun Ajaran</option>
        <option value="kelas">Kelas</option>
        <option value="kode_matkul">Kode Matakuliah</option>
        <option value="nidn">NIDN Dosen</option>
        <option value="semester">Semester</option>
      </select>
    <div class="input-group">
      <input type="text" name="search_key[]" class="form-control">
      <div class="input-group-btn">
        <button type="submit" name="search_nilai" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Search</button>
      </div><!-- /btn-group -->                  
    </div>
  </div>
</form>

<hr/>
<p>Total Data : <?=$total?></p>
<hr/>
<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Nim</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Kode Matkul</th>
      <th>Nama Matkul</th>
      <th>SKS</th>
      <th>Nama Dosen</th>
      <th>Semester</th>
      <th>Tahun Ajaran</th>
      <th>Nilai</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
<?php
$i = $page + 1;
foreach ($nilai as $key => $value) {
?>
    <tr>
      <td><?=$i++?></td>
      <td><?=$value['nim']?></td>
      <td><?=$value['nama_mhs']?></td>
      <td><?=$value['kelas']?></td>
      <td><?=$value['kode_matkul']?></td>
      <td><?=$value['nama_matkul']?></td>
      <td><?=$value['sks']?></td>
      <td><?=$value['nama_dosen']?></td>
      <td><?=$value['semester']?></td>
      <td><?=$value['tahun_ajaran']?></td>
      <td><?=$value['nilai']?></td>
      <td>
        <button class="btn btn-success btn-xs"
        id="btn-edit-nilai" 
        data-toggle="modal"
        data-target="#editNilaiModal"
        data-id="<?=$value['id']?>"
        data-nama="<?=$value['nama_mhs']?>"
        data-nim="<?=$value['nim']?>"
        data-nilai="<?=$value['nilai']?>"
        ><i class="fa fa-pencil"></i></button>
        <button class="btn btn-danger btn-xs" 
        id="btn-hapus-nilai"
        data-toggle="modal"
        data-target="#hapusNilaiModal"
        data-id="<?=$value['id']?>"
        ><i class="fa fa-trash"></i></button>
      </td>
    </tr>
<?php } ?>
  </tbody>
</table>

<div class="text-center">
    <ul class="pagination pagination-sm">
        <?php echo @$link?>
    </ul>    
</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->