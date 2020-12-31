        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
          <!-- flash tapi belum jalan -->

          <?php if ($this->session->flashdata('flash') ) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data buku <strong>berhasil</strong><?= $this->session->flashdata('flash'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <div id="page-inner">
            <div class="row">
              <div class="col-md-12">
                <h2>Data Buku</h2>
                <!-- tombol tambah -->
                <a href="<?= base_url(); ?>buku/tambah" class="btn btn-primary">Tambah Koleksi Buku</a>
                <!-- tombol print -->
                <a class="btn btn-danger" href="<?=base_url(); ?>buku/print"><i class="fa fa-print"></i>Print</a>
                <!-- tombol pdf -->
                <a class="btn btn-warning" href="<?=base_url(); ?>buku/pdf"><i class="fa fa-file"></i>Export PDF</a>
                <!-- tombol excel -->
                <a class="btn btn-success" href="<?=base_url(); ?>buku/excel"><i class="fa fa-file"></i>Export Excel</a>
                <!-- tombol searching -->
                <div class="navbar-form navbar-right">
                  <form action="" method="post">
                    <input type=" text" name="keyword" class="form-control" placeholder="Cari data buku">
                    <button type="submit" class="btn btn-primary"><svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                      <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                    </svg></button>
                  </form>   
                </div>

              </div>
            </div>

            <hr />
            <!-- tabelnya -->
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Judul Buku</th>
                  <th scope="col">Ubah</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <?php $i = 1;
              foreach ( $buku as $buku ) : ?>
                <tbody>
                  <tr>
                    <td><?= $i++; ?></td>
                    <!-- kolom judul -->
                    <td><a href="<?= base_url(); ?>buku/info/<?= $buku['Kode_buku'] ?>"><?= $buku['judul']?></a></td>
                    <!-- kolom ubah -->
                    <td><a href="<?= base_url(); ?>buku/ubah/<?= $buku['Kode_buku'] ?>" class ="badge badge-danger float-right"><svg class="bi bi-gear-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 01-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 01.872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 012.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 012.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 01.872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 01-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 01-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 100-5.86 2.929 2.929 0 000 5.858z" clip-rule="evenodd"/>
                    </svg></a></td>
                    <!-- kolom hapus -->
                    <td><a href="<?= base_url(); ?>buku/hapus/<?= $buku['Kode_buku'] ?>" class ="badge badge-danger float-right" onclick ="return confirm('Anda yakin ingin menghapus data?');"><svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>
                    </svg></a></td>
                  </tr>
                </tbody>
              <?php endforeach; ?>
            </table>
            <?php if(empty($buku)): ?>
              <div class="alert alert-danger" role="alert">
                Data buku tidak ditemukan.
              </div>
            <?php endif; ?>

          </div>
          <!-- /. PAGE INNER  -->
        </div>

