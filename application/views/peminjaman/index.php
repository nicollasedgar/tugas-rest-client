        <!-- bagian luar -->
        <div id="page-wrapper" >
          <!-- bagian dalam -->
          <div id="page-inner">
            
            <div class="row">
              <div class="col-md-12">
                <h2>Peminjaman Buku</h2>   
                <!-- tombol tambah -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Tambah Peminjaman
                </button>
                <!-- tombol print -->
                <a class="btn btn-danger" href="<?=base_url(); ?>peminjaman/print"><i class="fa fa-print"></i>Print</a>
                <!-- tombol pdf -->
                <a class="btn btn-warning" href="<?=base_url(); ?>peminjaman/pdf"><i class="fa fa-file"></i>Export PDF</a>
                <!-- tombol excel -->
                <a class="btn btn-success" href="<?=base_url(); ?>peminjaman/excel"><i class="fa fa-file"></i>Export Excel</a>
              </div>
            </div>

            <hr />

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode pinjam</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nama buku</th>
                  <th scope="col">Tanggal pinjam</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <?php $i = 1;
              foreach ($peminjaman as $peminjaman) : ?>
                <tbody>
                  <tr>
                    <td><?= $i++;  ?></td>
                    <td><?= $peminjaman['Kode_pinjam']  ?></td>
                    <td><?= $peminjaman['Nama']  ?></td>
                    <td><?= $peminjaman['judul']  ?></td>
                    <td><?= $peminjaman['tgl_pinjam']  ?></td>
                    <td><a href="<?= base_url(); ?>peminjaman/ubah/<?= $peminjaman['Kode_pinjam'] ?>"><div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div></a></td>
                    <td onclick ="return confirm('Anda yakin ingin menghapus data?');"><?= anchor('peminjaman/hapus/'.$peminjaman['Kode_pinjam'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                </tbody>
              <?php endforeach; ?>
            </table>

          </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peminjaman</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url().'peminjaman/tambah'?>">
                    <div class="form-group">
                      <label>Kode pinjam</label>
                      <input type="text" name="kodepinjam" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tanggal pinjam</label>
                      <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>ID petugas</label>
                      <input type="text" name="idpetugas" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>ID Anggota</label>
                      <input type="text" name="idanggota" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Kode buku</label>
                      <input type="text" name="kodebuku" class="form-control">
                    </div>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>

