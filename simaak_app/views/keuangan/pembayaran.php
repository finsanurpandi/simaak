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
              <h3 class="box-title">Data Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
            <div>
            

<form method="post" class="form-inline">
  <div class="form-group form-group-sm">
    <div class="input-group">
      <input type="text" name="nimsearch" class="form-control">
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
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Angkatan</th>
                  <th>Kelas</th>
                  <th>Kode Prodi</th>
                  <th>Status Pembayaran</th>
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
                  echo "<td>".$value['status_spp']."% </td>";
                  echo "<td><a href='".base_url()."keuangan/detailPembayaran/".$this->encrypt->encode($value['nim'])."' class='btn btn-success btn-xs'><i class='fa fa-pencil'></i> detail</a></td>";
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