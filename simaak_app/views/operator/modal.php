<!-- PROFIL -->
<!-- Edit Data Gambar -->
<div class="modal fade" id="editPictureModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Profile Picture</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url()?>mahasiswa/editPicture" enctype="multipart/form-data">
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
        <button class="btn btn-primary" id="btn_update_image" disabled="true">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Ubah Password -->
<div class="modal fade" id="ubahPassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ganti Password</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url()?>mahasiswa/ubahPassword">
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
        <button class="btn btn-primary" disabled="true" id="btn_update">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- MAHASISWA -->
<!-- Tambah data mahasiswa -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Mahasiswa</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="nim">NIM</label>
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
            <select class="form-control" name="prodi">
              <option>---</option>
              <option value="Manajemen Pendidikan Islam">Manajemen Pendidikan Islam</option>
              <option value="Ekonomi Syariah">Ekonomi Syariah</option>
              <option value="Perbankan Syariah">Perbankan Syariah</option>
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
            <input class="form-control" type="date" name="tanggal_lahir">
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
<!-- Tambah data dosen -->
<div class="modal fade" id="tambahDataDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="nidn">NIDN</label>
            <input class="form-control" type="text" name="nidn" id="nidn" maxlength="10" onchange="checkUsername();">
            <div id="statusUsername"></div>
        </div>
        
        <div class="form-group">
            <label for="nik">NIK</label>
            <input class="form-control" type="text" name="nik" maxlength="10">
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input class="form-control" type="text" name="nama">
        </div>

        <div class="form-group">
            <label for="gelar_depan">Gelar Depan</label>
            <input class="form-control" type="text" name="gelar_depan">
        </div>

        <div class="form-group">
            <label for="gelar_belakang">Gelar Belakang</label>
            <input class="form-control" type="text" name="gelar_belakang">
        </div>

        <div class="form-group">
            <label for="prodi">Program Studi</label>
            <select class="form-control" name="prodi">
              <option>---</option>
              <option value="Manajemen Pendidikan Islam">Manajemen Pendidikan Islam</option>
              <option value="Ekonomi Syariah">Ekonomi Syariah</option>
              <option value="Perbankan Syariah">Perbankan Syariah</option>
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
            <label for="jabatan_fungsional">Jabatan Fungsional</label>
            <select class="form-control" name="jabatan_fungsional" id="jabfung" onchange="selectJabfung()">
              <option>---</option>
              <option value="Asisten Ahli">Asisten Ahli</option>
              <option value="Lektor">Lektor</option>
              <option value="Lektor Kepala">Lektor Kepala</option>
              <option value="Guru Besar">Guru Besar</option>
            </select>
        </div>

        <div class="form-group" disabled="true">
            <label for="jabatan_fungsional">Golongan</label>
            <select class="form-control" name="golongan" disabled="true" id="golongan">
              <!-- <option>---</option> -->
            </select>
        </div>


        <div class="form-group">
            <label for="jabatan_struktural">Jabatan Struktural</label>
            <input class="form-control" type="text" name="jabatan_struktural">
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahDosen" id="btnTambahDosen" disabled="true">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  var pass = "<?=$this->session->pass?>";

  var baseurl = "<?=base_url()?>";

</script>













