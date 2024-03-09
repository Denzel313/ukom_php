<?php
include_once '../function.php';
// Call the function to fetch product data
$alatBahan = alatBahan();
// Iterate through the alatBahan and display information
?>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
        <a href="index.php?url=createAlatBahan" class="<?php echo ($_GET['url'] === 'createAlatBahan') ? 'active' : ''; ?> btn btn-primary mb-3">Tambah Data</a>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Barang Masuk Table</h3>

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
                <th>Spesifikasi</th>
                <th>Lokasi</th>
                <th>Kondisi</th>
                <th>Jumlah Barang</th>
                <th>Sumber Dana</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $select = mysqli_query($conn, 'SELECT * FROM alatbahan');
              while ($row = mysqli_fetch_array($select)) {
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $row['nama_barang'] ?></td>
                  <td><?= $row['spesifikasi'] ?></td>
                  <td><?= $row['lokasi'] ?></td>
                  <td><?= $row['kondisi'] ?></td>
                  <td><?= $row['jumlah_barang'] ?></td>
                  <td><?= $row['sumber_dana'] ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
