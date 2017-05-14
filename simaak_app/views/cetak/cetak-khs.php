<style>
* {
    box-sizing: border-box;
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
</style>

<table>
	<tr>
		<td>UNIVERSITAS SURYAKANCANA</td>
	</tr>
	<tr>
		<td>FAKULTAS EKONOMI DAN BISNIS ISLAM</td>
	</tr>
	<tr>
		<td>STATUS TERAKREDITASI</td>
	</tr>
	<tr>
		<td>PROGRAM STUDI : - Manajemen Pendidikan Islam</td>
	</tr>
	<tr>
		<td>- Ekonomi Syariah</td>
	</tr>
	<tr>
		<td>- Perbankan Syariah</td>
	</tr>
	<tr>
		<td>Kampus : Jln. Pasir Gede Raya Cianjur 43216 Telp. (0263) 2283047 email: fai_unsur@yahoo.com</td>
	</tr>
</table>
<hr/>
<b>KARTU HASIL STUDI (KHS)</b>

<div class="left">
<table>
<tr>
	<td>Nama</td>
	<td>:</td>
	<td>xxx</td>
</tr>
<tr>
	<td>NIM</td>
	<td>:</td>
	<td><?=$user?></td>
</tr>
<tr>
	<td>NIRM</td>
	<td>:</td>
	<td>xxx</td>
</tr>
</table>
</div>

<div class="right">
<table>
<tr>
	<td>Program Studi</td>
	<td>:</td>
	<td>xxx</td>
</tr>
<tr>
	<td>Semester</td>
	<td>:</td>
	<td>xxx</td>
</tr>
<tr>
	<td>Tahun Akademik</td>
	<td>:</td>
	<td>xxx</td>
</tr>
</table>
</div>

<?php 
foreach ($angka as $key => $value) {
?>

<tr>
	<td><?=$value?></td>	
</tr>

<?php
}
?>
