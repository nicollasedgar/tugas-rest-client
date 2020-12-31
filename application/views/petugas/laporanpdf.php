<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>Data Petugas Lazaris</h2>
	<table border="1" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>ID Petugas</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>Kontak</th>
			</tr>
		</thead>
		<?php $i=1;
		foreach ( $petugas as $petugas): ?>
		<tbody>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $petugas['ID_petugas'] ?></td>
				<td><?= $petugas['Nama'] ?></td>
				<td><?= $petugas['Alamat'] ?></td>
				<td><?= $petugas['JK'] ?></td>
				<td><?= $petugas['Kontak'] ?></td>
			</tr>
		</tbody>
		<?php endforeach; ?>
	</table>

</body>
</html>