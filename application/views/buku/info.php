<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>Informasi Buku</title>
</head>
<body>
	<div class="container">
		<div class="mt-5">
			<div class="card">
				<div class="card-header">
					<h4><?= $buku['judul'] ?></h4>
				</div>
				<div class="card-body">
					<h5 class="card-title">Kode buku : <?= $buku['Kode_buku'] ?></h5>
					<h5 class="card-title">Penulis : <?= $buku['penulis'] ?></h5>
					<h5 class="card-title">Penerbit : <?= $buku['penerbit'] ?></h5>
					<h5 class="card-title">Tahun : <?= $buku['tahun'] ?></h5>
					<h5 class="card-title">Nomor rak : <?= $buku['no_rak'] ?></h5>
					<a href="<?= base_url(); ?>buku" class="btn btn-primary">Kembali</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

