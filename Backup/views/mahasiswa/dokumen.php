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
              <h3 class="box-title">Data Dokumen Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<form class="form-horizontal" method="post" action="<?=base_url('mahasiswa/addDocument/pas_photo')?>" enctype="multipart/form-data">

  <div class="form-group required">
    <label for="pas_photo" class="col-sm-2 control-label">Pas Photo</label>
    <div class="col-sm-6">
    <input type="hidden" name="path" value="$upload['pas_photo']">
<?php
if (!empty($upload['pas_photo']) ) {
  echo "<div class='alert alert-grey'>";
  $link = base_url('assets/uploads/documents/mahasiswa/'.$upload['pas_photo']);
  echo "<i class='fa fa-check text-success'></i> ";
  echo "<a href='".$link."' target='_blank'>".$upload['pas_photo']."</a>";
  echo "<button id='btnEditPasphoto' type='button' class='btn btn-success btn-xs pull-right' data-target='#editPasphotoModal' data-toggle='modal' data-nama='".$upload['pas_photo']."'>";
  echo "<i class='fa fa-refresh'></i> Ganti File</button>";
  echo "</div>";
} else {
?>
      <input class="form-control" type="file" name="pas_photo" id="pas_photo">
      <button type="submit" name="submit_profil" class="btn btn-success btn-sm"><i class='fa fa-cloud-upload'></i> Upload</button>
<?php
}

?>
    </div>
  </div>

</form>

<form class="form-horizontal" method="post" action="<?=base_url('mahasiswa/addDocument/ijazah')?>" enctype="multipart/form-data">

  <div class="form-group required">
    <label for="ijazah" class="col-sm-2 control-label">Ijazah</label>
    <div class="col-sm-6">
    <input type="hidden" name="path" value="$upload['ijazah']">

<?php
if (!empty($upload['ijazah'])) {
  echo "<div class='alert alert-grey'>";
  $link = base_url('assets/uploads/documents/mahasiswa/'.$upload['ijazah']);
  echo "<i class='fa fa-check text-success'></i> ";
  echo "<a href='".$link."' target='_blank'>".$upload['ijazah']."</a>";
  echo "<button id='btnEditIjazah' type='button' class='btn btn-success btn-xs pull-right' data-target='#editIjazahModal' data-toggle='modal' data-nama='".$upload['ijazah']."'>";
  echo "<i class='fa fa-refresh'></i> Ganti File</button>";
  echo "</div>";
} else {
?>

      <input class="form-control" type="file" name="ijazah" id="ijazah">
      <button type="submit" name="submit_profil" class="btn btn-success btn-sm"><i class='fa fa-cloud-upload'></i> Upload</button>
<?php } ?>
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