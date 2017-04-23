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
        <li class="active">Orang tua</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Orangtua Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<?php
if ($this->session->mhs_ortu !== FALSE) {
                  
  if (@$this->session->flashdata('ortu_success') == true) {
?>
    <div class="alert alert-success">Data berhasil diupdate!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

<?php
  }
?>

<h3>Informasi Ibu</h3>
            <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nama Ibu</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Pendidikan</th>
                  <th>Pekerjaan</th>
                  <th>Pendapatan</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($ortu as $value) {
                  echo "<tr>";
                  echo "<td>".$value['ibu_nama']."</td>";
                  echo "<td>".$value['ibu_ttl']."</td>";
                  echo "<td>".$value['ibu_pendidikan']."</td>";
                  echo "<td>".$value['ibu_pekerjaan']."</td>";
                  echo "<td>".$value['ibu_pendapatan']."</td>";
                  echo "<td>".$value['ibu_alamat']."</td>";
                  echo "<td>".$value['ibu_tlp']."</td>";
                  ?>

                  <td><button id="editIbu" class="btn btn-success btn-xs" 
                  data-toggle="modal"
                  data-target="#editIbuModal"
                  data-nama="<?=$value['ibu_nama']?>"
                  data-ttl="<?=$value['ibu_ttl']?>"
                  data-pendidikan="<?=$value['ibu_pendidikan']?>"
                  data-pekerjaan="<?=$value['ibu_pekerjaan']?>"
                  data-pendapatan="<?=$value['ibu_pendapatan']?>"
                  data-alamat="<?=$value['ibu_alamat']?>"
                  data-tlp="<?=$value['ibu_tlp']?>"
                  >
                  <i class='fa fa-refresh'></i> edit</button>
                  </td>
                  
                <?php
                echo "</tr>";
                }
                ?>
              </tbody>

            </table>

<hr/>

<h3>Informasi Ayah</h3>
            <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nama Ayah</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Pendidikan</th>
                  <th>Pekerjaan</th>
                  <th>Pendapatan</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($ortu as $value) {
                  echo "<tr>";
                  echo "<td>".$value['ayah_nama']."</td>";
                  echo "<td>".$value['ayah_ttl']."</td>";
                  echo "<td>".$value['ayah_pendidikan']."</td>";
                  echo "<td>".$value['ayah_pekerjaan']."</td>";
                  echo "<td>".$value['ayah_pendapatan']."</td>";
                  echo "<td>".$value['ayah_alamat']."</td>";
                  echo "<td>".$value['ayah_tlp']."</td>";
                  ?>

                  <td><button id="editAyah" class="btn btn-success btn-xs" 
                  data-toggle="modal"
                  data-target="#editAyahModal"
                  data-nama="<?=$value['ayah_nama']?>"
                  data-ttl="<?=$value['ayah_ttl']?>"
                  data-pendidikan="<?=$value['ayah_pendidikan']?>"
                  data-pekerjaan="<?=$value['ayah_pekerjaan']?>"
                  data-pendapatan="<?=$value['ayah_pendapatan']?>"
                  data-alamat="<?=$value['ayah_alamat']?>"
                  data-tlp="<?=$value['ayah_tlp']?>"
                  >
                  <i class='fa fa-refresh'></i> edit</button>
                  </td>
                  
                <?php
                  echo "</tr>";
                }
                ?>
              </tbody>

            </table>

<?php } else { ?>

<form method="post" class="form-horizontal">

  <div class="form-group required">
    <label for="ibu_nama" class="col-sm-2 control-label">Nama Ibu</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_nama" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ibu_ttl" class="col-sm-2 control-label">Tempat, Tanggal. Lahir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_ttl" placeholder="Kota, dd/mm/yyyy" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ibu_pendidikan" class="col-sm-2 control-label">Pendidikan Terakhir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_pendidikan" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ibu_pekerjaan" class="col-sm-2 control-label">Pekerjaan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_pekerjaan" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ibu_pendapatan" class="col-sm-2 control-label">Pendapatan/Bulan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_pendapatan" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ibu_alamat" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-6">
      <textarea name="ibu_alamat" rows="3" class="form-control"></textarea>
    </div>
  </div>

  <div class="form-group required">
    <label for="ibu_no_tlp" class="col-sm-2 control-label">No. Tlp/HP</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ibu_tlp" required>
    </div>
  </div>

  <hr/>

  <div class="form-group required">
    <label for="ayah_nama" class="col-sm-2 control-label">Nama Ayah</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_nama" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ayah_ttl" class="col-sm-2 control-label">Tempat, Tanggal. Lahir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_ttl" placeholder="Kota, dd/mm/yyyy" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ayah_pendidikan" class="col-sm-2 control-label">Pendidikan Terakhir</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_pendidikan" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ayah_pekerjaan" class="col-sm-2 control-label">Pekerjaan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_pekerjaan" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ayah_pendapatan" class="col-sm-2 control-label">Pendapatan/Bulan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_pendapatan" required>
    </div>
  </div>

  <div class="form-group required">
    <label for="ayah_alamat" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-6">
      <textarea name="ayah_alamat" rows="3" class="form-control"></textarea>
    </div>
  </div>

  <div class="form-group required">
    <label for="ayah_no_tlp" class="col-sm-2 control-label">No. Tlp/HP</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ayah_tlp" required>
    </div>
  </div>

  

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit_ortu" class="btn btn-primary btn-sm">Tambah Data</button>
    </div>
  </div>


</form>
                    <?php
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