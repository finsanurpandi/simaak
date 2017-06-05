<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hasil Studi Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?=base_url('operator/mahasiswa')?>">Mahasiswa</a></li>
        <li class="active">Hasil Studi</li>
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
                  if ($mhs['image'] == null) {
                    if ($mhs['jenis_kelamin'] == 'L') {
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
                    <?=$mhs['nim']?>
                  </p>
                  
                  <strong>Nama</strong>
                  <p class="text-muted">
                    <?=$mhs['nama']?>
                  </p>

                  <strong>Program Studi</strong>
                  <p class="text-muted">
                    <?=$mhs['jenjang'].' - '.$mhs['kode_prodi']?>
                  </p>

                  <strong>Angkatan</strong>
                  <p class="text-muted">
                    <?=$mhs['angkatan']?>
                  </p>

                  <strong>Kelas</strong>
                  <p class="text-muted">
                    <?=$mhs['kelas']?>
                  </p>

                  <!-- <strong>IP Terakhir</strong>
                  <p class="text-muted">

                  </p> -->


      </div>      
      </div>

<hr>

<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#semester" data-toggle="tab">Semester</a></li>
    <li><a href="#kumulatif" data-toggle="tab">Kumulatif</a></li>
  </ul>
  
  <div class="tab-content">
      <div class="active tab-pane" id="semester">
<!-- SEMESTER -->

<form method="post" class="form-inline">
  <div class="form-group">
    <label>Tahun Ajaran</label>
    <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
<?php

if ($tahun_ajaran[0]['tahun_ajaran'] !== $this->session->tahun_ajaran) {
    echo "<option value='".$this->session->tahun_ajaran."'>".$this->session->tahun_ajaran."</option>";
}

  foreach ($tahun_ajaran as $key => $value) {
?>
<option value="<?=$value['tahun_ajaran']?>"><?=$value['tahun_ajaran']?></option>
<?php } ?>
    </select>
    <input class="form-control btn btn-primary btn-xs" type="submit" name="submit_ta" value="Tampilkan" />
  </div>
</form>

<hr/>
<table class="table table-hover">
  <thead>
    <tr>
      <th>NO.</th>
      <th>MATA KULIAH</th>
      <th>KODE</th>
      <th>SKS</th>
      <th>NILAI</th>
    </tr>
  </thead>
  <tbody>

<?php
$i = 1;
$totalsks = 0;
$ip = 0;
foreach ($nilais as $key => $value) {
?>

  <tr>
    <td><?=$i?></td>
    <td><?=$value['nama_matkul']?></td>
    <td><?=$value['kode_matkul']?></td>
    <td><?=$value['sks']?></td>
    <td>
    <?php
if (!empty($value['nilai'])) {
  
    switch ($value['nilai']) {
      case 4:
        $ip += ($value['nilai']*$value['sks']);
        echo 'A';
        break;
      case 3.5:
        $ip += ($value['nilai']*$value['sks']);
        echo 'AB';
        break;
      case 3:
        $ip += ($value['nilai']*$value['sks']);
        echo 'B';
        break;
      case 2.5:
        $ip += ($value['nilai']*$value['sks']);
        echo 'BC';
        break;
      case 2:
        $ip += ($value['nilai']*$value['sks']);
        echo 'C';
        break;
      case 1.5:
        $ip += ($value['nilai']*$value['sks']);
        echo 'CD';
        break;
      case 1:
        $ip += ($value['nilai']*$value['sks']);
        echo 'D';
        break;
      case 0.5:
        $ip += ($value['nilai']*$value['sks']);
        echo 'DE';
        break;
      case 0:
        $ip += ($value['nilai']*$value['sks']);
        echo 'E';
        break;
      case -1:
        $ip += 0;
        echo 'T';
        break;
      default:
        $ip += 0;
        break;
    }
}    

    ?>
    </td>
  </tr>

<?php
$totalsks += $value['sks'];
$i++;
}
@$totalip = $ip/$totalsks;
?>

  </tbody>
</table>
<hr/>
<p>
  Tahun Ajaran : 
  <strong><?=$ta?></strong>
</p>
<p>
  Jumlah SKS : 
  <strong><?=$totalsks?></strong>
</p>

<p>
  IP : 
  <strong><?=round($totalip, 2)?></strong>
</p>

<a href="<?=base_url('cetak/cetak_kartu_hasil_studi/')?><?=$this->encrypt->encode($nim)."/".$this->encrypt->encode($ta)?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i> CETAK</a>

<hr/>


      </div>

      <div class="tab-pane" id="kumulatif">

<table class="table table-hover">
  <thead>
    <tr>
      <th>NO.</th>
      <th>MATA KULIAH</th>
      <th>KODE</th>
      <th>SKS</th>
      <th>NILAI</th>
    </tr>
  </thead>
  <tbody>

<?php
$i = 1;
$totalsks = 0;
$ip = 0;
foreach ($nilaik as $key => $value) {
?>

  <tr>
    <td><?=$i?></td>
    <td><?=$value['nama_matkul']?></td>
    <td><?=$value['kode_matkul']?></td>
    <td><?=$value['sks']?></td>
    <td>
<?php
if (!empty($value['nilai'])) {
  
    switch ($value['nilai']) {
      case 4:
        $ip += ($value['nilai']*$value['sks']);
        echo 'A';
        break;
      case 3.5:
        $ip += ($value['nilai']*$value['sks']);
        echo 'AB';
        break;
      case 3:
        $ip += ($value['nilai']*$value['sks']);
        echo 'B';
        break;
      case 2.5:
        $ip += ($value['nilai']*$value['sks']);
        echo 'BC';
        break;
      case 2:
        $ip += ($value['nilai']*$value['sks']);
        echo 'C';
        break;
      case 1.5:
        $ip += ($value['nilai']*$value['sks']);
        echo 'CD';
        break;
      case 1:
        $ip += ($value['nilai']*$value['sks']);
        echo 'D';
        break;
      case 0.5:
        $ip += ($value['nilai']*$value['sks']);
        echo 'DE';
        break;
      case 0:
        $ip += ($value['nilai']*$value['sks']);
        echo 'E';
        break;
      case -1:
        $ip += 0;
        echo 'T';
        break;
      default:
        $ip += 0;
        break;
    }
}    

    ?>
    </td>
  </tr>

<?php
$totalsks += $value['sks'];
$i++;
}
@$totalip = $ip/$totalsks;
?>

  </tbody>
</table>
<hr/>
<p>
  Jumlah SKS : 
  <strong><?=$totalsks?></strong>
</p>

<p>
  IPK : 
  <strong><?=round($totalip, 2)?></strong>
</p>

<a href="<?=base_url('cetak/cetak_kartu_hasil_studi/')?><?=$this->encrypt->encode($nim)."/".$this->encrypt->encode($ta)?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i> CETAK</a>
<hr/>
      </div>

<a href="<?=base_url('operator/mahasiswa')?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> kembali</a>

  </div>



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

<script type="text/javascript">
  var ta = document.getElementById('tahun_ajaran');

  for (var i = 0; i < ta.options.length; i++) {
    if (ta.options[i].value == <?=$ta?>) {
      ta.options[i].setAttribute('selected', 'true');
    };
  };
  
</script>


