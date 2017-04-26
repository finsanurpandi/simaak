<!-- Edit Data Gambar -->
<div class="modal fade modal-success-custom" id="editPictureModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Profile Picture</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url()?>dosen/editPicture" enctype="multipart/form-data">
		    <div class="form-group">
		      	<label for="gambar">Image</label>
		      	<input class="form-control" type="file" name="gambar">
            <br/>
            <p class="text-danger">*Max size 1Mb</p>
            <p class="text-danger">*Disarankan ratio image 1:1 atau <em>square</em></p>
		    </div>
            
      </div>
      <div class="modal-footer">
        <input type="hidden" name="username" value="<?=$this->session->username?>">
      	<input type="hidden" name="path" value="<?=$user['image']?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success"><i class="fa fa-cloud-upload"></i> update</button>
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
        <form method="post" action="<?=base_url()?>dosen/ubahPassword">
        
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
        <button class="btn btn-success" disabled="true" id="btn_update"><i class="fa fa-cloud-upload"></i> update</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- PENDIDIKAN DOSEN -->
<!-- Tambah data pendidikan dosen -->
<div class="modal fade modal-primary-custom" id="tambahDataPendidikanDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Pendidikan Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="perguruan_tinggi">Perguruan Tinggi</label>
            <input type="hidden" name="nidn" id="nidnTambahPendidikan" value="<?=$this->session->username?>">
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
        <button class="btn btn-primary" name="tambahPendidikanDosen" id="tambahPendidikanDosen"><i class="fa fa-plus"></i> Tambah</button>
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
        <button class="btn btn-success" name="editPendidikanDosen" id="editPendidikanDosen"><i class="fa fa-cloud-upload"></i> update</button>
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
                <button class="btn btn-danger" name="hapusDataPendidikan"><i class="fa fa-trash"></i> delete</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


<!-- PENELITIAN DOSEN -->
<!-- Tambah data PENELITIAN dosen -->
<div class="modal fade modal-primary-custom" id="tambahDataPenelitianDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Penelitian Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="perguruan_tinggi">Judul Penelitian</label>
            <input type="hidden" name="nidn" id="nidnTambahPendidikan" value="<?=$this->session->username?>">
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
            <input class="form-control" type="year" name="tahun">
        </div>

            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahPenelitianDosen" id="tambahPenelitianDosen"><i class="fa fa-plus"></i> tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Data PENELITIAN dosen -->
<div class="modal fade modal-success-custom" id="editPenelitianDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Pendidikan Dosen</h4>
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
            <input class="form-control" type="year" name="tahun" id="tahuneditpenelitian">
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" name="editPenelitianDosen" id="editPenelitianDosen"><i class="fa fa-cloud-upload"></i> update</button>
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
                <button class="btn btn-danger" name="hapusDataPenelitian"><i class="fa fa-trash"></i> delete</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


<!-- PENGABDIAN DOSEN -->
<!-- Tambah data PENGABDIAN dosen -->
<div class="modal fade modal-primary-custom" id="tambahDataPengabdianDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Pengabdian Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="perguruan_tinggi">Program Pengabdian</label>
            <input type="hidden" name="nidn" id="nidnTambahPengabdian" value="<?=$this->session->username?>">
            <input class="form-control" type="text" name="program" required>
        </div>

        <div class="form-group">
            <label for="bidang_ilmu">Judul</label>
            <input class="form-control" type="text" name="judul" required>
        </div>

        <div class="form-group">
            <label for="lembaga">Anggota</label>
            <input class="form-control" type="text" name="anggota">
        </div>

        <div class="form-group">
            <label for="penerbit">Tahun</label>
            <input class="form-control" type="text" name="tahun" required>
        </div>

            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahPengabdianDosen" id="tambahPengabdianDosen"><i class="fa fa-plus"></i> tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Data PENGABDIAN dosen -->
<div class="modal fade modal-success-custom" id="editPengabdianDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Pengabdian Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="judul_penelitian">Judul Penelitian</label>
            <input type="hidden" name="id" id="idEditPengabdian">
            <input class="form-control" type="text" name="program" id="programEditPengabdian" required>
        </div>

        <div class="form-group">
            <label for="bidang_ilmu">Judul</label>
            <input class="form-control" type="text" name="judul" id="judulEditPengabdian" required>
        </div>

        <div class="form-group">
            <label for="lembaga">Anggota</label>
            <input class="form-control" type="text" id="anggotaEditPengabdian" name="anggota">
        </div>

        <div class="form-group">
            <label for="penerbit">Tahun</label>
            <input class="form-control" type="text" name="tahun" id="tahunEditPengabdian" required>
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" name="editPengabdianDosen" id="editPengabdianDosen"><i class="fa fa-cloud-upload"></i> update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- HAPUS DATA PENGABDIAN DOSEN -->
<div class="modal modal-danger-custom fade" id="hapusDataPengabdian">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data Pengabdian</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data?</p>
              </div>
              <div class="modal-footer">
                <form method="post">
                <input type="hidden" name="id" id="idpengabdian">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" name="hapusDataPengabdian"><i class="fa fa-trash"></i> delete</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


<!-- DOKUMEN DOSEN -->
<!-- Tambah data DOKUMEN dosen -->
<div class="modal fade modal-primary-custom" id="tambahDataDokumenDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Dokumen Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url('dosen/addDocument')?>" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="judul_file">Judul File</label>
            <input type="hidden" name="nidn" id="nidnTambahDokumen" value="<?=$this->session->username?>">
            <input class="form-control" type="text" name="judul_file">
        </div>

        <div class="form-group">
            <label for="nama_file">File</label>
            <input class="form-control" type="file" name="gambar">
        </div>

            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahDokumenDosen" id="tambahDokumenDosen"><i class="fa fa-plus"></i> tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Data Dokumen dosen -->
<div class="modal fade modal-success-custom" id="editDokumenDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Dokumen Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url('dosen/editdocument')?>" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="judul_file">Nama File</label>
            <input type="hidden" name="id" id="ideditdokumen">
            <input type="hidden" name="nama" id="namaeditdokumen">
            <input class="form-control" type="text" name="judul_file" id="juduleditdokumen">
        </div>

        <div class="form-group">
            <label for="nama_file">File</label>
            <input class="form-control" type="file" name="gambar">
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" name="editDokumenDosen" id="editDokumenDosen"><i class="fa fa-cloud-upload"></i> update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- HAPUS DATA DOKUMEN DOSEN -->
<div class="modal modal-danger-custom fade" id="hapusDataDokumen">
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
                <input type="hidden" name="id" id="iddokumen">
                <input type="hidden" name="nama" id="namadokumen">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" name="hapusDataDokumen"><i class="fa fa-trash"></i> delete</button>
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
</script>