<style>
* {
    box-sizing: border-box;
}

@page *{
	margin-top: 10px;
}

.uleft {
    width: 22%;
	float: left;
    padding: 5px;
}
.uright {
    /*width: 50%;*/
    float: left;
    padding: 5px;
    text-align: right;
}

table.header, tr > td {
	text-align: center;
	padding-bottom: 0px;
}

table.content, tr > td {
	font-size: 13;
	/*padding-bottom: 15px;*/
}

table.absen, tr ,td.dataabsen{
	margin-top: 10px;
	border-collapse: collapse;
	border: 1px solid black;
	font-size: 11;
	padding-top: 5px;
	padding-bottom: 5px;
	text-align: center;
}

.left {
    width: 50%;
	float: left;
    padding: 5px;
}
.right {
    /*width: 50%;*/
    float: left;
    padding: 5px;
}

.univ {
	font-size: 14;
	font-weight: bold;
	letter-spacing: 2px;
}

.fak {
	font-size: 15;
	font-weight: bold;
}

.stat {
	font-size: 11;
	font-weight: bold;
}

td#prodi {
	text-align: left;
	font-size: 10;
}

td#prodiname {
	text-align: right;
	font-size: 10;
	padding-bottom: 0px;
}

.alamat {
	font-size: 9;
}

.uleft > img.logo_img {
	width: 1000px;
	height: auto;
}

.border-1 {
	margin-top: 1px;
	border-style: solid;
	border-width: 2px;
	margin-bottom: 1px;
}

.border-2 {
	margin-top: 0px;
	border-style: solid;
	border-width: 0.5px;
}

p.judul {
	text-align: center;
	font-weight: bold;
	font-size: 15;
	margin-bottom: -2px;
}

.pengesahan {
	font-size: 11px;
	margin-top: 10px;
}

table.tbl-pengesahan, tr > td {
	font-size: 11;
	/*padding-bottom: 15px;*/
}
</style>

<div class="container">

<div class="uleft">
	<img class="logo_img" src="<?=base_url('assets/img/logo_febi.png')?>">
</div>

<div class="uright">
	<table class="header">
		<tr>
			<td colspan="2"><div class="univ">UNIVERSITAS SURYAKANCANA</div></td>
		</tr>
		<tr>
			<td colspan="2"><div class="fak">FAKULTAS EKONOMI DAN BISNIS ISLAM</div></td>
		</tr>
		<tr>
			<td colspan="2"><div class="stat">STATUS TERAKREDITASI</div></td>
		</tr>
		<tr>
			<td id="prodiname">PROGRAM STUDI : </td>
			<td id="prodi">- Manajemen Pendidikan Islam</td>
		</tr>
		<tr>
			<td></td>
			<td id="prodi">- Ekonomi Syariah</td>
		</tr>
		<tr>
			<td></td>
			<td id="prodi">- Perbankan Syariah</td>
		</tr>
		<tr>
			<td colspan="2"><div class="alamat">Kampus : Jln. Pasir Gede Raya Cianjur 43216 Telp. (0263) 2283047 email: fai_unsur@yahoo.com</div></td>
		</tr>
	</table>
</div>
<p class="border-1"></p>
<p class="border-2"></p>

<p class="judul">KARTU RENCANA STUDI (KRS)</p>


<div class="left">
	<table class="tbl-pengesahan" width="100%"> 
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?=$user['nama']?></td>
		</tr>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><?=$user['nim']?></td>
		</tr>
		<tr>
			<td>NIRM</td>
			<td>:</td>
			<td>............................</td>
		</tr>
	</table>
</div>

<div class="right">
	<table class="tbl-pengesahan" width="100%">
		<tr>
			<td>Program Studi</td>
			<td>:</td>
			<td>
			<?php
			switch ($user['kode_prodi']) {
				case 'ES':
					echo "Ekonomi Syariah";
					break;
				case 'MPI':
					echo "Manajemen Pendidikan Islam";
					break;
				case 'PBS':
					echo "Perbankan Syariah";
					break;
			}
			?>
			</td>
		</tr>
		<tr>
			<td>Semester</td>
			<td>:</td>
			<td><?=$perwalian[0]['semester_mhs']?></td>
		</tr>
		<tr>
			<td>Tahun Akademik</td>
			<td>:</td>
			<td>
			<?php
			$tahun = substr($this->session->tahun_ajaran, 0,4);
			$tahun = (int)$tahun;
			echo $tahun."/".$tahun += 1;

			?>
			</td>
		</tr>
	</table>
</div>




<table class="absen" align="center" width="100%">
<tr>
	<td class="dataabsen">NO.</td>
	<td class="dataabsen">MATA KULIAH</td>
	<td class="dataabsen">KODE</td>
	<td class="dataabsen">SKS</td>
	<td class="dataabsen">KETERANGAN</td>
</tr>

<?php
$no = 1;
$totalsks = 0;
$totalrow = 12;

foreach ($perwalian as $key => $value) {
?>
<tr>
	<td class="dataabsen"><?=$no++.'.'?></td>
	<td class="dataabsen" align="left" style="padding-left:5px;"><?=$value['nama_matkul']?></td>
	<td class="dataabsen"><?=$value['kode_matkul']?></td>
	<td class="dataabsen">
	<?php
	echo $value['sks'];
	$totalsks += $value['sks'];
	?>
	</td>
	<td class="dataabsen"></td>
</tr>
<?php } 
$totalrow -= count($perwalian);

for ($i=0; $i < $totalrow; $i++) { 

?>
<tr>
	<td class="dataabsen"><?=$no++?></td>
	<td class="dataabsen"></td>
	<td class="dataabsen"></td>
	<td class="dataabsen"></td>
	<td class="dataabsen"></td>
</tr>
<?php } ?>
<tr>
	<td class="dataabsen" colspan="2">JUMLAH</td>
	<td class="dataabsen"></td>
	<td class="dataabsen"><?=$totalsks?></td>
	<td class="dataabsen"></td>
</tr>

</table>

<div class="pengesahan">
	
<table class="tbl-pengesahan" width="100%">
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td>
		Cianjur, 
	<?php
	setlocale(LC_TIME, 'id_ID');
	$date = strftime( "%d %B %Y");
	echo $date;
	// date("d - m - Y");
	?>
	</td>
</tr>
	<tr>
		<td style="padding-right:20;">
			Mengetahui<br/>Wakil Dekan I
			<br/><br/><br/><br/><br/>
			Herlan Firmansyah, S.Pd., M.Pd.<br/>
			NIK.4103006803
		</td>
		<td style="padding-right:20;">
			Ketua<br/>Program Studi
			<br/><br/><br/><br/><br/>
			.......................
		</td>
		<td style="padding-right:20;">
			Dosen<br/>Pembimbing Akademik
			<br/><br/><br/><br/><br/>
			......................................
		</td>
		<td style="padding-right:20;">
			Mahasiswa<br/>Yang Bersangkutan
			<br/><br/><br/><br/><br/>
			.................................
		</td>
	</tr>
	
</table>
<p>Catatan</p>
<ol style="padding-left: 20px;margin-right:100px;text-align:justify;">
	<li>Pengiriman KRS dilakukan oleh mahasiswa setelah konsultasi dengan dosen pembimbing akademik dan Ketua Program Studi masing-masing</li>
	<li>Mata Kuliah yang direncanakan untuk dikontrak disesuaikan dengan mata kuliah yang ditawarkan oleh Program Studi masing-masing</li>
</ol>
</div>


</div>

