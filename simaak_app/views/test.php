<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
</head>
<body>
<div class="container">
<table class="table table-hover">
<thead>
	<tr>
		<th>#</th>
		<th>Jabfung</th>
		<th>pangkat</th>
		<th>golongan</th>
	</tr>
</thead>
<tbody>
<form method="post" action="<?=base_url('test/multipleInput')?>">
<?php
$i = 1;
foreach ($golongan as $value) {
?>

	<tr>
		<td><?=$i++?></td>
		<td>
			<input type="hidden" name="jabfung[]" value="<?=$value['jabatan_fungsional']?>">
			<?=$value['jabatan_fungsional']?>
		</td>
		<td>
			<input type="hidden" name="pangkat[]" value="<?=$value['pangkat']?>">
			<?=$value['pangkat']?></td>
		<td>
			<input type="hidden" name="golongan[]" value="<?=$value['golongan']?>">
			<?=$value['golongan']?></td>
	</tr>
<?php } ?>

</tbody>
</table>
<button id="btnSubmitPerwalian" class="btn btn-primary btn-xs">Kirim</button>	
</form>
</div>
<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>