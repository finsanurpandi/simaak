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
        <li class="active">Pengabdian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kinerja Bidang Pengabdian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<div>

<button id="btnTambahPengabdianDosen" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataPengabdianDosenModal" data-nidn="<?=$this->session->username?>"><i class="fa fa-user-plus"></i> Tambah Data</button>                   

</div>
            <br/>

            <div class="table-responsive">
            <table class="table table-bordered table-custom-header">
                      <thead>
                        <tr>
                          <th rowspan="2">No</th>
                          <th rowspan="2">Jenis Kegiatan</th>
                          <th colspan="2">Beban Kerja</th>
                          <th rowspan="2">Masa</th>
                          <th colspan="2">Kinerja</th>
                          <th rowspan="2">Rekomendasi</th>
                          <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                          <th>Bukti Penugasan</th>
                          <th>SKS</th>
                          <th>Bukti Dokumen</th>
                          <th>SKS</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
$i = 1;

foreach ($pengabdian as $value) {
?>
<tr>
  <td align="center"><?=$i?></td>
  <td><?=$value['jenis_kegiatan']?></td>
  <td><?=$value['bukti_penugasan']?></td>
  <td align="center"><?=$value['sks_beban_kerja']?></td>
  <td><?=$value['masa_penugasan']?></td>
  <td><?=$value['bukti_dokumen']?></td>
  <td align="center"><?=$value['sks_kinerja']?></td>
  <td align="center"><strong><?=strtoupper($value['rekomendasi'])?></strong></td>
  <td align="center">
    <button id="btnEditPengabdianDosen" class="btn btn-success btn-xs" data-toggle="modal" data-target="#editPengabdianDosenModal" 
    data-id="<?=$value['id']?>"
    data-jeniskegiatan="<?=$value['jenis_kegiatan']?>"
    data-buktipenugasan="<?=$value['bukti_penugasan']?>"
    data-sksbebankerja="<?=$value['sks_beban_kerja']?>"
    data-masapenugasan="<?=$value['masa_penugasan']?>"
    data-buktidokumen="<?=$value['bukti_dokumen']?>"
    data-skskinerja="<?=$value['sks_kinerja']?>"
    data-rekomendasi="<?=$value['rekomendasi']?>"
    ><i class="fa fa-pencil"></i></button>
    <button id="btnHapusDataPengabdianDosen" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapusDataPengabdian" data-id="<?=$value['id']?>"><i class="fa fa-trash"></i></button>
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