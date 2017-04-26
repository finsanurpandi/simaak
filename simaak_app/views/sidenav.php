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

        <li>
          <a href="profil-mahasiswa.html">
            <i class="fa fa-dashboard"></i> <span>Profil Dosen</span>
          </a>
        </li>
        <li>
          <a href="hasil-studi.html">
            <i class="fa fa-pencil-square-o"></i>
            <span>Hasil Studi</span>
          </a>
        </li>
        <li>
          <a href="perwalian.html">
            <i class="fa fa-user-plus"></i> <span>Perwalian</span>
          </a>
        </li>
        <li>
          <a href="perkuliahan.html">
            <i class="fa fa-graduation-cap"></i> <span>Perkuliahan</span>
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
        <li id="mhsnilai" class="">
          <a href="<?=base_url('mahasiswa/studi');?>">
            <i class="fa fa-pencil-square-o"></i>
            <span>Hasil Studi</span>
          </a>
        </li>
        <li id="mhsperwalian" class="">
          <a href="<?=base_url('mahasiswa/perwalian');?>">
            <i class="fa fa-user-plus"></i> <span>Perwalian</span>
          </a>
        </li>
        <li id="mhsjadwal" class="">
          <a href="<?=base_url('mahasiswa/perkuliahan');?>">
            <i class="fa fa-graduation-cap"></i> <span>Perkuliahan</span>
          </a>
        </li>
        <?php } ?>

<!-- MENU DOSEN -->
<?php
  } else if($role == 2){
?>

        <!-- <li id="profil">
          <a href="<?=base_url('dosen/profil');?>">
            <i class="fa fa-dashboard"></i> <span>Profil</span>
          </a>
        </li> -->

        <li id="menuDosenProfil" class="treeview">
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
        <li id="menuDosenDokumen">
          <a href="<?=base_url('dosen/dokumen');?>">
            <i class="fa fa-graduation-cap"></i> <span>Dokumen</span>
          </a>
        </li>

<!-- MENU OPERATOR -->
<?php
  } else if($role == 3){
?>

         <li id="operatorProfil">
          <a href="<?=base_url('operator/profil');?>">
            <i class="fa fa-dashboard"></i> <span>Profil</span>
          </a>
        </li>
        <li id="operatorMahasiswa">
          <a href="<?=base_url('operator/mahasiswa');?>">
            <i class="fa fa-pencil-square-o"></i>
            <span>Mahasiswa</span>
          </a>
        </li>
        <li id="operatorDosen">
          <a href="<?=base_url('operator/dosen');?>">
            <i class="fa fa-user-plus"></i> <span>Dosen</span>
          </a>
        </li>
        <li id="operatorJadwal">
          <a href="<?=base_url('operator/jadwal');?>">
            <i class="fa fa-user-plus"></i> <span>Jadwal</span>
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
  }
?>
      </ul>
      
    </section>
    <!-- /.sidebar -->
  </aside>

<script type="text/javascript">
  var role = '<?=$role?>';
  var uri = '<?=$this->uri->segment(2)?>';
</script>