        <!-- bagian luar -->
        <div id="page-wrapper" >
          <!-- bagian dalam -->
          <div id="page-inner">

            <div class="row">
              <div class="col-md-12">
                <h2>Pengembalian Buku</h2>   
                <!-- tombol tambah -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Tambah Pengembalian
                </button>
                <!-- tombol print -->
                <a class="btn btn-danger" href="<?=base_url(); ?>pengembalian/print"><i class="fa fa-print"></i>Print</a>
                <!-- tombol pdf -->
                <a class="btn btn-warning" href="<?=base_url(); ?>pengembalian/pdf"><i class="fa fa-file"></i>Export PDF</a>
                <!-- tombol excel -->
                <a class="btn btn-success" href="<?=base_url(); ?>pengembalian/excel"><i class="fa fa-file"></i>Export Excel</a>
              </div>
            </div>

            <hr />

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode kembali</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Tanggal kembali</th>
                  <th scope="col">Denda</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <?php $i = 1;
              foreach ($pengembalian as $pengembalian) : ?>
                <tbody>
                  <tr>
                    <td><?= $i++;  ?></td>
                    <td><?= $pengembalian['Kode_kembali']  ?></td>
                    <td><?= $pengembalian['Nama']  ?></td>
                    <td><?= $pengembalian['judul']  ?></td>
                    <td><?= $pengembalian['tgl_kembali']  ?></td>
                    <td><?= $pengembalian['denda']  ?></td>
                    <td><a href="<?= base_url(); ?>pengembalian/ubah/<?= $pengembalian['Kode_kembali'] ?>"><div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div></a></td>
                    <td onclick ="return confirm('Anda yakin ingin menghapus data?');"><?= anchor('pengembalian/hapus/'.$pengembalian['Kode_kembali'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                </tbody>
              <?php endforeach; ?>
            </table>

          </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengembalian</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?php echo base_url().'pengembalian/tambah'?>">
                    <div class="form-group">
                      <label>Kode kembali</label>
                      <input type="text" name="kodekembali" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tanggal kembali</label>
                      <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Denda</label>
                      <input type="number" name="denda" class="form-control">
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

