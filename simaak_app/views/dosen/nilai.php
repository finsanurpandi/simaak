Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penilaian
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Penilaian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
<?php
$gelardepan = $user['gelar_depan'];
if (!empty($gelardepan)) {
  echo $user['gelar_depan'].'. '. $user['nama'].', '.$user['gelar_belakang'];
} else {
  echo $user['nama'].', '.$user['gelar_belakang'];
}
?>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<div>
            <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataModal"><i class="fa fa-user-plus"></i> Tambah Data</button> -->

<!-- <form method="post" class="form-inline">
  <div class="form-group form-group-sm">
  <select class="form-control" name="search_category">
        <option value="nim">NPM</option>
        <option value="nama">Nama</option>
        <option value="angkatan">Angkatan</option>
      </select>
    <div class="input-group">
      <input type="text" name="search_key" class="form-control">
      <div class="input-group-btn">
        <button type="submit" name="search" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Search</button>
      </div>
    </div>
  </div>
</form> -->

</div>
            <br/>

            <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Matakuliah</th>
                  <th>Nama Matakuliah</th>
                  <th>SKS</th>
                  <th>Kelas</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($jadwal as $key => $value) {
                  echo "<tr>";
                  echo "<td>".$i++."</td>";
                  echo "<td>".$value['kode_matkul']."</td>";
                  echo "<td>".$value['nama_matkul']."</td>";
                  echo "<td>".$value['sks']."</td>";
                  echo "<td>".$value['kelas']."</td>";
                  echo "<td>Belum ada input</td>";
                  echo "<td><a href='".base_url()."dosen/detailnilai/".$this->encrypt->encode($value['kode_matkul'])."/".$this->encrypt->encode($value['nama_matkul'])."/".$this->encrypt->encode($value['kelas'])."' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> input nilai</a></td>";
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
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper