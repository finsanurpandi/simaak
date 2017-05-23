<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Detail Matakuliah
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Matakuliah</li>
        <li class="active">Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
<?=$nama_matkul.' - '.$kelas.' - '.$this->session->tahun_ajaran?>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<div>

</div>
<strong>NIDN</strong>
<p class="text-muted"><?=$user['nidn']?></p>

<strong>Nama Dosen</strong>
<p class="text-muted"><?=$user['gelar_depan']?><?=$user['nama'].', '?><?=$user['gelar_belakang']?></p>



            <br/>

            <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nim</th>
                  <th>Nama</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($jadwal as $key => $value) {
                  echo "<tr>";
                  echo "<td>".$i++."</td>";
                  echo "<td>".$value['nim']."</td>";
                  echo "<td>".$value['nama_mhs']."</td>";

                  echo "</tr>";
                }
                ?>
              </tbody>

            </table>


<!-- <div class="text-center">
    <ul class="pagination pagination-sm">
        <?php echo $link?>
    </ul>    
</div> -->
<a href="<?=base_url('operator/matakuliah')?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>&nbsp;
<?php
echo "<a href='".base_url()."cetak/cetak_daftar_hadir_kuliah/".$this->encrypt->encode($matkul['kode_matkul'])."/".$this->encrypt->encode($matkul['nama_matkul'])."/".$this->encrypt->encode($matkul['kelas'])."/".$this->encrypt->encode($matkul['nidn'])."/".$this->encrypt->encode($matkul['id_jadwal'])."' class='btn btn-primary btn-xs' target='_blank'><i class='fa fa-print'></i> cetak</a></td>";
?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper