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
	padding-bottom: 15px;
}

/*table.absen, tr ,td.dataabsen{
	margin-top: 70px;
	border-collapse: collapse;
	border: 1px solid black;
	font-size: 10;
	padding-bottom: 100px;
	padding-right: 35px;
}*/

table.tbl-absen {
	border-collapse: collapse;
}

table.tbl-absen > td, th {
	border: 1px solid black;
	font-size: 11px;
}

table.tbl-absen > tr, td.dhk {
	font-size: 11px;
	border: 1px solid black;
	padding-top: 5px;
	padding-bottom: 5px;
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
	font-size: 16;
	font-weight: bold;
	letter-spacing: 2px;
}

.fak {
	font-size: 18;
	font-weight: bold;
}

.stat {
	font-size: 12;
	font-weight: bold;
}

td#prodi {
	text-align: left;
	font-size: 12;
}

td#prodiname {
	text-align: right;
	font-size: 12;
	padding-bottom: 0px;
}

.alamat {
	font-size: 10;
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
	font-size: 18;
}

.pengesahan {
	font-size: 11px;
	margin-top: 10px;
}

table.tbl-pengesahan {
	border-collapse: collapse;
}

table.tbl-pengesahan, tr {
	border: 1 px solid black;
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

<p class="judul">DAFTAR HADIR KULIAH (DHK) SEMESTER <?=strtoupper($semester)?></p>

<div class="left">
	<table class="tbl-pengesahan" width="100%"> 
		<tr>
			<td>Mata Kuliah</td>
			<td>:</td>
			<td><?=$matkul['nama_matkul']?></td>
		</tr>
		<tr>
			<td>Kode Mata Kuliah</td>
			<td>:</td>
			<td><?=$matkul['kode_matkul']?></td>
		</tr>
		<tr>
			<td>Bobot SKS</td>
			<td>:</td>
			<td><?=$matkul['sks']?></td>
		</tr>
		<tr>
			<td>Semester / Th. Akademik</td>
			<td>:</td>
			<td>
			<?php
			$ta = substr($matkul['tahun_ajaran'], 0, 4);
			echo $matkul['semester'].' / '.$ta.' - '.(int)$ta+=1;

			?>
			</td>
		</tr>
		<tr>
			<td>Kelas/Ruang Kuliah</td>
			<td>:</td>
			<td><?=$matkul['kelas'].' / '.$matkul['ruangan']?></td>
		</tr>
	</table>
</div>

<div class="right">
	<table class="tbl-pengesahan" width="100%">
		<tr>
			<td>Jurusan / Program Studi</td>
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
			<td>Fakultas</td>
			<td>:</td>
			<td>EKONOMI DAN BISNIS ISLAM</td>
		</tr>
		<tr>
			<td>Dosen</td>
			<td>:</td>
			<td><?=$matkul['nama_dosen']?></td>
		</tr>
		<tr>
			<td>Asisten Dosen</td>
			<td>:</td>
			<td></td>
		</tr>
		<tr>
			<td>Waktu Kuliah</td>
			<td>:</td>
			<td><?=$matkul['hari'].' / '.$matkul['waktu']?></td>
		</tr>
	</table>
</div>

<br/>



<table class="tbl-absen" align="center" width="100%">
<tr>
	<th rowspan="2">No.</th>
	<th rowspan="2">Nama Mahasiswa</th>
	<th rowspan="2">N P M</th>
	<th colspan="16">Pertemuan / Perkuliahan</th>
	<th colspan="3">Tugas</th>
</tr>
<tr>
	<th style="padding-left:5px;padding-right:5px;">1</th>
	<th style="padding-left:5px;padding-right:5px;">2</th>
	<th style="padding-left:5px;padding-right:5px;">3</th>
	<th style="padding-left:5px;padding-right:5px;">4</th>
	<th style="padding-left:5px;padding-right:5px;">5</th>
	<th style="padding-left:5px;padding-right:5px;">6</th>
	<th style="padding-left:5px;padding-right:5px;">7</th>
	<th style="padding-left:5px;padding-right:5px;">8</th>
	<th style="padding-left:5px;padding-right:5px;">9</th>
	<th>10</th>
	<th>11</th>
	<th>12</th>
	<th>13</th>
	<th>14</th>
	<th>15</th>
	<th>16</th>
	<th style="padding-left:4px;padding-right:4px;">T<br>S<br>T</th>
	<th style="padding-left:4px;padding-right:4px;">M<br>D<br>R</th>
	<th style="padding-left:4px;padding-right:4px;">F<br>T<br>P</th>
</tr>
<?php
$total = 25;
$no = 1;
for ($i=0; $i < count($jadwal) ; $i++) { 
?>
<tr>
	<td class="dhk" align="center"><?=$no++?></td>
	<td class="dhk"><?=$jadwal[$i]['nama_mhs']?></td>
	<td class="dhk"><?=$jadwal[$i]['nim']?></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
</tr>
<?php 
} 

$sisa = $total - count($jadwal);
$sisano = count($jadwal)+1;
for ($j=0; $j < $sisa; $j++) { 
?>
<tr>
	<td class="dhk" align="center"><?=$sisano++?></td>
	<td class="dhk"><span style="color:#ffffff;">Dhial M. Mung</span></td>
	<td class="dhk"><span style="color:#ffffff;">6020216013</span></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
</tr>

<?php
}
?>

</table>


<!-- NEW PAGE -->
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

<table class="tbl-absen" align="center" width="100%">
<tr>
	<th rowspan="2">No.</th>
	<th rowspan="2">Nama Mahasiswa</th>
	<th rowspan="2">N P M</th>
	<th colspan="16">Pertemuan / Perkuliahan</th>
	<th colspan="3">Tugas</th>
</tr>
<tr>
	<th style="padding-left:5px;padding-right:5px;">1</th>
	<th style="padding-left:5px;padding-right:5px;">2</th>
	<th style="padding-left:5px;padding-right:5px;">3</th>
	<th style="padding-left:5px;padding-right:5px;">4</th>
	<th style="padding-left:5px;padding-right:5px;">5</th>
	<th style="padding-left:5px;padding-right:5px;">6</th>
	<th style="padding-left:5px;padding-right:5px;">7</th>
	<th style="padding-left:5px;padding-right:5px;">8</th>
	<th style="padding-left:5px;padding-right:5px;">9</th>
	<th>10</th>
	<th>11</th>
	<th>12</th>
	<th>13</th>
	<th>14</th>
	<th>15</th>
	<th>16</th>
	<th style="padding-left:4px;padding-right:4px;">T<br>S<br>T</th>
	<th style="padding-left:4px;padding-right:4px;">M<br>D<br>R</th>
	<th style="padding-left:4px;padding-right:4px;">F<br>T<br>P</th>
</tr>
<?php
$ulang = 4;

for ($i=0; $i < $ulang; $i++) { 
?>
<tr>
	<td class="dhk" align="center"><span style="color:#ffffff;">25</span></td>
	<td class="dhk"><span style="color:#ffffff;">Dhial M. Mung</span></td>
	<td class="dhk"><span style="color:#ffffff;">6020216013</span></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
	<td class="dhk"></td>
</tr>
<?php } ?>

</table>

</div>

<div class="pengesahan">
<br/><br/><br/>
<table class="tbl-pengesahan" width="100%" align="center">

<tr>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td style="padding-right:20;">
	<strong>
			Wakil Dekan I
			<br/>
			Bag. Adm. Akademik</strong>
			<br/><br/><br/><br/><br/><br/>
			<u>Herlan Firmansyah, S.Pd., M.Pd.</u><br/>
			<strong>NIK.4103006803</strong>
	</td>
	<td></td>
	<td style="padding-right:20;">
	<strong>
			Ketua Prodi
			<br/></strong>
			<br/><br/><br/><br/><br/><br/>
			<u>Dadang Saepudin, S.Pd., M.Pd</u><br/>
			<strong>NIK.4103006007</strong>
	</td>
	<td style="padding-right:20;">
	<strong>
			Dosen / Asisten
			<br/>
			</strong>
			<br/><br/><br/><br/><br/><br/>
			...............................<br/>
			<strong>NIK.</strong>
	</td>
</tr>

	
</table>
</div>

