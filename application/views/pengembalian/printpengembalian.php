<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2 align="center">Data Pengembalian Lazaris</h2>
	<table border="1" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode kembali</th>
				<th>Nama</th>
				<th>Judul</th>
				<th>Tanggal kembali</th>
				<th>Denda</th>
			</tr>
		</thead>
		<?php $i=1;
		foreach ( $pengembalian as $pengembalian): ?>
		<tbody>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $pengembalian['Kode_kembali'] ?></td>
				<td><?= $pengembalian['Nama'] ?></td>
				<td><?= $pengembalian['judul'] ?></td>
				<td><?= $pengembalian['tgl_kembali'] ?></td>
				<td><?= $pengembalian['denda'] ?></td>
			</tr>
		</tbody>
		<?php endforeach; ?>
	</table>


	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>

