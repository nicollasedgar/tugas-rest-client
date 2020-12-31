        <!-- bagian luar -->
        <div id="page-wrapper">
          <!-- bagian dalam -->
          <div id="page-inner">

            <div class="row">
              <div class="col-md-12">
                <h2>Data Petugas</h2>
                <!-- tombol tambah -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Tambah Data Buku API
                </button>
                <!-- tombol print -->
                <a class="btn btn-danger" href="<?= base_url(); ?>petugas/print"><i class="fa fa-print"></i>Print</a>
                <!-- tombol pdf -->
                <a class="btn btn-warning" href="<?= base_url(); ?>petugas/pdf"><i class="fa fa-file"></i>Export PDF</a>
                <!-- tombol excel -->
                <a class="btn btn-success" href="<?= base_url(); ?>petugas/excel"><i class="fa fa-file"></i>Export Excel</a>
                <!-- tombol searching -->
                <div class="navbar-form navbar-right">
                  <form action="" method="post">
                    <input type=" text" name="keyword" class="form-control" placeholder="Cari petugas">
                    <button type="submit" class="btn btn-primary"><svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd" />
                      </svg></button>
                  </form>
                </div>
              </div>
            </div>

            <hr />

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">ID Petugas</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Jenis kelamin</th>
                  <th scope="col">Kontak</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <?php $i = 1;
              foreach ($petugas as $petugas) : ?>
                <tbody>
                  <tr>
                    <td><?= $i++;  ?></td>
                    <td><?= $petugas['ID_petugas']  ?></td>
                    <td><?= $petugas['Nama']  ?></td>
                    <td><?= $petugas['Alamat']  ?></td>
                    <td><?= $petugas['JK']  ?></td>
                    <td><?= $petugas['Kontak']  ?></td>
                    <td><a href="<?= base_url(); ?>petugas/ubah/<?= $petugas['ID_petugas'] ?>">
                        <div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>
                      </a></td>
                    <td onclick="return confirm('Anda yakin ingin menghapus data?');"><?= anchor('petugas/hapus/' . $petugas['ID_petugas'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                  </tr>
                </tbody>
              <?php endforeach; ?>
            </table>

          </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url() . 'Petugas/tambah' ?>">
                    <div class="form-group">
                      <label>ID Petugas</label>
                      <input type="text" name="id_petugas" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input type="text" name="jk" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Kontak</label>
                      <input type="text" name="kontak" class="form-control">
                    </div>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>