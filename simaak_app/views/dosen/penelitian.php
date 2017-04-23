<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Profil</a></li>
        <li class="active">Penelitian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Penelitian Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<div>
            <button id="btnTambahPenelitianDosen" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataPenelitianDosenModal" data-nidn="<?=$this->session->username?>"><i class="fa fa-user-plus"></i> Tambah Data</button>                   

</div>
            <br/>

            <div class="table-responsive">
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

foreach ($penelitian as $value) {
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
      <i class="fa fa-refresh"></i> edit
    </button>
  <button type="button" id="btnHapusDataPenelitianDosen" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapusDataPenelitian" data-id="<?=$value['id']?>"><i class="fa fa-remove"></i> hapus</button>
  </td>
</tr>
<?php
$i++;
}
?>
                      </tbody>
                    </table>
<?php
  if ($penelitian == null) {
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