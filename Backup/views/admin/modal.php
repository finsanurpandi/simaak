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

<!-- Edit DATA VALIDASI -->
<div class="modal fade modal-success-custom" id="validasiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Validasi Pembayaran</h4>
      </div>
      <div class="modal-body">
      <img id="buktiPembayaran" src="" width="400px" align="center" />

      <hr/>
        <form method="post">

  <div class="form-group">
    <label for="nama">Status Pembayaran</label>
    <select class="form-control" name="status" id="statusPembayaran">
      <option value="0">Menunggu</option>
      <option value="1">Sudah divalidasi</option>
    </select>
  </div>

  <div class="form-group">
    <label for="nama">Persentase Pembayaran</label>
    <select class="form-control" name="persentase" id="persentasePembayaran">
      <option value="0">0%</option>
      <option value="25">25%</option>
      <option value="50">50%</option>
      <option value="75">75%</option>
      <option value="100">100%</option>
    </select>
  </div>

       
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" id="idpembayaran">
        <input type="hidden" name="nim" id="nimpembayaran">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" name="submit_validasi"><i class="fa fa-cloud-upload"></i> validasi</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- HAPUS DATA VALIDASI -->
<div class="modal modal-danger-custom fade" id="hapusValidasiModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data Validasi</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data?</p>
              </div>
              <div class="modal-footer">
                <form method="post">
                <input type="hidden" name="id" id="idhapusvalidasi">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" name="hapusDataValidasi">Delete</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


<!-- TAMBAH DATA DOSEN -->
<div class="modal fade modal-primary-custom" id="tambahDataDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post">
  
  <div class="form-group">
    <label for="nim">NIDN</label>
    <input class="form-control" type="text" name="nidn" id="nidnAdmin" onchange="checkNidn();">
    <div id="statusUsernameAdmin"></div>
  </div>

  <div class="form-group">
    <label for="nama">NIK</label>
    <input class="form-control" name="nik">
  </div>

  <div class="form-group">
    <label for="nama">Nama</label>
    <input class="form-control" name="nama">
  </div>

  <div class="form-group">
    <label for="nama">Gelar Depan</label>
    <input class="form-control" name="gelar_depan">
  </div>

  <div class="form-group">
    <label for="nama">Gelar Belakang</label>
    <input class="form-control" name="gelar_belakang">
  </div>

  <div class="form-group">
    <label for="nama">Prodi</label>
    <select class="form-control" name="kode_prodi">
      <option></option>
      <option value="ES">Ekonomi Syariah</option>
      <option value="MPI">Manajemen Pendidikan Islam</option>
      <option value="PBS">Perbankan Syariah</option>
    </select>
  </div>

  <div class="form-group">
    <label for="nama">Jenis Kelamin</label>
    <select class="form-control" name="jenis_kelamin">
      <option></option>
      <option value="L">Laki-Laki</option>
      <option value="P">Perempuan</option>
    </select>
  </div>

  <div class="form-group">
    <label for="nama">Jabatan Fungsional</label>
    <select class="form-control" name="jabatan_fungsional" id="jabfung" onchange="selectJabfung();">
      <option></option>
      <option value="Asisten Ahli">Asisten Ahli</option>
      <option value="Lektor">Lektor</option>
      <option value="Lektor Kepala">Lektor Kepala</option>
      <option value="Guru Besar">Guru Besar</option>
    </select>
  </div>

  <div class="form-group">
    <label for="nama">Golongan</label>
    <select class="form-control" name="golongan" id="golonganAdmin" disabled="true">
      <option></option>
    </select>
  </div>

  <div class="form-group">
    <label for="nama">Jenis Dosen</label>
    <select class="form-control" name="jenis_dosen" id="jenisDosen" onchange="selectJabStruk();">
      <option></option>
      <option value="DS">Dosen Biasa</option>
      <option value="DT">Dosen Dengan Tugas Tambahan</option>
      <option value="PR">Profesor</option>
      <option value="PT">Profesor Dengan Tugas Tambahan</option>
    </select>
  </div>

  <div class="form-group">
    <label for="nama">Jabatan Struktural</label>
    <input class="form-control" name="jabatan_struktural" id="jabstruk" disabled="true">
  </div>

       
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" id="idpembayaran">
        <input type="hidden" name="nim" id="nimpembayaran">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" name="tambahDosenAdmin" id="btnTambahDosenAdmin" disabled="true"><i class="fa fa-plus"></i> tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>



<script>
  var pass = "<?=$this->session->pass?>";
  var url = "<?=base_url('assets/uploads/documents/mahasiswa/')?>";
  var baseurl = "<?=base_url()?>";
</script>