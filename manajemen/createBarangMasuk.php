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
          <h1 class="m-0">Create Barang Masuk</h1>
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
                <h3 class="card-title">Form Tambah Barang Masuk</h3>
              </div>
              <form>
                <div class="card-body">
                  <div class="form-goup">
                    <label for="id_barang">Nama Barang</label>
                    <select name="id_barang" id="id_barang" class="form-control">
                      <?php
                      $select = mysqli_query($conn, "SELECT * FROM stok");
                      while ($row = mysqli_fetch_assoc($select)) {
                      ?>
                        <option value="<?= $row['id_barang'] ?>"><?= $row['nama_barang']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="jml_masuk">Jumlah Masuk</label>
                    <input type="number" name="jml_masuk" class="form-control" id="jml_masuk" placeholder="Jumlah Masuk">
                  </div>
                  <div class="form-goup">
                    <label for="id_penyedia">Penyedia</label>
                    <select name="id_penyedia" id="id_penyedia" class="form-control">
                      <?php
                      $select = mysqli_query($conn, "SELECT * FROM penyedia GROUP BY id_penyedia");
                      while ($data = mysqli_fetch_assoc($select)) {
                      ?>
                        <option value="<?= $data['id_penyedia'] ?>"><?= $data['nama_penyedia']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="addBarangMasuk" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
