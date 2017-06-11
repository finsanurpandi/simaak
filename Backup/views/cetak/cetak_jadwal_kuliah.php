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
<p class="judul">JADWAL KULIAH</p>


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
</table>

<?php
$tjadwal = count($jadwal);
$day1 = 0; 
$day2 = 0; 
$day3 = 0; 
$day4 = 0; 
$day5 = 0; 
$day6 = 0;

for ($i=0; $i < $tjadwal; $i++) { 
	switch (strtolower($jadwal[$i]['hari'])) {
		case 'senin':
			$day0 += 1;
			$matkul0[] = $jadwal[$i]['nama_matkul'];
			$dosen0[] = $jadwal[$i]['nama_dosen'];
			$sks0[] = $jadwal[$i]['sks'];
			$waktu0[] = $jadwal[$i]['waktu'];
			$ruangan0[] = $jadwal[$i]['ruangan'];
			break;
		case 'selasa':
			$day1 += 1;
			$matkul1[] = $jadwal[$i]['nama_matkul'];
			$dosen1[] = $jadwal[$i]['nama_dosen'];
			$sks1[] = $jadwal[$i]['sks'];
			$waktu1[] = $jadwal[$i]['waktu'];
			$ruangan1[] = $jadwal[$i]['ruangan'];
			break;
		case 'rabu':
			$day2 += 1;
			$matkul2[] = $jadwal[$i]['nama_matkul'];
			$dosen2[] = $jadwal[$i]['nama_dosen'];
			$sks2[] = $jadwal[$i]['sks'];
			$waktu2[] = $jadwal[$i]['waktu'];
			$ruangan2[] = $jadwal[$i]['ruangan'];
			break;
		case 'kamis':
			$day3 += 1;
			$matkul3[] = $jadwal[$i]['nama_matkul'];
			$dosen3[] = $jadwal[$i]['nama_dosen'];
			$sks3[] = $jadwal[$i]['sks'];
			$waktu3[] = $jadwal[$i]['waktu'];
			$ruangan3[] = $jadwal[$i]['ruangan'];
			break;
		case 'jum\'at':
			$day4 += 1;
			$matkul4[] = $jadwal[$i]['nama_matkul'];
			$dosen4[] = $jadwal[$i]['nama_dosen'];
			$sks4[] = $jadwal[$i]['sks'];
			$waktu4[] = $jadwal[$i]['waktu'];
			$ruangan4[] = $jadwal[$i]['ruangan'];
			break;
		case 'sabtu':
			$day5 += 1;
			$matkul5[] = $jadwal[$i]['nama_matkul'];
			$dosen5[] = $jadwal[$i]['nama_dosen'];
			$sks5[] = $jadwal[$i]['sks'];
			$waktu5[] = $jadwal[$i]['waktu'];
			$ruangan5[] = $jadwal[$i]['ruangan'];
			break;
	}
}
$thari = count($hari);
$loop = 0;

echo "<table border='1'>";
echo "<tr>";
echo "<th>Hari</th>";
echo "<th>Matakuliah</th>";
echo "<th>Dosen</th>";
echo "<th>SKS</th>";
echo "<th>Waktu</th>";
echo "<th>Ruangan</th>";
echo "</tr>";

for ($i=0; $i < $thari; $i++) { 
	
	for ($j=0; $j < ${'day'.$i} ; $j++) { 
		echo "<tr>";
		if (${'day'.$i} > 1) {
			$loop += 1;

			if ($loop <= 1) {
				echo "<td rowspan=".${'day'.$i}.">".ucfirst($hari[$i])."</td>";
			}
			
		} else {
			echo "<td>".ucfirst($hari[$i])."</td>";
		}

		echo "<td>".${'matkul'.$i}[$j]."</td>";
		echo "<td>".${'dosen'.$i}[$j]."</td>";
		echo "<td>".${'sks'.$i}[$j]."</td>";
		echo "<td>".${'waktu'.$i}[$j]."</td>";
		echo "<td>".${'ruangan'.$i}[$j]."</td>";
		echo "</tr>";
	}
	
}
echo "</table>";

?>

</div>

