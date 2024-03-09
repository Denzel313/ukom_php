<?php
include_once '../function.php';
// Call the function to fetch product data
$alatBahan = alatBahan();
$penyedia = penyedia();
// Iterate through the alatBahan and display information
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-12 ">
          <h1 class="m-0">Create Barang Keluar</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Barang Keluar</h3>
              </div>
              <form>
                <div class="card-body">
                  <div class="form-goup">
                    <label for="alamat">Nama Barang</label>
                    <select name="id_barang" id="id_barang" class="form-control">
                      <?php
                      $select = mysqli_query($conn, "SELECT * FROM alatbahan GROUP BY id_barang");
                      while ($product = mysqli_fetch_assoc($select)) {
                      ?>
                        <option value="<?= $product['id_barang'] ?>"><?= $product['nama_barang']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="jml_keluar">Jumlah Keluar</label>
                    <input type="number" name="jml_keluar" class="form-control" id="jml_keluar" placeholder="Jumlah Keluar">
                  </div>
                  <div class="form-group">
                    <label for="id_penyedia">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Lokasi">
                  </div>
                  <div class="form-group">
                    <label for="id_penyedia">Penerima</label>
                    <input type="text" name="penerima" class="form-control" id="penerima" placeholder="Penerima">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="addBarangKeluar" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
