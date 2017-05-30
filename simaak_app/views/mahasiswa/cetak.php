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

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$user['nama']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
            <div class="row">
        <div class="col-md-2 text-center">
                <?php
                  if ($user['image'] == null) {
                    if ($user['jenis_kelamin'] == 'L') {
                      echo "<img src='".base_url('assets/uploads/profiles/default_male.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                    } else {
                      echo "<img src='".base_url('assets/uploads/profiles/default_female.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                    };
                  } else {
                  ?>
                    <img src="<?=base_url('assets/uploads/profiles/'.$user['image'])?>" class="profile-user-img img-responsive img-circle" alt="User Image">
                  <?php
                  } 
                 ?>
          <br/>
          <!-- <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editPictureModal">edit picture</button>
          <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ubahPassModal">ubah password</button> -->
        </div>

        <div class="col-md-10">
          <strong>NIM</strong>
                  <p class="text-muted">
                    <?=$user['nim']?>
                  </p>

                  <strong>Program Studi</strong>
                  <p class="text-muted">
                    <?=$user['jenjang'].' - '.$user['kode_prodi']?>
                  </p>

                  <strong>Angkatan</strong>
                  <p class="text-muted">
                    <?=$user['angkatan']?>
                  </p>

                  <strong>Kelas</strong>
                  <p class="text-muted">
                    <?=$user['kelas']?>
                  </p>

                  <strong>Status Pembayaran</strong>
                  <p class="text-muted">
                    <?=@$pembayaran[0]['persentase']?> %
                  </p>


      </div>      
      </div>

<hr/>

<h3>
  Cetak Kartu UTS
</h3>
<?php
if (@$pembayaran[0]['persentase'] >= 75) {
?>
<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Cetak Kartu UTS</a>
<?php } else { ?>
<a href="#" class="btn btn-primary btn-xs" disabled="true"><i class="fa fa-print"></i> Cetak Kartu UTS</a>
<?php } ?>
<p class="text-muted">*Kartu hanya bisa dicetak jika telah membayar <u><</u> 75% dari ketentuan yang harus dibayarkan</p>
<hr/>

<h3>
  Cetak Kartu UAS
</h3>
<?php
if (@$pembayaran[0]['persentase'] == 100) {
?>
<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Cetak Kartu UAS</a>
<?php } else { ?>
<a href="#" class="btn btn-primary btn-xs" disabled="true"><i class="fa fa-print"></i> Cetak Kartu UAS</a>
<?php } ?>
<p class="text-muted">*Kartu hanya bisa dicetak jika telah melunasi pembayaran</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->