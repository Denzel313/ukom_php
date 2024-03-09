<?php
include_once '../function.php';
// Call the function to fetch product data
$barangKeluar = barangKeluar();
// Iterate through the alatBahan and display information
?>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
        <a href="index.php?url=createBarangKeluar" class="<?php echo ($_GET['url'] === 'createBarangKeluar') ? 'active' : ''; ?> btn btn-primary mb-3">Tambah Data</a>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Barang Keluar Table</h3>

            <div class="card-tools">
              <form action="" method="GET">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ $request->get('search') }}">  -->
              </form>

              <div class="input-group-append">
                <!-- <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button> -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Tanggal Keluar</th>
                <th>Jumlah Keluar</th>
                <th>Lokasi</th>
                <th>Penerima</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($barangKeluar as $keluar) {
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $keluar['nama_barang'] ?></td>
                  <td><?= $keluar['tgl_keluar'] ?></td>
                  <td><?= $keluar['jml_keluar'] ?></td>
                  <td><?= $keluar['lokasi'] ?></td>
                  <td><?= $keluar['penerima'] ?></td>
                </tr>
              <?php
              }
              ?>
              <div class="modal fade" id="modal-hapus{{ $d->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah Kamu yakin ingin menghapus data Alat Bahan <b>DATA</b></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <form action="{{ route('admin.delete.alat-bahan',['id' => $d->id]) }}" method="POST">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
