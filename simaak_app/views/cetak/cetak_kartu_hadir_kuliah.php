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

table.absen, tr ,td.dataabsen{
	margin-top: 70px;
	border-collapse: collapse;
	border: 1px solid black;
	font-size: 10;
	padding-bottom: 100px;
	padding-right: 35px;
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

<br/>
<p class="judul">KARTU HADIR KULIAH</p>


<table class="content" align="center">
	<tr>
		<td style="padding-bottom: 10px;"><strong>NAMA</strong></td>
		<td>:</td>
		<td><?=$user['nama']?></td>
	</tr>
	<tr>
		<td style="padding-bottom: 10px;"><strong>NPM/NIRM</strong></td>
		<td>:</td>
		<td><?=$user['nim']?></td>
	</tr>
	<tr>
		<td style="padding-bottom: 10px;"><strong>PROGRAM STUDI</strong></td>
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
		<td style="padding-bottom: 10px;"><strong>SEMESTER</strong></td>
		<td>:</td>
		<td>
		<?php
		echo $perwalian[0]['semester_mhs'];
		$this->session->tahun_ajaran
		?>
		</td>
	</tr>
	<tr>
		<td style="padding-bottom: 10px;"><strong>MATAKULIAH</strong></td>
		<td>:</td>
		<td><?=$matkul?></td>
	</tr>
	<tr>
		<td style="padding-right: 40px;"><strong>DOSEN/ASISTEN DOSEN</strong></td>
		<td>:</td>
		<td><?=$dosen?></td>
	</tr>
</table>

<br/><br/><br/>



<table class="absen" align="center">
<?php

for ($i = 1; $i <= 3; $i++){
	echo "<tr>";
	for ($j = 1; $j <= 6; $j++){
		echo "<td class='dataabsen'>Tanggal : ......<br/>";
		echo "Ttd. Dosen : </td>";
	}
	echo "</tr>";
}
?>

</table>

</div>

