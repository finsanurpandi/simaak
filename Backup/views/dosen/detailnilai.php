Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Detail Nilai
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url('dosen/nilai')?>">Penilaian</a></li>
        <li class="active">Input Nilai</li>
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
            <br/>

<?php
if (!empty($penilaian)) {
?>

<table class="table table-hover">
<tr>
  <th>#</th>
  <th>NPM</th>
  <th>Nama</th>
  <th>Nilai</th>
  <th>Aksi</th>
</tr>
<?php
$no = 1;
foreach ($penilaian as $key => $value) {
?>
<tr>
  <td><?=$no++?></td>
  <td><?=$value['nim']?></td>
  <td><?=$value['nama_mhs']?></td>
  <td><strong>
  <?php
  switch ($value['nilai']) {
      case 4:
        echo 'A';
        break;
      case 3.5:
        echo 'AB';
        break;
      case 3:
        echo 'B';
        break;
      case 2.5:
        echo 'BC';
        break;
      case 2:
        echo 'C';
        break;
      case 1.5:
        echo 'CD';
        break;
      case 1:
        echo 'D';
        break;
      case 0.5:
        echo 'DE';
        break;
      case 0:
        echo 'E';
        break;
      case -1:
        echo 'T';
        break;
    }
  ?>
  </strong>
  </td>
  <td>
    <button id="editNilaiMahasiswa" class="btn btn-success btn-xs" data-toggle="modal" data-target="#editNilaiModal" data-id="<?=$value['id']?>" data-nilai="<?=$value['nilai']?>" data-mhs="<?=$value['nama_mhs']?>" data-nim="<?=$value['nim']?>"><i class="fa fa-pencil"></i> edit</button>
  </td>
</tr>

<?php
}
echo "</table>";
} else {

if (!empty($jadwal)) {
?>

            <div class="table-responsive">
<form method="post">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nim</th>
                  <th>Nama</th>
                  <th>Nilai</th>
                 <!--  <th>Aksi</th> -->
                  
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                $index = 0;
                foreach ($jadwal as $key => $value) {
                  echo "<tr>";
                  echo "<td>".$i++."</td>";
                  echo "<td>".$value['nim']."</td>";
                  echo "<td>".$value['nama_mhs']."</td>";
                ?>
<td>

<input type="hidden" name="nim[]" value="<?=$value['nim']?>">
<input type="hidden" name="nama[]" value="<?=$value['nama_mhs']?>">
<input type="hidden" name="kode_matkul[]" value="<?=$value['kode_matkul']?>">
<input type="hidden" name="nama_matkul[]" value="<?=$value['nama_matkul']?>">
<input type="hidden" name="sks[]" value="<?=$value['sks']?>">
<input type="hidden" name="nidn[]" value="<?=$value['nidn']?>">
<input type="hidden" name="nama_dosen[]" value="<?=$value['nama_dosen']?>">
<input type="hidden" name="kelas[]" value="<?=$value['kelas']?>">
<input type="hidden" name="id_jadwal[]" value="<?=$value['id_jadwal']?>">
<input type="hidden" name="semester[]" value="<?=$value['semester']?>">
<input type="hidden" name="semester_mhs[]" value="<?=$value['semester_mhs']?>">
<input type="hidden" name="tahun_ajaran[]" value="<?=$value['tahun_ajaran']?>">
<input type="hidden" name="kode_prodi[]" value="<?=$value['kode_prodi']?>">
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="4"> A
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="3.5"> AB
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="3"> B
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="2.5"> BC
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="2"> C
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="1.5"> CD
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="1"> D
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="0.5"> DE
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="0"> E
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="0"> T
</label>


</td>

                <?php
$index++;
                  echo "</tr>";
                }
                ?>
<tr>

  <td colspan="4">
    <input type="submit" name="submitNilai" value="Kirim Nilai" class="btn btn-primary btn-xs btn-block">
    </form>
  </td>
</tr>
              </tbody>

            </table>


<?php } else {
    echo "Data tidak ditemukan <br/>";
  }
}
?>


<!-- <div class="text-center">
    <ul class="pagination pagination-sm">
        <?php echo $link?>
    </ul>    
</div> -->
<a href="<?=base_url('dosen/nilai')?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper