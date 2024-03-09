<?php
include_once '../function.php';
// Call the function to fetch product data
$alatBahan = alatBahan();
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
                    <label for="peminjam">Peminjam</label>
                    <input type="text" name="peminjam" class="form-control" id="peminjam" placeholder="Peminjam">
                  </div>
                  <div class="form-group">
                    <label for="tgl_pinjam">Tanggal Pinjam</label>
                    <input type="text" name="tgl_pinjam" class="form-control" id="tgl_pinjam" placeholder="Tanggal Pinjam">
                  </div>
                  <div class="form-goup">
                    <label for="id_barang">Nama Barang</label>
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
                    <label for="jml_barang">Jumlah Barang</label>
                    <input type="text" name="jml_barang" class="form-control" id="jml_barang" placeholder="Jumlah Barang">
                  </div>
                  <div class="form-group">
                    <label for="tgl_kembali">Tanggal Kembali</label>
                    <input type="text" name="tgl_kembali" class="form-control" id="tgl_kembali" placeholder="Tanggal Kembali">
                  </div>
                  <div class="form-group">
                    <label for="kondisi">Kondisi</label>
                    <input type="text" name="kondisi" class="form-control" id="kondisi" placeholder="Kondisi">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="addProduct" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
