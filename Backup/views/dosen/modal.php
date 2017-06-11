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
        <form method="post" action="" enctype="multipart">
        
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
            <input class="form-control" type="number" name="tahun_lulus">
        </div>
       <!--  <div class="form-group">
            <label for="tahun_lulus">Ijazah</label>
            <input class="form-control" type="file" name="userfile[]" multiple="multiple">
        </div>
        <div class="form-group">
            <label for="tahun_lulus">Transkrip</label>
            <input class="form-control" type="file" name="userfile[]" multiple="multiple">
        </div> -->
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahPendidikanDosen" id="tambahPendidikanDosen"><i class="fa fa-plus"></i> Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- TAMBAH DATA IJAZAH -->
<div class="modal fade modal-primary-custom" id="tambahIjazahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Ijazah</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="perguruan_tinggi">File Ijazah</label>
            <input type="hidden" name="id" id="idijazahdosen">
            <input class="form-control" type="file" name="ijazah" id="ijazahdosen">
        </div>
         
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahIjazahDosen" id="tambahIjazahDosen" disabled="true"><i class="fa fa-plus"></i> Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- EDIT DATA IJAZAH -->
<div class="modal fade modal-success-custom" id="editIjazahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Ijazah</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="perguruan_tinggi">File Ijazah</label>
            <input type="hidden" name="id" id="ideditijazahdosen">
            <input type="hidden" name="img" id="imgeditijazahdosen">
            <input class="form-control" type="file" name="ijazah" id="editfileijazahdosen">
        </div>
         
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" name="editIjazahDosen" id="editIjazahDosen" disabled="true"><i class="fa fa-recycle"></i> Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- TAMBAH DATA TRANSKRIP -->
<div class="modal fade modal-primary-custom" id="tambahTranskripModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Transkrip</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="perguruan_tinggi">File Transkrip</label>
            <input type="hidden" name="id" id="idtranskripdosen">
            <input class="form-control" type="file" name="transkrip" id="transkripdosen">
        </div>
         
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahTranskripDosen" id="tambahTranskripDosen" disabled="true"><i class="fa fa-plus"></i> Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- EDIT DATA TRANSKRIP -->
<div class="modal fade modal-success-custom" id="editTranskripModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Transkrip</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="perguruan_tinggi">File Transkrip</label>
            <input type="hidden" name="id" id="idedittranskripdosen">
            <input type="hidden" name="img" id="imgedittranskripdosen">
            <input class="form-control" type="file" name="transkrip" id="editfiletranskripdosen">
        </div>
         
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" name="editTranskripDosen" id="editTranskripDosen" disabled="true"><i class="fa fa-recycle"></i> Update</button>
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
<!-- Tambah data PENGAJARAN dosen -->
<div class="modal fade modal-primary-custom" id="tambahDataPengajaranDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Penelitian Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="perguruan_tinggi">Jenis Kegiatan</label>
            <input type="hidden" name="nidn" id="nidnTambahPengajaran" value="<?=$this->session->username?>">
            <input class="form-control" type="text" name="jenis_kegiatan">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Bukti Penugasan</label>
            <input class="form-control" type="text" name="bukti_penugasan">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">SKS Beban Kerja</label>
            <input class="form-control" type="number" name="sks_beban_kerja">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Masa Penugasan</label>
            <input class="form-control" type="text" name="masa_penugasan">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Bukti Dokumen</label>
            <input class="form-control" type="text" name="bukti_dokumen">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">SKS Kinerja</label>
            <input class="form-control" type="number" name="sks_kinerja">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Rekomendasi</label>
            <select name="rekomendasi" class="form-control">
              <option>---</option>
              <option value="berlangsung">BERLANGSUNG</option>
              <option value="selesai">SELESAI</option>
            </select>
        </div>

        

            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="tambahPengajaranDosen" id="tambahPenelitianDosen"><i class="fa fa-plus"></i> tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Data PENGAJARAN dosen -->
