<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
                <?php
                  if ($user['image'] == null) {
                    if ($user['jenis_kelamin'] == 'L') {
                      echo "<img src='".base_url('assets/uploads/profiles/default_male.jpg')."' class='img-circle' alt='User Image'>";
                    } else {
                      echo "<img src='".base_url('assets/uploads/profiles/default_female.jpg')."' class='img-circle' alt='User Image'>";
                    };
                  } else {
                  ?>
                    <img src="<?=base_url('assets/uploads/profiles/'.$user['image'])?>" class="img-circle" alt="User Image">
                  <?php
                  } 
                 ?>

        </div>
        <div class="pull-left info">
          <p><?=$user['nama']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

<!-- MENU ADMIN -->
<?php
  if ($role == 0) {
?>

        
        <!-- <li id="adminMahasiswa" class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Mahasiswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="adminMhsEs" class=""><a href="<?=base_url('admin/mahasiswa/').$this->encrypt->encode('es');?>"><i class="fa fa-circle-o"></i> ES</a></li>
            <li id="adminMhsMpi" class=""><a href="<?=base_url('admin/mahasiswa/').$this->encrypt->encode('mpi');?>"><i class="fa fa-circle-o"></i> MPI</a></li>
            <li id="adminMhsPbs" class=""><a href="<?=base_url('admin/mahasiswa/').$this->encrypt->encode('pbs');?>"><i class="fa fa-circle-o"></i> PBS</a></li>
          </ul>
        </li> -->
        <li id="adminDosen" class="">
          <a href="<?=base_url('admin/dosen');?>">
            <i class="fa fa-graduation-cap"></i> <span>Dosen</span>
          </a>
        </li>
        <li id="adminMahasiswa" class="">
          <a href="<?=base_url('admin/mahasiswa');?>">
            <i class="fa fa-graduation-cap"></i> <span>Mahasiswa</span>
          </a>
        </li>
        <li id="adminMatakuliah" class="">
          <a href="<?=base_url('admin/matakuliah');?>">
            <i class="fa fa-graduation-cap"></i> <span>Matakuliah</span>
          </a>
        </li>
        

<!-- MENU MAHASISWA -->
<?php
  } else if($role == 1){
?>

        <!-- <li id="mhsprofil" class="">
          <a href="<?=base_url('mahasiswa/profil');?>">
            <i class="fa fa-dashboard"></i> <span>Profil</span>
          </a>
        </li> -->

        <li id="menuMhsProfil" class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Profil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="mhsProfil" class=""><a href="<?=base_url('mahasiswa/profil');?>"><i class="fa fa-circle-o"></i> Basic Info</a></li>
            <li id="mhsOrtu" class=""><a href="<?=base_url('mahasiswa/orangtua');?>"><i class="fa fa-circle-o"></i> Orang Tua</a></li>
            <li id="mhsDokumen" class=""><a href="<?=base_url('mahasiswa/dokumen');?>"><i class="fa fa-circle-o"></i> Dokumen</a></li>
          </ul>
        </li>

        <?php if (($this->session->mhs_profil == TRUE) && ($this->session->mhs_ortu == TRUE) && ($this->session->mhs_upload == TRUE)) {
        ?>
        <!-- <li id="mhsnilai" class="">
          <a href="<?=base_url('mahasiswa/hasilstudi');?>">
            <i class="fa fa-pencil-square-o"></i>
            <span>Hasil Studi</span>
          </a>
        </li> -->
        <li id="menuMhsStudi" class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Hasil Studi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="mhsSemester" class=""><a href="<?=base_url('mahasiswa/ips');?>"><i class="fa fa-circle-o"></i> Semester</a></li>
            <li id="mhsKeseluruhan" class=""><a href="<?=base_url('mahasiswa/ipk');?>"><i class="fa fa-circle-o"></i> Kumulatif</a></li>
          </ul>
        </li>
<?php
if (!empty($pembayaran) && $pembayaran[0]['persentase'] >= 25) {
?>
        <li id="mhsperwalian" class="">
          <a href="<?=base_url('mahasiswa/perwalian');?>">
            <i class="fa fa-user-plus"></i> <span>Perwalian</span>
          </a>
        </li>
<?php } ?>

        <li id="mhsjadwal" class="">
          <a href="<?=base_url('mahasiswa/perkuliahan');?>">
            <i class="fa fa-graduation-cap"></i> <span>Perkuliahan</span>
          </a>
        </li>
        <li id="mhsupload" class="">
          <a href="<?=base_url('mahasiswa/pembayaran');?>">
            <i class="fa fa-upload"></i> <span>Upload Pembayaran</span>
          </a>
        </li>
        <li id="mhscetak" class="">
          <a href="<?=base_url('mahasiswa/cetak');?>">
            <i class="fa fa-print"></i> <span>Cetak</span>
          </a>
        </li>
        <?php } ?>

<!-- MENU DOSEN -->
<?php
  } else if($role == 2){
?>

        <li id="profildosen" class="">
          <a href="<?=base_url('dosen/profil');?>">
            <i class="fa fa-dashboard"></i> <span>Profil</span>
          </a>
        </li>

        <!-- <li id="menuDosenProfil" class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Profil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="dosenProfil" class=""><a href="<?=base_url('dosen/profil');?>"><i class="fa fa-circle-o"></i> Basic Info</a></li>
            <li id="dosenPendidikan" class=""><a href="<?=base_url('dosen/pendidikan');?>"><i class="fa fa-circle-o"></i> Riwayat Pendidikan</a></li>
            <li id="dosenPengajaran" class=""><a href="<?=base_url('dosen/pengajaran');?>"><i class="fa fa-circle-o"></i> Riwayat Mengajar</a></li>
            <li id="dosenPenelitian" class=""><a href="<?=base_url('dosen/penelitian');?>"><i class="fa fa-circle-o"></i> Penelitian</a></li>
            <li id="dosenPengabdian" class=""><a href="<?=base_url('dosen/pengabdian');?>"><i class="fa fa-circle-o"></i> Pengabdian</a></li>
          </ul>
        </li>
 -->

        <li id="nilaidosen" class="">
          <a href="<?=base_url('dosen/nilai');?>">
            <i class="fa fa-pencil-square-o"></i>
            <span>Nilai Mahasiswa</span>
          </a>
        </li>
        <li id="perwaliandosen">
          <a href="<?=base_url('dosen/perwalian');?>">
            <i class="fa fa-user-plus"></i> <span>Perwalian</span>
          </a>
        </li>
        <li id="mahasiswadosen">
          <a href="<?=base_url('dosen/mahasiswa');?>">
            <i class="fa fa-graduation-cap"></i> <span>Mahasiswa Wali</span>
          </a>
        </li>
        <li id="matakuliahdosen">
          <a href="<?=base_url('dosen/matakuliah');?>">
            <i class="fa fa-graduation-cap"></i> <span>Matakuliah</span>
          </a>
        </li>
        <li id="historimatakuliahdosen">
          <a href="<?=base_url('dosen/histori');?>">
            <i class="fa fa-graduation-cap"></i> <span>Riwayat Mengajar</span>
          </a>
        </li>
        <!-- <li id="kinerja">
          <a href="<?=base_url('dosen/kinerja');?>">
            <i class="fa fa-graduation-cap"></i> <span>Laporan Kinerja</span>
          </a>
        </li> -->

        <li id="kinerjadosen" class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Laporan Kinerja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="dosenPengajaran" class=""><a href="<?=base_url('dosen/pengajaran');?>"><i class="fa fa-circle-o"></i> Pengajaran</a></li>
            <li id="dosenPenelitian" class=""><a href="<?=base_url('dosen/penelitian');?>"><i class="fa fa-circle-o"></i> Penelitian</a></li>
            <li id="dosenPengabdian" class=""><a href="<?=base_url('dosen/pengabdian');?>"><i class="fa fa-circle-o"></i> Pengabdian</a></li>
          </ul>
        </li>

        <li id="dokumendosen">
          <a href="<?=base_url('dosen/dokumen');?>">
            <i class="fa fa-graduation-cap"></i> <span>Dokumen</span>
          </a>
        </li>


<!-- MENU OPERATOR -->
<?php
  } else if($role == 3){
?>

         <li id="operatorProfil" class="">
          <a href="<?=base_url('operator/profil');?>">
            <i class="fa fa-user"></i> <span>Profil</span>
          </a>
        </li>
        
        <li id="operatorDosen" class="">
          <a href="<?=base_url('operator/dosen');?>">
            <i class="fa fa-user"></i> <span>Dosen</span>
          </a>
        </li>
        <li id="operatorMahasiswa" class="">
          <a href="<?=base_url('operator/mahasiswa');?>">
            <i class="fa fa-user"></i>
            <span>Mahasiswa</span>
          </a>
        </li>
        <!-- <li id="operatorJadwal">
          <a href="<?=base_url('operator/jadwal');?>">
            <i class="fa fa-user-plus"></i> <span>Jadwal</span>
          </a>
        </li> -->
        <li id="operatorPerwalian" class="">
          <a href="<?=base_url('operator/perwalian');?>">
            <i class="fa fa-user-plus"></i> <span>perwalian</span>
          </a>
        </li>

        <li id="operatorPerkuliahan" class="treeview">
          <a href="#">
            <i class="fa fa-mortar-board"></i> <span>Perkuliahan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="operatorJadwal" class=""><a href="<?=base_url('operator/jadwal');?>"><i class="fa fa-calendar"></i> Jadwal</a></li>
            <li id="operatorMatakuliah" class=""><a href="<?=base_url('operator/matakuliah');?>"><i class="fa fa-tasks"></i> Matakuliah</a></li>
          </ul>
        </li>

        <li id="operatorUjian" class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square-o"></i> <span>Ujian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="operatorUts" class=""><a href="<?=base_url('operator/uts');?>"><i class="fa fa-pencil-square"></i> UTS</a></li>
            <li id="operatorUas" class=""><a href="<?=base_url('operator/uas');?>"><i class="fa fa-pencil-square"></i> UAS</a></li>
          </ul>
        </li>
        <li id="operatorLaporan" class="">
          <a href="<?=base_url('operator/laporan');?>">
            <i class="fa fa-file-text-o"></i> <span>laporan</span>
          </a>
        </li>
        <li id="operatorNilai" class="">
          <a href="<?=base_url('operator/nilai');?>">
            <i class="fa fa-file-text-o"></i> <span>Nilai</span>
          </a>
        </li>
        

<!-- MENU PIMPINAN -->
<?php
  } else if($role == 4){
?>

        <li id="profil">
          <a href="<?=base_url('dosen/profil');?>">
            <i class="fa fa-dashboard"></i> <span>Profil</span>
          </a>
        </li>
        <li id="nilai">
          <a href="<?=base_url('dosen/nilai');?>">
            <i class="fa fa-pencil-square-o"></i>
            <span>Nilai Mahasiswa</span>
          </a>
        </li>
        <li id="perwalian">
          <a href="<?=base_url('dosen/perwalian');?>">
            <i class="fa fa-user-plus"></i> <span>Perwalian</span>
          </a>
        </li>
        <li id="mahasiswa">
          <a href="<?=base_url('dosen/mahasiswa');?>">
            <i class="fa fa-graduation-cap"></i> <span>Daftar Mahasiswa</span>
          </a>
        </li>
        <li id="matakuliah">
          <a href="<?=base_url('dosen/matakuliah');?>">
            <i class="fa fa-graduation-cap"></i> <span>Daftar Matakuliah</span>
          </a>
        </li>
        <li id="kinerja">
          <a href="<?=base_url('dosen/kinerja');?>">
            <i class="fa fa-graduation-cap"></i> <span>Laporan Kinerja</span>
          </a>
        </li>

<?php
  } else if ($role == 5) {
?>

<!-- MENU KEUANGAN -->

        <li id="profilkeuangan">
          <a href="<?=base_url('keuangan/profil');?>">
            <i class="fa fa-dashboard"></i> <span>Profil</span>
          </a>
        </li>
        <li id="pembayarankeuangan">
          <a href="<?=base_url('keuangan/pembayaran');?>">
            <i class="fa fa-pencil-square-o"></i>
            <span>Mahasiswa</span>
          </a>
        </li>

<?php
  } else if ($role == 6) {
?>

<!-- MENU AKADEMIK -->

        <li id="profil">
          <a href="<?=base_url('dosen/profil');?>">
            <i class="fa fa-dashboard"></i> <span>Profil</span>
          </a>
        </li>
        <li id="nilai">
          <a href="<?=base_url('dosen/nilai');?>">
            <i class="fa fa-pencil-square-o"></i>
            <span>Nilai Mahasiswa</span>
          </a>
        </li>
        <li id="perwalian">
          <a href="<?=base_url('dosen/perwalian');?>">
            <i class="fa fa-user-plus"></i> <span>Perwalian</span>
          </a>
        </li>
        <li id="mahasiswa">
          <a href="<?=base_url('dosen/mahasiswa');?>">
            <i class="fa fa-graduation-cap"></i> <span>Daftar Mahasiswa</span>
          </a>
        </li>
        <li id="matakuliah">
          <a href="<?=base_url('dosen/matakuliah');?>">
            <i class="fa fa-graduation-cap"></i> <span>Daftar Matakuliah</span>
          </a>
        </li>
        <li id="kinerja">
          <a href="<?=base_url('dosen/kinerja');?>">
            <i class="fa fa-graduation-cap"></i> <span>Laporan Kinerja</span>
          </a>
        </li>
<?php } ?>
      </ul>
      
    </section>
    <!-- /.sidebar -->
  </aside>

<script type="text/javascript">
  var role = '<?=$role?>';
  var uri = '<?=$this->uri->segment(2)?>';
</script>