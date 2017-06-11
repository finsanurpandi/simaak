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



<script>
  var pass = "<?=$this->session->pass?>";
  var url = "<?=base_url('assets/uploads/documents/mahasiswa/')?>";
</script>