        <!-- bagian luar -->
        <div id="page-wrapper">
            <!-- bagian dalam -->
            <div id="page-inner">

                <div class="row">
                    <div class="col-md-12">
                        <h2>Data Buku API</h2>
                        <!-- tombol tambah -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data Buku API
                        </button>
                        <!-- tombol print -->
                        <!-- <a class="btn btn-danger" href="<?= base_url(); ?>petugas/print"><i class="fa fa-print"></i>Print</a> -->
                        <!-- tombol pdf -->
                        <!-- <a class="btn btn-warning" href="<?= base_url(); ?>petugas/pdf"><i class="fa fa-file"></i>Export PDF</a> -->
                        <!-- tombol excel -->
                        <!-- <a class="btn btn-success" href="<?= base_url(); ?>petugas/excel"><i class="fa fa-file"></i>Export Excel</a> -->
                    </div>
                </div>

                <hr />

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Penerbit</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php $i = 1;
                    foreach ($buku as $api) : ?>
                        <tbody>
                            <tr>
                                <td><?= $i++;  ?></td>
                                <td><?= $api['isbn']  ?></td>
                                <td><?= $api['judul']  ?></td>
                                <td><?= $api['penulis']  ?></td>
                                <td><?= $api['penerbit']  ?></td>
                                <td><a href="<?= base_url(); ?>buku_api/ubah/<?= $api['isbn'] ?>">
                                        <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>
                                    </a></td>
                                <td onclick="return confirm('Anda yakin ingin menghapus data?');"><?= anchor('buku_api/hapus/' . $api['isbn'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>

            </div>

            <!-- Modal tambah data-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku API</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?php echo base_url() . 'buku_api/tambah' ?>">
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input type="text" name="isbn" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="judul" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Penulis</label>
                                    <input type="text" name="penulis" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control">
                                </div>
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>