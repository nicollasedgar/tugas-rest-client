<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>Edit Data Petugas Lazaris</title>
</head>
<body>
	<div class="container">

		<div class="row mt-3">
			<div class="col-md-6">

				<div class="card">
					<div class="card-header">
						Edit Petugas Lazaris
					</div>
					<div class="card-body">
						<form action="" method="post">
							<input type="hidden" name="kode" value="<?= $petugas['ID_petugas'] ?>">
							<div class="form-group">
								<label for="id_petugas">ID Petugas</label>
								<input type="text" name="id_petugas" class="form-control" id="id_petugas" value="<?= $petugas['ID_petugas'] ?>">
								<small id="emailHelp" class="form-text text-danger"><?= form_error('id_petugas'); ?></small>
							</div>
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" name="nama" class="form-control" id="nama" value="<?= $petugas['Nama'] ?>">
								<small id="emailHelp" class="form-text text-danger"><?= form_error('nama'); ?></small>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input type="text" name="alamat" class="form-control" id="alamat" value="<?= $petugas['Alamat'] ?>">
								<small id="emailHelp" class="form-text text-danger"><?= form_error('alamat'); ?></small>
							</div>
							<div class="form-group">
								<label for="jk">Jenis Kelamin</label>
								<input type="text" name="jk" class="form-control" id="jk" value="<?= $petugas['JK'] ?>">
								<small id="emailHelp" class="form-text text-danger"><?= form_error('jk'); ?></small>
							</div>
							<div class="form-group">
								<label for="kontak">Kontak</label>
								<input type="text" name="kontak" class="form-control" id="kontak" value="<?= $petugas['Kontak'] ?>">
								<small id="emailHelp" class="form-text text-danger"><?= form_error('kontak'); ?></small>
							</div>
							<button type="submit" name="ubah" class="btn btn-primary float-right" >Edit Data Petugas</button>
						</form>
					</div>
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

