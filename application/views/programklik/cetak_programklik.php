<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Surat Rujukan</title>
	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
	</style>
</head>

<body>
	<table width="100%">
		<tr>
			<td width="50" align="center">
				<h1>UKS SMP Negeri 1 Semarang</h1>
				<h2>Semarang</h2>
			</td>
		</tr>
	</table>
	<hr>

	<table border="0" width="100%">
		<tr>
			<td>Nomor</td>
			<td>:</td>
			<td>426/SP/SMP.01/IV/2023</td>
			<td style="text-align: right;">
				<h3>Semarang,
					<?= indonesian_date_time(date("Y-m-d")) ?>
				</h3>
			</td>
		</tr>
		<tr>
			<td>Lampiran</td>
			<td>:</td>
			<td>-</td>
		</tr>
		<tr>
			<td>Hal</td>
			<td>:</td>
			<td>Surat Rujukan</td>
		</tr>
	</table>

	<h1 style="text-align: center">Surat Rujukan Ke Rumah Sakit</h1>
	<table border="0" style="font-size: 14px; font-weight: bold;">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>
			<?php echo $program["nama_siswa"] ?>
			</td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td>
			<?php echo $program["kelas"] ?>
			</td>
		</tr>
		<tr>
			<td>Keluhan</td>
			<td>:</td>
			<td>
				<?php echo $program["keluhan"] ?>
			</td>
		</tr>
		
	</table>
	<hr>
	<br>
	<div>
		<div>
			*Bukti ini sebagai tanda rujukan pasien
		</div>
		<div>
			<div>
				<h5 style="padding: 0 0 20px 0 ;">Petugas</h5>
				<p>ttd</p>
			</div>
		</div>
	</div>


</body>

</html>