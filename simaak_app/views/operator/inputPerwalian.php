<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Data Perwalian
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
            
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>NPM</th>
        <th>Nama</th>
        <th>Angkatan</th>
        <th>Kelas</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
<?php
$i = 1;
foreach ($mhs as $key => $value) {
?>
      <tr>
        <td><?=$i++?></td>
        <td><?=$value['nim']?></td>
        <td><?=$value['nama']?></td>
        <td><?=$value['angkatan']?></td>
        <td><?=$value['kelas']?></td>
        <td><?=$value['status_spp']?></td>
        <td>
          <a href="<?=base_url('operator/detailInputPerwalian').'/'.$value['nim'].'/'.$value['nama'].'/'.$value['kelas']?>" class="btn btn-success btn-xs">
          <i class="fa fa-edit"></i></a>
        </td>
      </tr>
<?php } ?>
    </tbody>
  </table>
</div>


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