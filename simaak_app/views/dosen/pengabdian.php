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
        <li class="active">Pengabdian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pengabdian Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<div>
            <button id="btnTambahPengabdianDosen" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataPengabdianDosenModal" data-nidn="<?=$this->session->username?>"><i class="fa fa-user-plus"></i> Tambah Data</button>                   

</div>
            <br/>

            <div class="table-responsive">
            <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Program Pengabdian</th>
                          <th>Judul</th>
                          <th>Anggota</th>
                          <th>Tahun</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
$i = 1;

foreach ($pengabdian as $value) {
?>
<tr>
  <td><?=$i?></td>
  <td><?=$value['program']?></td>
  <td><?=$value['judul']?></td>
  <td><?=$value['anggota']?></td>
  <td><?=$value['tahun']?></td>
  <td>
    <button type="button" id="btnEditPengabdianDosen" class="btn btn-success btn-xs" 
  data-toggle="modal" 
  data-target="#editPengabdianDosenModal"
  data-id="<?=$value['id']?>"
  data-program="<?=$value['program']?>"
  data-judul="<?=$value['judul']?>"
  data-anggota="<?=$value['anggota']?>"
  data-tahun="<?=$value['tahun']?>">
      <i class="fa fa-refresh"></i> edit
    </button>
  <button type="button" id="btnHapusDataPengabdianDosen" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapusDataPengabdian" data-id="<?=$value['id']?>"><i class="fa fa-remove"></i> hapus</button>
  </td>
</tr>
<?php
$i++;
}
?>
                      </tbody>
                    </table>
<?php
  if ($pengabdian == null) {
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