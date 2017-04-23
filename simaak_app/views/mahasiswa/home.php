<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Pengumuman Penting</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
            <?php 
              if (($this->session->mhs_profil == FALSE) || ($this->session->mhs_ortu == FALSE) || ($this->session->mhs_upload == FALSE))  {
            ?>
            <div class="callout callout-danger">
              <h4>Data Mahasiswa</h4>

              <p>Menu lainnya tidak akan muncul sebelum Mahasiswa melengkapi data nya. Silahkan untuk melengkapi data dapat melalui menu profil atau melalui tautan ini --> <a href="<?=base_url('mahasiswa/profil')?>">Data Mahasiswa</a></p>
            </div>
            <?php } 

            foreach ($pengumuman as $value) {
            ?>
            <div class="callout <?=$value['tingkat']?>">
              <h4><?=$value['judul_pengumuman']?></h4>

              <p><?=$value['isi_pengumuman']?></p>
            </div>

            <?php
            }


            ?>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  