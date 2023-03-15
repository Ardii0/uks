<?php 
  header("Content-type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=".$nama."-".$rombel.".xls");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>	
</head>
<body>
	<h1>Rekap Nilai Raport</h1>
	<table style="font-size: 14px; font-weight: bold;">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $nama ?></td>
		</tr>
		<tr>
			<td>Kelas / Rombel</td>
			<td>:</td>
			<td><?php echo $rombel ?></td>
		</tr>
		<tr>
			<td>Semester</td>
			<td>:</td>
			<td><?php echo $this->uri->segment(5) ?></td>
		</tr>
	</table>
	<hr>
	<br>
	<table border="1">
		<tr style="font-weight: bold;">
			<td width="1%">No</td>
			<td>Mata Pelajaran</td>
			<td>Nilai</td>
		</tr>
		<?php $no= 1; 
		foreach ($data as $key) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $key->nama_mapel ?></td>
			<td><?php echo $key->nar ?></td>
		</tr>
		<?php } ?>
	</table>


</body>
</html>