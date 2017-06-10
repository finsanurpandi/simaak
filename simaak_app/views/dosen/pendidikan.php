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
        <li> Profil</a></li>
        <li class="active">Pendidikan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pendidikan Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<div>
            <button id="btnTambahPendidikanDosen" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataPendidikanDosenModal" data-nidn="<?=$this->session->username?>"><i class="fa fa-user-plus"></i> Tambah Data</button>                   

</div>
            <br/>

            <div class="table-responsive">
            <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenjang</th>
                          <th>Perguruan Tinggii</th>
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
      <i class="fa fa-refresh"></i> edit
    </button>
  <button type="button" id="btnHapusDataPendidikanDosen" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapusDataPendidikan" data-id="<?=$value['id']?>"><i class="fa fa-remove"></i> hapus</button>
  </td>
</tr>
<?php
$i++;
}
?>
                      </tbody>
                    </table>
<?php
  if ($pendidikan == null) {
    echo "<p class='text-center text-danger'><strong>data tidak ditemukan!</strong></p>";
  }
?>

<!-- <div class="text-center">
    <ul class="pagination pagination-sm">
        <?php echo $link?>
    </ul>    
</div> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->