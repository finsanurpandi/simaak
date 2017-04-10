<!-- Content Wrapper. Contains page content -->
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
        <option value="nidn">NIDN</option>
        <option value="nik">NIK</option>
        <option value="nama">Nama</option>
        <option value="prodi">Program Studi</option>
        <option value="jabatan_fungsional">Jabatan Fungsional</option>
        <option value="golongan">Golongan</option>
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
                  <th>Gelar Depan</th>
                  <th>Gelar Belakang</th>
                  <th>Program Studi</th>
                  <th>Jenis Kelamin</th>
                  <th>Jabatan Fungsional</th>
                  <th>Golongan</th>
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
                  echo "<td>".$value['nama']."</td>";
                  echo "<td>".$value['gelar_depan']."</td>";
                  echo "<td>".$value['gelar_belakang']."</td>";
                  echo "<td>".$value['prodi']."</td>";
                  echo "<td>".$value['jenis_kelamin']."</td>";
                  echo "<td>".$value['jabatan_fungsional']."</td>";
                  echo "<td>".$value['golongan']."</td>";
                  echo "<td>".$value['jabatan_struktural']."</td>";
                  echo "<td><a href='".base_url()."operator/detailDosen/".$this->encrypt->encode($value['nidn'])."' class='btn btn-success btn-xs'><i class='fa fa-pencil'></i> edit</a></td>";
                  echo "</tr>";
                }
                ?>
              </tbody>

            </table>
            </div>
<?php
  if ($dosen == null) {
    echo "<p class='text-center text-danger'><strong>data tidak ditemukan!</strong></p>";
  }
?>

<div class="text-center">
    <ul class="pagination pagination-sm">
        <?php echo $link?>
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