<?php
include_once '../function.php';
// Call the function to fetch product data
$penyedia = penyedia();
// Iterate through the alatBahan and display information
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 ">
                    <h1 class="m-0">Create Penyedia</h1>
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
                                <h3 class="card-title">Form Tambah Penyedia</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_penyedia">Nama Penyedia</label>
                                        <input type="text" name="nama_penyedia" class="form-control" id="nama_penyedia" placeholder="Telepon Penyedia">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_penyedia">Alamat Penyedia</label>
                                        <input type="text" name="alamat_penyedia" class="form-control" id="alamat_penyedia" placeholder="Jumlah Masuk">
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon_penyedia">Telepon Penyedia</label>
                                        <input type="text" name="telepon_penyedia" class="form-control" id="telepon_penyedia" placeholder="Telepon Penyedia">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="addPenyedia" class="btn btn-primary">Submit</button>
                                </div>
                              </form>
                        </div>
                    </div>
                  </div>
                </form>
          </div>
        </section>
</div>
