<?php
include_once 'function.php';
// Call the function to fetch product data
$alatBahan = alatBahan();
$penyedia = penyedia();
// Iterate through the alatBahan and display information
?>
<div class="row justify-content-center">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center font-weight-bold">Input Penyedia</h4>
            </div>
            <div class="card-body">
                <form method="post" action="?url=keluar">
                    <div class="form-goup">
                        <label for="alamat">nama barang</label>
                        <select name="id_barang" id="id_barang" class="form-control">
                            <?php
                            $select = mysqli_query($conn,"SELECT * FROM alatbahan GROUP BY id_barang");
                            while ($product = mysqli_fetch_assoc($select)) {
                            ?>
                                <option value="<?= $product['id_barang'] ?>"><?= $product['nama_barang']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-center font-weight" for="nama">Jumlah keluar</label>
                        <input type="number" name="jml_keluar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Penerima</label>
                        <input type="text" name="penerima" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">submit</button>
                </form>
            </div>
        </div>
    </div>
</div>