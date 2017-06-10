<!-- Edit Data Gambar -->
<div class="modal fade modal-success-custom" id="editPictureModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
        <button class="btn btn-success" disabled="true" id="btn_update">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Data Profil -->
<div class="modal fade modal-success-custom" id="editProfilModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Perbaharui Profil</h4>
      </div>
      <div class="modal-body">
        <form method="post">

  <div class="form-group">
    <label for="nama">Nama</label>
    <input class="form-control" type="text" name="nama" id="editNamaMhs">
  </div>

  <div class="form-group">
    <label for="nama">Nik</label>
    <input class="form-control" type="text" name="nik" id="editNikMhs">
  </div>

  <div class="form-group">
    <label for="nama">Tempat Lahir</label>
    <input class="form-control" type="text" name="tempat_lahir" id="editTmptlahirMhs">
  </div>

  <div class="form-group">
    <label for="nama">Tanggal Lahir</label>
    <input class="form-control" type="date" name="tanggal_lahir" id="editTgllahirMhs">
  </div>

   <div class="form-group">
    <label for="alamat">Alamat Lengkap</label>
    <textarea rows="3" class="form-control" name="alamat_lengkap" id="editAlamatMhs"></textarea>
  </div>

   <div class="form-group">
    <label for="darah">Golongan Darah</label>
    <select class="form-control" name="golongan_darah" id="editDarahMhs">
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="AB">AB</option>
      <option value="O">O</option>
    </select>
    <!-- <input class="form-control" type="text" name="golongan_darah" id="editDarahMhs"> -->
  </div>

   <div class="form-group">
    <label for="tlp">No Tlp/Hp</label>
    <input class="form-control" type="text" name="no_tlp" id="editTlpMhs">
  </div>

   <div class="form-group">
    <label for="email">email</label>
    <input class="form-control" type="email" name="email" id="editEmailMhs">
  </div>

   <div class="form-group">
    <label for="sekolah">Asal Sekolah</label>
    <input class="form-control" type="text" name="asal_sekolah" id="editSekolahMhs">
  </div>

   <div class="form-group">
    <label for="nisn">Nomor Induk Siswa Nasional</label>
    <input class="form-control" type="text" name="nomor_induk" id="editNisnMhs">
  </div>

  
            
      </div>
      <div class="modal-footer">
        <input type="hidden" name="nim" value="<?=$this->session->username?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" id="btn_update_profil" name="submit_edit_profil"><i class="fa fa-cloud-upload"></i> update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Data Ibu -->
<div class="modal fade modal-success-custom" id="editIbuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Perbaharui Data Ibu</h4>
      </div>
      <div class="modal-body">
        <form method="post">

  <div class="form-group">
    <label for="nama">Nama Ibu</label>
    <input class="form-control" type="text" name="ibu_nama" id="editNamaIbu">
  </div>

  <div class="form-group">
    <label for="nama">Tempat, Tanggal Lahir</label>
    <input class="form-control" type="text" name="ibu_ttl" id="editTtlIbu">
  </div>

  <div class="form-group">
    <label for="nama">Pendidikan</label>
    <input class="form-control" type="text" name="ibu_pendidikan" id="editPendidikanIbu">
  </div>

  <div class="form-group">
    <label for="nama">Pekerjaan</label>
    <input class="form-control" type="text" name="ibu_pekerjaan" id="editPekerjaanIbu">
  </div>
  
  <div class="form-group">
    <label for="nama">Pendapatan</label>
    <input class="form-control" type="text" name="ibu_pendapatan" id="editPendapatanIbu">
  </div>

  <div class="form-group">
    <label for="nama">Alamat</label>
    <textarea class="form-control" name="ibu_alamat" rows="3" id="editAlamatIbu"></textarea>
  </div>

  <div class="form-group">
    <label for="nama">Telepon</label>
    <input class="form-control" type="text" name="ibu_tlp" id="editTlpIbu">
  </div>
            
      </div>
      <div class="modal-footer">
        <input type="hidden" name="nim" value="<?=$this->session->username?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" id="btn_update_profil" name="submit_edit_ibu"><i class="fa fa-cloud-upload"></i> update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Data Ayah -->
<div class="modal fade modal-success-custom" id="editAyahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Perbaharui Data Ayah</h4>
      </div>
      <div class="modal-body">
        <form method="post">

  <div class="form-group">
    <label for="nama">Nama Ayah</label>
    <input class="form-control" type="text" name="ayah_nama" id="editNamaAyah">
  </div>

  <div class="form-group">
    <label for="nama">Tempat, Tanggal Lahir</label>
    <input class="form-control" type="text" name="ayah_ttl" id="editTtlAyah">
  </div>

  <div class="form-group">
    <label for="nama">Pendidikan</label>
    <input class="form-control" type="text" name="ayah_pendidikan" id="editPendidikanAyah">
  </div>

  <div class="form-group">
    <label for="nama">Pekerjaan</label>
    <input class="form-control" type="text" name="ayah_pekerjaan" id="editPekerjaanAyah">
  </div>
  
  <div class="form-group">
    <label for="nama">Pendapatan</label>
    <input class="form-control" type="text" name="ayah_pendapatan" id="editPendapatanAyah">
  </div>

  <div class="form-group">
    <label for="nama">Alamat</label>
    <textarea class="form-control" name="ayah_alamat" rows="3" id="editAlamatAyah"></textarea>
  </div>

  <div class="form-group">
    <label for="nama">Telepon</label>
    <input class="form-control" type="text" name="ayah_tlp" id="editTlpAyah">
  </div>
            
      </div>
      <div class="modal-footer">
        <input type="hidden" name="nim" value="<?=$this->session->username?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" id="btn_update_profil" name="submit_edit_ayah"><i class="fa fa-cloud-upload"></i> update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Data PasPhoto -->
<div class="modal fade modal-success-custom" id="editPasphotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ganti Pas Photo</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url('mahasiswa/addDocument/pas_photo')?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="gambar">Image</label>
            <input class="form-control" type="file" name="pas_photo" id="update_pasphoto">
            <br/>
            <p class="text-danger">*Max size 1Mb</p>
        </div>
            
      </div>
      <div class="modal-footer">
        <input type="hidden" name="username" value="<?=$this->session->username?>">
        <input type="hidden" name="path" id="pathPasphoto">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" id="btn_update_pasphoto" disabled="true">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Data Ijazah -->
<div class="modal fade modal-success-custom" id="editIjazahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ganti Ijazah</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url('mahasiswa/addDocument/ijazah')?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="gambar">Image</label>
            <input class="form-control" type="file" name="ijazah" id="update_ijazah">
            <br/>
            <p class="text-danger">*Max size 1Mb</p>
        </div>
            
      </div>
      <div class="modal-footer">
        <input type="hidden" name="username" value="<?=$this->session->username?>">
        <input type="hidden" name="path" id="pathIjazah">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" id="btn_update_ijazah" disabled="true">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Data Pembayaran -->
<div class="modal fade modal-success-custom" id="editPembayaranModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Data Pembayaran</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url('mahasiswa/editPembayaran')?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="gambar">Image</label>
            <input class="form-control" type="file" name="img_pembayaran" id="update_pembayaran">
            <br/>
            <p class="text-danger">*Max size 1Mb</p>
        </div>
            
      </div>
      <div class="modal-footer">
        <input type="hidden" name="username" value="<?=$this->session->username?>">
        <input type="hidden" name="path" id="pathPembayaran">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" id="btn_update_pembayaran" disabled="true">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  var pass = "<?=$this->session->pass?>";
</script>