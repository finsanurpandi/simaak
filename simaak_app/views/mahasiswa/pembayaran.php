<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Profil</li>
        <li class="active">Dokumen</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<?php
if ($error == true) {
?>

<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-ban"></i> Alert!</h4>
  <?=$error?>
</div>

<?php } ?>

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Upload Bukti Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<form class="form-horizontal" method="post" action="<?=base_url('mahasiswa/upload_bukti')?>" enctype="multipart/form-data">

  <div class="form-group required">
    <label for="pas_photo" class="col-sm-2 control-label">Bukti Pembayaran</label>
    <div class="col-sm-6">
    <input type="hidden" name="path" value="$upload['pas_photo']">
<?php
if (!empty($upload) ) {
  echo "<div class='alert alert-grey'>";
  $link = base_url('assets/uploads/documents/mahasiswa/'.$upload['image']);
  echo "<i class='fa fa-check text-success'></i> ";
  echo "<a href='".$link."' target='_blank'>".$upload['image']."</a>";
  if ($upload['status'] == 0) {
    echo "<button id='btnEditPembayaran' type='button' class='btn btn-success btn-xs pull-right' data-target='#editPembayaranModal' data-toggle='modal' data-nama='".$upload['image']."'>";
    echo "<i class='fa fa-refresh'></i> Ganti File</button>";
  }
  echo "</div>";
} else {
?>
      <input class="form-control" type="file" name="bukti_pembayaran" id="bukti_pembayaran">
      <button type="submit" name="submit_pembayaran" class="btn btn-success btn-sm"><i class='fa fa-cloud-upload'></i> Upload</button>
<?php
}

?>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Status Pembayaran :</label>
    <div class="col-sm-6">
      <label class="control-label">
      <?php
      if ($upload['status'] == 1){
        echo "Sudah divalidasi";
      } else {
        echo 'Menunggu Validasi';
      }
      ?>
      </label>  
    </div>
  </div>

</form>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->