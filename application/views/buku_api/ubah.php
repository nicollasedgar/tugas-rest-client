<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Edit Data Buku API</title>
</head>

<body>
    <div class="container">

        <div class="row mt-3">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        Edit Data Buku
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="hidden" name="kode" value="<?= $buku['isbn'] ?>">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" name="isbn" class="form-control" id="isbn" value="<?= $buku['isbn'] ?>">
                                <small id="emailHelp" class="form-text text-danger"><?= form_error('isbn'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control" id="judul" value="<?= $buku['judul'] ?>">
                                <small id="emailHelp" class="form-text text-danger"><?= form_error('judul'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <input type="text" name="penulis" class="form-control" id="penulis" value="<?= $buku['penulis'] ?>">
                                <small id="emailHelp" class="form-text text-danger"><?= form_error('penulis'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" id="penerbit" value="<?= $buku['penerbit'] ?>">
                                <small id="emailHelp" class="form-text text-danger"><?= form_error('penerbit'); ?></small>
                            </div>
                            <button type="submit" name="ubah" class="btn btn-primary float-right">Edit Data Buku</button>
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