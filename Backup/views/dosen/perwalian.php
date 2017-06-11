<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Perwalian Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mahasiswa</li>
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
  echo $user['gelar_depan'].' '. $user['nama'].', '.$user['gelar_belakang'];
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

<form method="post" class="form-inline">
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
      </div><!-- /btn-group -->                  
    </div>
  </div>
</form>

</div>
            <br/>

            <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Angkatan</th>
                  <th>Status Perwalian</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $blmperwalian = $totalmhs - count($statusperwalian);
                $no = 1;
                // foreach ($statusperwalian as $key => $value) {
                //   echo "<tr>";
                //   echo "<td>".$i++."</td>";
                //   echo "<td>".$value['nim']."</td>";
                //   echo "<td>".$value['nama']."</td>";
                //   echo "<td>".$value['angkatan']."</td>";

                //   if (empty($value['v_dosen'])) {
                //   	echo "Belum perwalian";
                //   } else {
                //   	echo "<td>".$value['v_dosen']."</td>";
              		// }
              		
                //   echo "<td><a href='".base_url()."dosen/validasi_perwalian/".$this->encrypt->encode($value['nim'])."' class='btn btn-success btn-xs'><i class='fa fa-pencil'></i> detail</a></td>";
                //   echo "</tr>";
                // }

                for ($i=0; $i < count($statusperwalian); $i++) { 
                  echo "<tr>";
                  echo "<td>".$no++."</td>";
                  echo "<td>".$statusperwalian[$i]['nim']."</td>";
                  echo "<td>".$statusperwalian[$i]['nama']."</td>";
                  echo "<td>".$statusperwalian[$i]['angkatan']."</td>";

                  if (empty($statusperwalian[$i]['v_dosen'])) {
                   echo "Belum perwalian";
                  } else {
                   echo "<td>".$statusperwalian[$i]['v_dosen']."</td>";
                  }
                  
                  echo "<td><a href='".base_url()."dosen/validasi_perwalian/".$this->encrypt->encode($statusperwalian[$i]['nim'])."' class='btn btn-success btn-xs'><i class='fa fa-pencil'></i> detail</a></td>";
                  echo "</tr>";
                }

                for ($j=0; $j < $blmperwalian; $j++) { 
                  echo "<tr>";
                  echo "<td>".$no++."</td>";
                  echo "<td>".$mhsblmperwalian[$j]['nim']."</td>";
                  echo "<td>".$mhsblmperwalian[$j]['nama']."</td>";
                  echo "<td>".$mhsblmperwalian[$j]['angkatan']."</td>";
                  echo "<td>Belum Perwalian</td>";
                  
                  echo "<td><a href='#' class='btn btn-success btn-xs' disabled='true'><i class='fa fa-pencil'></i> detail</a></td>";
                  echo "</tr>";
                }
                ?>
              </tbody>

            </table>
<?php
  if ($statusperwalian == null) {
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