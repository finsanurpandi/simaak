<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jadwal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Jadwal Perkuliahan Tahun Ajaran <?=$this->session->tahun_ajaran;?>, Prodi <?=$prodi['prodi']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
            <div>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataJadwalModal"><i class="fa fa-user-plus"></i> Tambah Data</button>
            </div>
            <br/>
<?php
foreach ($semester as $data) {
?>
<h3>Semester <?=$data['semester']?></h3>

            <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Matakuliah</th>
                  <th>Nama Matakuliah</th>
                  <th>Nama Dosen</th>
                  <th>Semester</th>
                  <th>Kelas</th>
                  <th>Hari, Jam</th>
                  <th>Ruangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $i = 1;
                foreach ($jadwal as $value) {
                if ($data['semester'] == $value['semester']) {
                  echo "<tr>";
                  echo "<td>".$i++."</td>";
                  echo "<td>".$value['kode_matkul']."</td>";
                  echo "<td>".$value['nama_matkul']."</td>";
                  echo "<td>".$value['nama_dosen']."</td>";
                  echo "<td class='text-center'>".$value['semester']."</td>";
                  echo "<td class='text-center'>".$value['kelas']."</td>";
                  echo "<td>".ucfirst($value['hari']).", ".$value['waktu']." WIB</td>";
                  echo "<td>".ucfirst($value['ruangan'])."</td>";
                  echo "<td><button class='btn btn-success btn-xs' data-toggle='modal' data-target='#editJadwalModal' data-id='".$value['id_jadwal']."'><i class='fa fa-pencil'></i> edit</button>";
?>
  <form method="post">
    <input type="hidden" name="id_jadwal" value="<?=$value['id_jadwal']?>">
    <button class="btn btn-danger btn-xs" name="hapusJadwal"><i class='fa fa-trash'></i> hapus</button>
  </form>
</td>

<?php
                  echo "</tr>";
                } else {
                  continue;
                }
                }
                ?>

              </tbody>

            </table>
            <hr/>
<?php
}
?>
<?php
  if ($jadwal == null) {
    echo "<p class='text-center text-danger'><strong>data tidak ditemukan!</strong></p>";
  }
?>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->