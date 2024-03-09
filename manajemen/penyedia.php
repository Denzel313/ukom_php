<?php
include_once '../function.php';
// Call the function to fetch product data
$penyedia = penyedia();
// Iterate through the alatBahan and display information
?>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
        <a href="index.php?url=createPenyedia" class="<?php echo ($_GET['url'] === 'createPenyedia') ? 'active' : ''; ?> btn btn-primary mb-3">Tambah Data</a>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Penyedia Table</h3>
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
                <th>Nama Penyedia</th>
                <th>Alamat Penyedia</th>
                <th>Telepon Penyedia</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($penyedia as $p) {
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $p['nama_penyedia'] ?></td>
                  <td><?= $p['alamat_penyedia'] ?></td>
                  <td><?= $p['telepon_penyedia'] ?></td>
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
