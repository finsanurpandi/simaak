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
    <input class="form-control" type="file" name="bukti_pembayaran" id="bukti_pembayaran">
    <button type="submit" name="submit_pembayaran" class="btn btn-success btn-sm"><i class='fa fa-cloud-upload'></i> Upload</button>

  </div>
  </div>

</form>

<br/><br/>
<h3>Histori Pembayaran</h3>
<div class="table-responsive">
      <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Bukti Pembayaran</th>
          <th>Tanggal Upload</th>
          <th>Status</th>
          <th>Tanggal Validasi</th>
          <th>Persentase</th>
        </tr>
      </thead>
      <tbody>
<?php
$i = 1;
foreach ($stt_pembayaran as $key => $value) {
  $url = base_url('assets/uploads/documents/mahasiswa/'.$value['image']);
?>
<tr>
  <td><?=$i++?></td>
  <td><a href="<?=$url?>" target="_blank"><?=$value['image']?></a></td>
  <td><?php
    echo date("d-M-Y H:i:s", strtotime($value['log']));
  ?>
  </td>
  <td>
    <?php
      if ($value['status'] == 1) {
        echo "Sudah Divalidasi";
      } else {
        echo "Menunggu";
      }
    ?>
  </td>
  <td>
    <?php
      if ($value['status'] == 1) {
        echo date("d-M-Y H:i:s", strtotime($value['tgl_validasi']));
      } else {
        echo "";
      }
    ?>
  </td>
  <td><?=$value['persentase']?> %</td>
  <!-- <td>
    <?php 
    if ($value['status'] == 0) {
      echo "<button id='btnEditPembayaran' type='button' class='btn btn-success btn-xs' data-target='#editPembayaranModal' data-toggle='modal' data-nama='".$value['image']."' data-id='".$value['id']."'>";
      echo "<i class='fa fa-refresh'></i> Ganti File</button>";
    } else {
      echo "<button type='button' class='btn btn-success btn-xs' disabled='true'>";
      echo "<i class='fa fa-refresh'></i> Ganti File</button>";
    }
    ?>
  </td> -->
</tr>
<?php } ?>
      </tbody>
      </table>
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