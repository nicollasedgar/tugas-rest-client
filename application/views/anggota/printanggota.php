<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>Data Anggota Lazaris</h2>
	<table border="1" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>ID anggota</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>Kontak</th>
			</tr>
		</thead>
		<?php $i=1;
		foreach ( $anggota as $anggota): ?>
		<tbody>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $anggota['ID_anggota'] ?></td>
				<td><?= $anggota['Nama'] ?></td>
				<td><?= $anggota['Alamat'] ?></td>
				<td><?= $anggota['JK'] ?></td>
				<td><?= $anggota['Kontak'] ?></td>
			</tr>
		</tbody>
		<?php endforeach; ?>
	</table>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>