<div class="modal fade modal-success-custom" id="editPengajaranDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Pengajaran Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="perguruan_tinggi">Jenis Kegiatan</label>
            <input type="hidden" name="id" id="ideditpengajaran">
            <input class="form-control" type="text" name="jenis_kegiatan" id="editjeniskegiatan">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Bukti Penugasan</label>
            <input class="form-control" type="text" name="bukti_penugasan" id="editbuktipenugasan">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">SKS Beban Kerja</label>
            <input class="form-control" type="number" name="sks_beban_kerja" id="editsksbebankerja">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Masa Penugasan</label>
            <input class="form-control" type="text" name="masa_penugasan" id="editmasapenugasan">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Bukti Dokumen</label>
            <input class="form-control" type="text" name="bukti_dokumen" id="editbuktidokumen">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">SKS Kinerja</label>
            <input class="form-control" type="number" name="sks_kinerja" id="editskskinerja">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Rekomendasi</label>
            <select name="rekomendasi" class="form-control" id="editrekomendasi">
              <option value="berlangsung">BERLANGSUNG</option>
              <option value="selesai">SELESAI</option>
            </select>
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" name="editPengajaranDosen" id="editPengajaranDosen"><i class="fa fa-cloud-upload"></i> update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- HAPUS DATA PENGAJARAN DOSEN -->
<div class="modal modal-danger-custom fade" id="hapusDataPengajaran">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data Pengajaran</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data?</p>
              </div>
              <div class="modal-footer">
                <form method="post">
                <input type="hidden" name="id" id="idpengajaran">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" name="hapusDataPengajaran"><i class="fa fa-trash"></i> delete</button>
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
            <label for="perguruan_tinggi">Jenis Kegiatan</label>
            <input type="hidden" name="nidn" id="nidnTambahPenelitian" value="<?=$this->session->username?>">
            <input class="form-control" type="text" name="jenis_kegiatan">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Bukti Penugasan</label>
            <input class="form-control" type="text" name="bukti_penugasan">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">SKS Beban Kerja</label>
            <input class="form-control" type="number" name="sks_beban_kerja">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Masa Penugasan</label>
            <input class="form-control" type="text" name="masa_penugasan">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Bukti Dokumen</label>
            <input class="form-control" type="text" name="bukti_dokumen">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">SKS Kinerja</label>
            <input class="form-control" type="number" name="sks_kinerja">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Rekomendasi</label>
            <select name="rekomendasi" class="form-control">
              <option>---</option>
              <option value="berlangsung">BERLANGSUNG</option>
              <option value="selesai">SELESAI</option>
            </select>
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
            <label for="perguruan_tinggi">Jenis Kegiatan</label>
            <input type="hidden" name="id" id="ideditpenelitian">
            <input class="form-control" type="text" name="jenis_kegiatan" id="editjeniskegiatanpenelitian">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Bukti Penugasan</label>
            <input class="form-control" type="text" name="bukti_penugasan" id="editbuktipenugasanpenelitian">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">SKS Beban Kerja</label>
            <input class="form-control" type="number" name="sks_beban_kerja" id="editsksbebankerjapenelitian">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Masa Penugasan</label>
            <input class="form-control" type="text" name="masa_penugasan" id="editmasapenugasanpenelitian">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Bukti Dokumen</label>
            <input class="form-control" type="text" name="bukti_dokumen" id="editbuktidokumenpenelitian">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">SKS Kinerja</label>
            <input class="form-control" type="number" name="sks_kinerja" id="editskskinerjapenelitian">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Rekomendasi</label>
            <select name="rekomendasi" class="form-control" id="editrekomendasipenelitian">
              <option value="berlangsung">BERLANGSUNG</option>
              <option value="selesai">SELESAI</option>
            </select>
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
            <label for="perguruan_tinggi">Jenis Kegiatan</label>
            <input type="hidden" name="nidn" id="nidnTambahPengabdian" value="<?=$this->session->username?>">
            <input class="form-control" type="text" name="jenis_kegiatan">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Bukti Penugasan</label>
            <input class="form-control" type="text" name="bukti_penugasan">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">SKS Beban Kerja</label>
            <input class="form-control" type="number" name="sks_beban_kerja">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Masa Penugasan</label>
            <input class="form-control" type="text" name="masa_penugasan">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Bukti Dokumen</label>
            <input class="form-control" type="text" name="bukti_dokumen">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">SKS Kinerja</label>
            <input class="form-control" type="number" name="sks_kinerja">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Rekomendasi</label>
            <select name="rekomendasi" class="form-control">
              <option>---</option>
              <option value="berlangsung">BERLANGSUNG</option>
              <option value="selesai">SELESAI</option>
            </select>
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
            <label for="perguruan_tinggi">Jenis Kegiatan</label>
            <input type="hidden" name="id" id="ideditpengabdian">
            <input class="form-control" type="text" name="jenis_kegiatan" id="editjeniskegiatanpengabdian">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Bukti Penugasan</label>
            <input class="form-control" type="text" name="bukti_penugasan" id="editbuktipenugasanpengabdian">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">SKS Beban Kerja</label>
            <input class="form-control" type="number" name="sks_beban_kerja" id="editsksbebankerjapengabdian">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Masa Penugasan</label>
            <input class="form-control" type="text" name="masa_penugasan" id="editmasapenugasanpengabdian">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Bukti Dokumen</label>
            <input class="form-control" type="text" name="bukti_dokumen" id="editbuktidokumenpengabdian">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">SKS Kinerja</label>
            <input class="form-control" type="number" name="sks_kinerja" id="editskskinerjapengabdian">
        </div>
        <div class="form-group">
            <label for="perguruan_tinggi">Rekomendasi</label>
            <select name="rekomendasi" class="form-control" id="editrekomendasipengabdian">
              <option value="berlangsung">BERLANGSUNG</option>
              <option value="selesai">SELESAI</option>
            </select>
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


