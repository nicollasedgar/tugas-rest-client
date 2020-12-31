<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>Edit Data Pengembalian Buku Lazaris</title>
</head>
<body>
	<div class="container">

		<div class="row mt-3">
			<div class="col-md-6">

				<div class="card">
					<div class="card-header">
						Edit Pengembalian Buku Lazaris
					</div>
					<div class="card-body">
						<form action="" method="post">
							<input type="hidden" name="kode" value="<?= $pengembalian['Kode_kembali'] ?>">
							<div class="form-group">
								<label for="kodekembali">Kode kembali</label>
								<input type="text" name="kodekembali" class="form-control" id="kodekembali" value="<?= $pengembalian['Kode_kembali'] ?>">
								<small id="emailHelp" class="form-text text-danger"><?= form_error('kodepinjam'); ?></small>
							</div>
							<div class="form-group">
								<label for="tanggal">Tanggal kembali</label>
								<input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $pengembalian['tgl_kembali'] ?>">
								<small id="emailHelp" class="form-text text-danger"><?= form_error('tanggal'); ?></small>
							</div>
							<div class="form-group">
								<label for="denda">Denda</label>
								<input type="number" name="denda" class="form-control" id="denda" value="<?= $pengembalian['ID_petugas'] ?>">
								<small id="emailHelp" class="form-text text-danger"><?= form_error('denda'); ?></small>
							</div>
							<div class="form-group">
								<label for="idpetugas">ID petugas</label>
								<input type="text" name="idpetugas" class="form-control" id="idpetugas" value="<?= $pengembalian['ID_petugas'] ?>">
								<small id="emailHelp" class="form-text text-danger"><?= form_error('idpetugas'); ?></small>
							</div>
							<div class="form-group">
								<label for="idanggota">ID anggota</label>
								<input type="text" name="idanggota" class="form-control" id="idanggota" value="<?= $pengembalian['ID_anggota'] ?>">
								<small id="emailHelp" class="form-text text-danger"><?= form_error('idanggota'); ?></small>
							</div>
							<div class="form-group">
								<label for="kodebuku">Kode buku</label>
								<input type="text" name="kodebuku" class="form-control" id="kodebuku" value="<?= $pengembalian['Kode_buku'] ?>">
								<small id="emailHelp" class="form-text text-danger"><?= form_error('kodebuku'); ?></small>
							</div>
							<button type="submit" name="ubah" class="btn btn-primary float-right" >Edit Data Peminjaman</button>
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

