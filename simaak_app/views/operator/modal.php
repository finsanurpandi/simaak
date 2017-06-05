<!-- PROFIL -->
<!-- Edit Data Gambar -->
<div class="modal fade modal-success-custom" id="editPictureModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Profile Picture</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url()?>operator/editPicture" enctype="multipart/form-data">
        <div class="form-group">
            <label for="gambar">Image</label>
            <input class="form-control" type="file" name="gambar" id="update_image">
            <br/>
            <p class="text-danger">*Max size 1Mb</p>
            <p class="text-danger">*Disarankan ratio image 1:1 atau <em>square</em></p>
        </div>
            
      </div>
      <div class="modal-footer">
        <input type="hidden" name="username" value="<?=$this->session->username?>">
        <input type="hidden" name="path" value="<?=$user['image']?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" id="btn_update_image" disabled="true">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Ubah Password -->
<div class="modal fade modal-success-custom" id="ubahPassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ganti Password</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url()?>operator/ubahPassword">
        <div class="form-group has-feedback" id="formPassNow">
            <label for="gambar">Password Sekarang</label>
            <input class="form-control" type="password" name="current_pass" id="current_pass">
            <span id="feedbackPassNowTrue" class="glyphicon glyphicon-ok form-control-feedback text-success" aria-hidden="true"></span>
            <span id="feedbackPassNowFalse" class="glyphicon glyphicon-remove form-control-feedback text-danger" aria-hidden="true"></span>
            <div id="status_current" class=""></div>
        </div>
        <div class="form-group has-feedback" id="formPassNew">
            <label for="gambar">Password Baru</label>
            <input class="form-control" type="password" name="new_pass" id="new_pass">
            <span id="feedbackPassNewTrue" class="glyphicon glyphicon-ok form-control-feedback text-success" aria-hidden="true"></span>
            <span id="feedbackPassNewFalse" class="glyphicon glyphicon-remove form-control-feedback text-danger" aria-hidden="true"></span>
        </div>
        <div class="form-group has-feedback" id="formPassCurr">
            <label for="gambar">Konfirmasi Password Baru</label>
            <input class="form-control" type="password" name="confirm_pass" id="confirm_pass">
            <span id="feedbackPassCurrTrue" class="glyphicon glyphicon-ok form-control-feedback text-success" aria-hidden="true"></span>
            <span id="feedbackPassCurrFalse" class="glyphicon glyphicon-remove form-control-feedback text-danger" aria-hidden="true"></span>
            <div id="status_new" class=""></div>
        </div>
        
            
      </div>
      <div class="modal-footer">
        <input type="hidden" name="username" value="<?=$this->session->username?>">
        <input type="hidden" name="path" value="<?=$user['image']?>">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" disabled="true" id="btn_update">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- MAHASISWA -->
<!-- Tambah data mahasiswa -->
<div class="modal fade modal-primary-custom" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Mahasiswa</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="nim">NPM</label>
            <input class="form-control" type="text" name="nim" id="nim" onchange="checkNim();">
            <div id="statusNim"></div>
        </div>
        
        <div class="form-group">
            <label for="nama">Nama</label>
            <input class="form-control" type="text" name="nama">
        </div>

        <div class="form-group">
            <label for="angkatan">Tahun Masuk</label>
            <input class="form-control" type="text" name="angkatan" placeholder="yyyy">
        </div>

        <div class="form-group">
            <label for="jenjang">Jenjang</label>
            <select class="form-control" name="jenjang">
              <option>---</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
            </select>
        </div>

        <div class="form-group">
            <label for="prodi">Program Studi</label>
            <select class="form-control" name="kode_prodi" id="kodeprodimhs">
              <option>---</option>
              <option value="MPI">Manajemen Pendidikan Islam</option>
              <option value="ES">Ekonomi Syariah</option>
              <option value="PBS">Perbankan Syariah</option>
            </select>
        </div>

        <div class="form-group">
            <label for="prodi">Kelas</label>
            <select class="form-control" name="kelas" id="kelasmhs">
              <option>---</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jenjang">Jenis Kelamin</label><br/>
            <label class="radio-inline">
              <input type="radio" name="jenis_kelamin" value="L"> Laki-Laki
            </label>
            <label class="radio-inline">
              <input type="radio" name="jenis_kelamin" value="P"> Perempuan
            </label>
        </div>

        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input class="form-control" type="text" name="tempat_lahir">
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input class="form-control" type="date" name="tanggal_lahir" placeholder="mm/dd/yyyy">
            </div>
        </div>

        <div class="form-group">
            <label for="dosen_wali">Dosen Wali</label>
            <select class="form-control" name="dosen_wali">
            <option>---</option>
              <?php
                foreach ($dosen as $key => $value) {
                  if ($value['gelar_depan'] == null) {
              ?>
                <option value="<?=$value['nidn']?>"><?=$value['nidn'].' - '.$value['nama'].', '.$value['gelar_belakang']?></option>
              <?php
                  } else {
              ?>
                <option value="<?=$value['nidn']?>"><?=$value['nidn'].' - '.$value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang']?></option>
              <?php
                  }
              ?>

              
              <?php } ?>
            </select>
        </div>
        
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahMahasiswa" id="btnTambahMahasiswa" disabled="true">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- DOSEN -->
<!-- Tambah data profil dosen -->
<div class="modal fade modal-primary-custom" id="tambahDataDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <!-- <div class="form-group">
            <label for="nidn">NIDN</label>
            <input class="form-control" type="text" name="nidn" id="nidn" maxlength="10" onchange="checkUsername();">
            <div id="statusUsername"></div>
        </div> -->
        
        <div class="form-group">
            <label for="nik">NIDN</label>
            <select name="nidn" class="form-control">
            <option></option>
              <?php
foreach ($alldosen as $key => $value) {
  echo "<option value=".$value['nidn'].">".$value['nidn']." - ".$value['gelar_depan']." ".$value['nama'].", ".$value['gelar_belakang']."</option>";
}
              ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="nik">Status Dosen</label>
            <select name="status_dosen" class="form-control">
            <option></option>
            <option value="0">Dosen Tetap</option>
            <option value="1">Dosen Tetap diluar bidang keahlian</option>
            <option value="3">Dosen Tidak Tetap Struktural</option>
            <option value="2">Dosen Tidak Tetap</option>
            </select>
        </div>
        
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahDosen" id="btnTambahDosen">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- HAPUS DATA DOSEN -->
<div class="modal modal-danger-custom fade" id="hapusDosenModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data Dosen</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data dengan nama <strong><span id="namadosen"></span></strong> ?</p>
              </div>
              <div class="modal-footer">
                <form method="post">
                <input type="hidden" name="nidn" id="iddosen">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" name="hapusDataDosen">Delete</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


<!-- PENDIDIKAN DOSEN -->
<!-- Tambah data pendidikan dosen -->
<div class="modal fade modal-primary-custom" id="tambahDataPendidikanDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Pendidikan Dosen <?=$key?></h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        <div class="form-group">
          <label for="perguruan_tinggi">Jenjang</label>
          <select name="jenjang" class="form-control">
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
          </select>
        </div>
        
        <div class="form-group">
            <label for="perguruan_tinggi">Perguruan Tinggi</label>
            <input type="hidden" name="nidn" id="nidnTambahPendidikan" value="<?=$nidndosen?>">
            <input class="form-control" type="text" name="perguruan_tinggi">
        </div>

        <div class="form-group">
            <label for="fakultas">Fakultas</label>
            <input class="form-control" type="text" name="fakultas">
        </div>

        <div class="form-group">
            <label for="program_studi">Program Studi</label>
            <input class="form-control" type="text" name="program_studi">
        </div>

        <div class="form-group">
            <label for="ipk">IPK</label>
            <input class="form-control" type="text" name="ipk">
        </div>
        
        <div class="form-group">
            <label for="gelar">Gelar</label>
            <input class="form-control" type="text" name="gelar">
        </div>

        <div class="form-group">
            <label for="tahun_lulus">Tahun Lulus</label>
            <input class="form-control" type="text" name="tahun_lulus">
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahPendidikanDosen" id="tambahPendidikanDosen">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Edit Data Pendidikan dosen -->
<div class="modal fade modal-success-custom" id="editPendidikanDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Pendidikan Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        <div class="form-group">
          <label for="perguruan_tinggi">Jenjang</label>
          <select name="jenjang" class="form-control">
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
          </select>
        </div>
        
        <div class="form-group">
            <label for="perguruan_tinggi">Perguruan Tinggi</label>
            <input type="hidden" name="id" id="ideditpendidikan">
            <input class="form-control" type="text" name="perguruan_tinggi" id="pteditpendidikan">
        </div>

        <div class="form-group">
            <label for="fakultas">Fakultas</label>
            <input class="form-control" type="text" name="fakultas" id="fakultaseditpendidikan">
        </div>

        <div class="form-group">
            <label for="program_studi">Program Studi</label>
            <input class="form-control" type="text" name="program_studi" id="prodieditpendidikan">
        </div>

        <div class="form-group">
            <label for="ipk">IPK</label>
            <input class="form-control" type="text" name="ipk" id="ipkeditpendidikan">
        </div>
        
        <div class="form-group">
            <label for="gelar">Gelar</label>
            <input class="form-control" type="text" name="gelar" id="gelareditpendidikan">
        </div>

        <div class="form-group">
            <label for="tahun_lulus">Tahun Lulus</label>
            <input class="form-control" type="text" name="tahun_lulus" id="luluseditpendidikan">
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" name="editPendidikanDosen" id="editPendidikanDosen">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- HAPUS DATA PENDIDIKAN DOSEN -->
<div class="modal modal-danger-custom fade" id="hapusDataPendidikan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data Pendidikan</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data?</p>
              </div>
              <div class="modal-footer">
                <form method="post">
                <input type="hidden" name="id" id="idpendidikan">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" name="hapusDataPendidikan">Delete</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


<!-- PENELITIAN DOSEN -->
<!-- Tambah data penelitian dosen -->
<div class="modal fade modal-primary-custom" id="tambahDataPenelitianDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Penelitian Dosen <?=$key?></h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="judul_penelitian">Judul Penelitian</label>
            <input type="hidden" name="nidn" id="nidnTambahPendidikan" value="<?=$nidndosen?>">
            <input class="form-control" type="text" name="judul_penelitian">
        </div>

        <div class="form-group">
            <label for="bidang_ilmu">Bidang Ilmu</label>
            <input class="form-control" type="text" name="bidang_ilmu">
        </div>

        <div class="form-group">
            <label for="lembaga">Lembaga</label>
            <input class="form-control" type="text" name="lembaga">
        </div>

        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input class="form-control" type="text" name="penerbit">
        </div>
        
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input class="form-control" type="text" name="tahun">
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahPenelitianDosen" id="tambahPenelitianDosen">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Edit Data Penelitian dosen -->
<div class="modal fade modal-success-custom" id="editPenelitianDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Penelitian Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="judul_penelitian">Judul Penelitian</label>
            <input type="hidden" name="id" id="ideditpenelitian">
            <input class="form-control" type="text" name="judul_penelitian" id="juduleditpenelitian">
        </div>

        <div class="form-group">
            <label for="bidang_ilmu">Bidang Ilmu</label>
            <input class="form-control" type="text" name="bidang_ilmu" id="bidangeditpenelitian">
        </div>

        <div class="form-group">
            <label for="lembaga">Lembaga</label>
            <input class="form-control" type="text" name="lembaga" id="lembagaeditpenelitian">
        </div>

        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input class="form-control" type="text" name="penerbit" id="penerbiteditpenelitian">
        </div>
        
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input class="form-control" type="text" name="tahun" id="tahuneditpenelitian">
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" name="editPenelitianDosen" id="editPenelitianDosen">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- HAPUS DATA PENELITIAN DOSEN -->
<div class="modal modal-danger-custom fade" id="hapusDataPenelitian">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data Penelitian</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data?</p>
              </div>
              <div class="modal-footer">
                <form method="post">
                <input type="hidden" name="id" id="idpenelitian">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" name="hapusDataPenelitian">Delete</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


<!-- JADWAL -->
<!-- Tambah data JADWAL -->
<div class="modal fade modal-primary-custom" id="tambahDataJadwalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Jadwal</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="nidn">Matakuliah</label>
            <!-- <select id="kodeMatkul" class="form-control" name="kode_matkul" onclick="loadKodeMatkul();">
                <option>---</option>
            </select> -->
            <select class="form-control select2" name="kode_matkul" id="tambahKodeMatkul">
            <option></option>
<?php
foreach ($matkul_modal as $key => $value) {
?>
<option value="<?=$value['kode_matkul'].','.$value['sks'].','.$value['nama_matkul'].','.$value['semester']?>"> 
  <?=$value['kode_matkul'].' - Semester '. $value['semester'].' - '.$value['nama_matkul']?> 
</option>
<?php } ?>
            </select>
            <!-- <input class="form-control" type="hidden" name="nama_matkul" id="namaMatkul">
            <input class="form-control" type="hidden" name="semester" id="semester">
            <input class="form-control" type="hidden" name="sks" id="sks"> -->
        </div>

        <div class="form-group">
            <label for="nidn">Dosen</label>
            <select id="nidnJadwal" class="form-control" name="nidn">
                <option></option>
<?php
foreach ($dosen_modal as $key => $value) {
  if ($value['gelar_depan'] !== '') {
?>
<option value="<?=$value['nidn'].'-'.$value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang']?>"> 
  <?=$value['nidn'].' - '.$value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang']?> 
</option>
<?php } else {
?>
<option value="<?=$value['nidn'].'-'.$value['nama'].', '.$value['gelar_belakang']?>"> 
  <?=$value['nidn'].' - '.$value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang']?> 
</option>
<?php }
  } ?>
            </select>
            <input class="form-control" type="hidden" name="nama_dosen" id="namaDosen">
        </div>

        <div class="form-group">
            <label for="nidn">Kelas</label>
            <select name="kelas" class="form-control">
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nidn">Hari</label>
            <select name="hari" class="form-control">
              <option value="senin">Senin</option>
              <option value="selasa">Selasa</option>
              <option value="rabu">Rabu</option>
              <option value="kamis">Kamis</option>
              <option value="jum'at">Jum'at</option>
              <option value="sabtu">Sabtu</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nidn">Mulai</label>
            <input class="form-control" type="text" name="waktu" id="waktuMulai" placeholder="hh.mm">
        </div>

       <!--  <div class="form-group">
            <label for="nidn">Selesai</label>
            <input class="form-control" type="hidden" name="waktuSelesai" id="waktuSelesai" disabled="true" placeholder="hh:mm">
        </div> -->

        <div class="form-group">
            <label for="nidn">Ruangan</label>
            <select name="ruangan" class="form-control">
              <option value="ruangan-1">Ruangan-1</option>
              <option value="ruangan-2">Ruangan-2</option>
              <option value="ruangan-3">Ruangan-3</option>
              <option value="ruangan-4">Ruangan-4</option>
            </select>
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahJadwal" id="btnTambahJadwal"><i class="fa fa-plus"></i> Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- EDIT data JADWAL -->
<div class="modal fade modal-success-custom" id="editJadwalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Jadwal Perkuliahan</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
          <label>Kode Matakuliah</label>
          <input class="form-control" id="editKodeMatkulJadwal" disabled="true">
        </div>

        <div class="form-group">
          <label>Matakuliah</label>
          <input class="form-control" id="editNamaMatkulJadwal" disabled="true">
        </div>

        <div class="form-group">
            <label for="nidn">Dosen</label>
            <select id="editDosenJadwal" class="form-control" name="dosen">
                <option>---</option>
<?php
  foreach ($dosen as $key => $value) {
    if ($value['gelar_depan'] !== '') {
?>
    <option value="<?=$value['nidn'].'-'.$value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang']?>"><?=$value['nidn'].' - '.$value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang']?></option>

<?php } else { ?>
    
    <option value="<?=$value['nidn'].'-'.$value['nama'].', '.$value['gelar_belakang']?>"><?=$value['nidn'].' - '.$value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang']?></option>

<?php } } ?>

            </select>
            <input class="form-control" type="hidden" name="nama_dosen" id="editNamaDosen">
        </div>

        <div class="form-group">
            <label for="nidn">Kelas</label>
            <select name="kelas" class="form-control" id="editKelasJadwal">
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nidn">Hari</label>
            <select name="hari" class="form-control" id="editHariJadwal">
              <option value="senin">Senin</option>
              <option value="selasa">Selasa</option>
              <option value="rabu">Rabu</option>
              <option value="kamis">Kamis</option>
              <option value="jum'at">Jum'at</option>
              <option value="sabtu">Sabtu</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nidn">Waktu</label>
            <input class="form-control" type="text" name="waktu" id="editWaktuJadwal" placeholder="hh.mm">
        </div>

        <div class="form-group">
            <label for="nidn">Ruangan</label>
            <select name="ruangan" class="form-control" id="editRuanganJadwal">
              <option value="ruangan-1">Ruangan-1</option>
              <option value="ruangan-2">Ruangan-2</option>
              <option value="ruangan-3">Ruangan-3</option>
              <option value="ruangan-4">Ruangan-4</option>
            </select>
        </div>
        
            
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id_jadwal" id="editIdJadwal">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" name="editJadwal" id="btnEditJadwal"><i class="fa fa-recycle"></i> Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- HAPUS DATA DOSEN -->
<div class="modal modal-danger-custom fade" id="hapusJadwalModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data Dosen</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data jadwal dengan matakuliah <strong><span id="namamatkul"></span></strong> ?</p>
              </div>
              <div class="modal-footer">
                <form method="post">
                <input type="hidden" name="id_jadwal" id="idjadwal">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" name="hapusJadwal">Delete</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