<!-- VALIDASI PERWALIAN -->
<div class="modal modal-success-custom fade" id="validasiModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Validasi Perwalian Mahasiswa</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin akan melakukan validasi perwalian mahasiswa?</p>
              </div>
              <div class="modal-footer">
                <form method="post">
                <input type="hidden" name="nim" id="nimValidasi">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" name="validasiPerwalianDosen"><i class="fa fa-check"></i> Validasi</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


<!-- Edit Nilai Mahasiswa -->
<div class="modal fade modal-success-custom" id="editNilaiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Nilai Mahasiswa</h4>
      </div>
      <div class="modal-body">
        <form method="post">
        
        <div class="form-group">
            <label for="judul_file">NPM</label>
            <input class="form-control" type="text" name="nim_mhs" id="nimeditnilai" disabled="true">
        </div>
        <div class="form-group">
            <label for="judul_file">Nama</label>
            <input class="form-control" type="text" name="nama_mhs" id="namaeditnilai" disabled="true">
        </div>
        <div class="form-group">
            <label for="judul_file">Nilai</label>
            <select id="nilaieditnilai" name="nilai" class="form-control">
              <option value="4">A</option>
              <option value="3.5">AB</option>
              <option value="3">B</option>
              <option value="2.5">BC</option>
              <option value="2">C</option>
              <option value="1.5">CD</option>
              <option value="1">D</option>
              <option value="0.5">DE</option>
              <option value="0">E</option>
              <option value="0">T</option>
            </select>
        </div>

        
            
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" id="ideditnilai">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" name="editNilaiMahasiswa" value="xxx"><i class="fa fa-cloud-upload"></i> update</button>
        </form>
      </div>
    </div>
  </div>
</div>



<script>
  var pass = "<?=$this->session->pass?>";
  var baseurl = "<?=base_url()?>";
</script>