<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
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
              <h3 class="box-title">Data Mahasiswa Prodi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
            <div>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataModal"><i class="fa fa-user-plus"></i> Tambah Data</button>

<form method="post" class="form-inline pull-right">
  <div class="form-group form-group-sm">
  <select class="form-control" name="search_category">
        <option value="nim">NPM</option>
        <option value="nama">Nama</option>
        <option value="angkatan">Angkatan</option>
        <option value="kelas">Kelas</option>
        <option value="prodi">Program Studi</option>
        <option value="nidn">Dosen Wali</option>
      </select>
    <div class="input-group">
      <input type="text" name="search_key" class="form-control">
      <div class="input-group-btn">
        <button type="submit" name="search" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Search</button>
      </div><!-- /btn-group -->                  
    </div>
  </div>
</form>
<hr/>
            </div>
            <br/>

            <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Angkatan</th>
                  <th>Kelas</th>
                  <th>Program Studi</th>
                  <th>Jenis Kelamin</th>
                  <th>Dosen Wali</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = $page + 1;
                foreach ($mhs as $key => $value) {
                  echo "<tr>";
                  echo "<td>".$i++."</td>";
                  echo "<td>".$value['nim']."</td>";
                  echo "<td>".$value['nama']."</td>";
                  echo "<td>".$value['angkatan']."</td>";
                  echo "<td>".$value['kelas']."</td>";
                  echo "<td>".$value['kode_prodi']."</td>";
                  echo "<td>".$value['jenis_kelamin']."</td>";
                  echo "<td>".$value['nidn']."</td>";
                  echo "<td><a href='".base_url()."operator/detailMahasiswa/".$this->encrypt->encode($value['nim'])."' class='btn btn-success btn-xs'><i class='fa fa-pencil'></i> detail</a>";
                  echo "&nbsp;<a href='".base_url()."operator/detailStudi/".$this->encrypt->encode($value['nim'])."' class='btn btn-success btn-xs'><i class='fa fa-mortar-board'></i> studi</a></td>";
                  echo "</tr>";
                }
                ?>
              </tbody>

            </table>
<?php
  if ($mhs == null) {
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
  <!-- /.content-wrapper -->