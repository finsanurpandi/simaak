<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dokumen</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Dokumen Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<div>
<?php
if ($error == true) {
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
  <strong><?=$error?></strong>
</div>
<?php } 

if (@$this->session->flashdata('success') == true) {
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
  <strong>Data berhasil di-upload!</strong>
</div>
<?php } ?>
            <button id="btnTambahDokumenDosen" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataDokumenDosenModal" data-nidn="<?=$this->session->username?>"><i class="fa fa-user-plus"></i> Tambah Data</button>                   

</div>
            <br/>

            <div class="table-responsive">
            <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama File</th>
                          <th>File</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
$i = 1;

foreach ($dokumen as $value) {
?>
<tr>
  <td><?=$i?></td>
  <td><?=$value['judul_file']?></td>
  <td><a href="<?=base_url('assets/img/documents/dosen/'.$value['nama_file'].'')?>" target="_blank"><?=$value['nama_file']?></td>
  <td>
    <button type="button" id="btnEditDokumenDosen" class="btn btn-success btn-xs" 
  data-toggle="modal" 
  data-target="#editDokumenDosenModal"
  data-id="<?=$value['id']?>"
  data-judul="<?=$value['judul_file']?>"
  data-nama="<?=$value['nama_file']?>">
      <i class="fa fa-pencil"></i> edit
    </button>
  <button type="button" id="btnHapusDataDokumenDosen" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapusDataDokumen" data-id="<?=$value['id']?>" data-nama="<?=$value['nama_file']?>"><i class="fa fa-remove"></i> hapus</button>
  </td>
</tr>
<?php
$i++;
}
?>
                      </tbody>
                    </table>
<?php
  if ($dokumen == null) {
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