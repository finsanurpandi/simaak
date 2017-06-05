Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dosen</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
            <div>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataDosenModal"><i class="fa fa-user-plus"></i> Tambah Data</button>

<form method="post" class="form-inline pull-right">
  <div class="form-group form-group-sm">
  <select class="form-control" name="search_category">
        <option value="dosen.nidn">NIDN</option>
        <option value="dosen.nik">NIK</option>
        <option value="dosen.nama">Nama</option>
        <option value="dosen.jabatan_fungsional">Jabatan Fungsional</option>
        <option value="dosen.golongan">Golongan</option>
      </select>
    <div class="input-group">
      <input type="text" name="search_key" class="form-control">
      <div class="input-group-btn">
        <button type="submit" name="search" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Search</button>
      </div><!-- /btn-group -->                  
    </div>
  </div>
</form>

            </div>
            <br/>
            <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIDN</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <!-- <th>Gelar Depan</th>
                  <th>Gelar Belakang</th> -->
                  <!-- <th>Program Studi</th> -->
                  <th>Prodi</th>
                  <th>Jenis Kelamin</th>
                  <th>Jabatan Fungsional</th>
                  <th>Jabatan Struktural</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = $page + 1;
                foreach ($dosen as $key => $value) {
                  echo "<tr>";
                  echo "<td>".$i++."</td>";
                  echo "<td>".$value['nidn']."</td>";
                  echo "<td>".$value['nik']."</td>";
                  echo "<td>".$value['gelar_depan'].''.$value['nama'].', '.$value['gelar_belakang']."</td>";
                  // echo "<td>".$value['kode_prodi']."</td>";
                  echo "<td>".$value['kode_prodi']."</td>";
                  echo "<td>".$value['jenis_kelamin']."</td>";
                  echo "<td>".$value['jabatan_fungsional']."</td>";
                  echo "<td>".$value['jabatan_struktural']."</td>";
                  
                  // echo "<td><a href='".base_url()."operator/detailDosen/".$this->encrypt->encode($value['nidn'])."' class='btn btn-success btn-xs'><i class='fa fa-pencil'></i> edit</a></td>";
                  // echo "</tr>";
                //}
                // $no = 1;
                // for ($i=0; $i < count($dosen) ; $i++) { 
                //   if ($dosen[$i]['status_dosen'] == 0) {
                //       echo "<tr>";
                //       echo "<td>".$no++."</td>";
                //       echo "<td>".$dosen[$i]['nidn']."</td>";
                //       echo "<td>".$dosen[$i]['nik']."</td>";
                //       echo "<td>".$dosen[$i]['nama']."</td>";
                //       echo "<td>".$dosen[$i]['gelar_depan']."</td>";
                //       echo "<td>".$dosen[$i]['gelar_belakang']."</td>";
                //       // echo "<td>".$value['kode_prodi']."</td>";
                //       echo "<td>".$dosen[$i]['jenis_kelamin']."</td>";
                //       echo "<td>".$dosen[$i]['jabatan_fungsional']."</td>";
                //       echo "<td>".$dosen[$i]['golongan']."</td>";
                //       echo "<td>".$dosen[$i]['jabatan_struktural']."</td>";
?>
<td>
<a href="<?=base_url('operator/detailDosen/').$this->encrypt->encode($value['nidn'])?>" class="btn btn-primary btn-xs"><i class='fa fa-pencil'></i> detail</a>
  <form method="post">
    <input type="hidden" name="nidn" value="<?=$value['nidn']?>">
    <button class="btn btn-danger btn-xs" name="hapusDosen"><i class='fa fa-trash'></i> hapus</button>
  </form>
</td>

<?php
                      echo "</tr>";
                  }
              
                ?>
              </tbody>

            </table>
<hr/>
<p>
<strong>Jumlah Dosen :</strong>
<?=$total?></p>




            </div>
<?php
  if ($dosen == null) {
    echo "<p class='text-center text-danger'><strong>data tidak ditemukan!</strong></p>";
  }
?>

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
  <!-- /.content-wrapper