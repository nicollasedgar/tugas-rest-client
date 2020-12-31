<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2 align="center">Data Peminjaman Lazaris</h2>
	<table border="1" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode pinjam</th>
				<th>Nama</th>
				<th>Judul</th>
				<th>Tanggal pinjam</th>
			</tr>
		</thead>
		<?php $i=1;
		foreach ( $peminjaman as $peminjaman): ?>
		<tbody>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $peminjaman['Kode_pinjam'] ?></td>
				<td><?= $peminjaman['Nama'] ?></td>
				<td><?= $peminjaman['judul'] ?></td>
				<td><?= $peminjaman['tgl_pinjam'] ?></td>
			</tr>
		</tbody>
		<?php endforeach; ?>
	</table>

</body>
</html>