<script>
  var pass = "<?=$this->session->pass?>";

  var baseurl = "<?=base_url()?>";

  var kodeprodi = "<?=$this->session->kode_prodi?>";

  var periode = "<?=substr($this->session->tahun_ajaran, 4)?>"; 

  if (periode % 2) {
    var ta = 'ganjil';
  } else {
    ta = 'genap';
  }

  var pm = document.getElementById('kodeprodimhs');

  var pd = document.getElementById('kodeprodidosen');

  for (var i = 0; i < pm.length; i++) {
    if (pm.options[i].value !== kodeprodi) {
      pm.options[i].setAttribute('disabled', 'true');
    } else {
      pm.options[i].setAttribute('selected', 'true');
    }
  };

  for (var i = 0; i < pd.length; i++) {
    if (pd.options[i].value !== kodeprodi) {
      pd.options[i].setAttribute('disabled', 'true');
    } else {
      pd.options[i].setAttribute('selected', 'true');
    }
  };

var visitMatkul = 0;
var visitDosen = 0;
var visitEditDosen = 0;
var sks = 0;

function loadKodeMatkul(){
  // var kodeMatkul = document.getElementById('kodeMatkul');
  
  // $.ajax({
  //   method: "post",
  //   url: baseurl+"ajax/loadMatkul/"+ta,
  //   dataType: 'json',
  //   success: function(res){
  //     visitMatkul += 1;
  //     if (visitMatkul == 1) {
  //       for (var i = 0; i < res.length; i++) {
  //         // kodeMatkul.appendChild("<option value='"+res[i]['kode_matkul']+"'>"+res[i]['kode_matkul']+"</option>");
  //         var x = document.createElement("option");
  //         x.setAttribute('value', res[i]['kode_matkul']);
  //         var t = document.createTextNode(res[i]['kode_matkul']+' - Semester '+res[i]['semester']+' - '+res[i]['nama_matkul']);
  //         x.appendChild(t);
  //         document.getElementById('kodeMatkul').appendChild(x);
  //       };
  //     console.log(res);
  //     console.log('hey');
  //     };

  //   },
  //   error: function(jqXHR, status, err){
  //     console.log(jqXHR);
  //     console.log(status);
  //     console.log(err);
  //   }
  // });
    

};

function loadNidn(){
  var nidn = document.getElementById('nidnJadwal');

  $.ajax({
    method: "post",
    url: baseurl+"ajax/loadNidn",
    dataType: 'json',
    success: function(res){
      visitDosen += 1;
      if (visitDosen == 1) {
        for (var i = 0; i < res.length; i++) {
          var x = document.createElement("option");
          x.setAttribute('value', res[i]['nidn']);
          var t = document.createTextNode(res[i]['nidn']+' - '+res[i]['gelar_depan']+' '+res[i]['nama']+'., '+res[i]['gelar_belakang']);
          x.appendChild(t);
          nidn.appendChild(x);
        };
      };
      console.log('hello');
      console.log(res);

    },
    error: function(error){
      console.log(error);
    }
  });

};

// function loadEditNidn(){
// var editnidn = document.getElementById('editNidnJadwal');

//   $.ajax({
//     method: "post",
//     url: baseurl+"ajax/loadNidn",
//     dataType: 'json',
//     success: function(res){
//       visitEditDosen += 1;
//       if (visitEditDosen == 1) {
//         for (var i = 0; i < res.length; i++) {
//           var x = document.createElement("option");
//           x.setAttribute('value', res[i]['nidn']);
//           var t = document.createTextNode(res[i]['nidn']+' - '+res[i]['gelar_depan']+' '+res[i]['nama']+'., '+res[i]['gelar_belakang']);
//           x.appendChild(t);
//           document.getElementById('editNidnJadwal').appendChild(x);
//         };
//       };

//     },
//     error: function(error){
//       console.log(error);
//     }
//   });
// }
  

</script>













