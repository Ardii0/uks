<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pembayaran <?php echo $nama ?>&nbsp;</title>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

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
	<td width="50" align="center"><h1>SMK Bina Nusantara</h1><h2>Semarang</h2></td>
	</tr>
	</table>
	<hr>

	<table border="0"  width="100%" >
		<tr>
			<td>Nomor</td>
			<td>:</td>
			<td>426/SP/SMK.BN/IV/2023</td>
			<td style="text-align: right;"><h3>Semarang, <?= format_indo2(date("Y-m-d")) ?></h3></td>
		</tr>
		<tr>
			<td>Lampiran</td>
			<td>:</td>
			<td>-</td>
		</tr>
		<tr>
			<td>Hal</td>
			<td>:</td>
			<td>Pembayaran SPP</td>
		</tr>
	</table>

	<h1 style="text-align: center">Rekap Pembayaran</h1>
	<table border="0" style="font-size: 14px; font-weight: bold;">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?= $nama ?></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><?= tampil_kelas_byid($kelas) ?></td>
		</tr>
		<tr>
			<td>ID Invoice</td>
			<td>:</td>
			<td><?= $invoice ?></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>:</td>
			<td><?= $keterangan ?></td>
		</tr>
	</table>
	<hr>
	<br>
	<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="4" cellspacing="4">
		<tr style="font-weight: bold;">
			<td width="1%">No</td>
			<td>ID Transaksi</td>
			<td>Jenis Pembayaran</td>
			<td>Nominal</td>
		</tr>
		<?php $id = 1; 
		foreach ($data as $key) { ?>
		<tr>
			<td><?php echo $id++; ?></td>
			<td><?php echo $key->id_tf ?></td>
			<td><?php echo tampil_jenisbayarById($key->id_jenis) ?></td>
			<td><?php echo convRupiah($key->nominal) ?></td>
		</tr>
		<?php } ?>
		<tr style="font-weight: bold;">
			<td></td>
			<td></td>
			<td>Total:</td>
			<td>
			<?php $subtotal = 0; 
			foreach ($data as $total) {
				$subtotal += $total->nominal;
			}
			echo convRupiah($subtotal) ?>
			</td>
		</tr>
	</table>
	
	<div>
		<div>
			*Bukti ini sebagai tanda pembayaran yang sah
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