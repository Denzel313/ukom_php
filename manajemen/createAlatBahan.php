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
                    <label for="alamat">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang">
                  </div>
                  <div class="form-group">
                    <label for="spesifikasi">Spesifikasi</label>
                    <input type="text" name="spesifikasi" class="form-control" id="spesifikasi" placeholder="Spesifikasi">
                  </div>
                  <div class="form-group">
                    <label for="id_penyedia">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Lokasi">
                  </div>
                  <div class="form-group">
                    <label for="id_penyedia">Kondisi</label>
                    <input type="text" name="kondisi" class="form-control" id="kondisi" placeholder="Kondisi">
                  </div>
                  <div class="form-group">
                    <label for="id_penyedia">Sumber Dana</label>
                    <input type="text" name="sumberdana" class="form-control" id="sumberdana" placeholder="Sumber Dana">
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
