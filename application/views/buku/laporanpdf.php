<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2 align="center">Koleksi Buku Lazaris</h2>
	<table border="1" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode buku</th>
				<th>Judul</th>
				<th>Penulis</th>
				<th>Penerbit</th>
				<th>Tahun</th>
				<th>Nomor rak</th>
			</tr>
		</thead>
		<?php $i=1;
		foreach ( $buku as $buku): ?>
		<tbody>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $buku['Kode_buku'] ?></td>
				<td><?= $buku['judul'] ?></td>
				<td><?= $buku['penulis'] ?></td>
				<td><?= $buku['penerbit'] ?></td>
				<td><?= $buku['tahun'] ?></td>
				<td><?= $buku['no_rak'] ?></td>
			</tr>
		</tbody>
		<?php endforeach; ?>
	</table>

</body>
</html>