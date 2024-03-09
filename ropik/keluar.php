<?php
require '../koneksi.php';

$id_barang = htmlspecialchars($_POST['id_barang']);
$jumlah_keluar = htmlspecialchars($_POST['jml_keluar']);
$penerima = htmlspecialchars($_POST['penerima']);
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
                        <h3><?php
                            $select = mysqli_query($conn, "SELECT nama_barang FROM alatbahan WHERE id_barang = '$id_barang' GROUP BY id_barang");
                            while ($data = mysqli_fetch_assoc($select)) {
                                echo $data['nama_barang'];
                            }
                            ?></h3>
                        <input type="text" name="id_barang" value="<?= $id_barang ?>" hidden>
                    </div>
                    <div class="form-group">
                        <label class="text-center font-weight" for="nama">Jumlah keluar</label>
                        <input type="number" name="jml_keluar" class="form-control" value="<?= $jumlah_keluar ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Penerima</label>
                        <input type="text" name="penerima" class="form-control" value="<?= $penerima ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat">lokasi</label>
                        <select name="lokasi" id="" class="form-control">
                            <?php
                            $select = mysqli_query($conn, "SELECT lokasi FROM alatbahan WHERE id_barang = '$id_barang'");
                            while ($data = mysqli_fetch_assoc($select)) {
                                $lokasi = $data['lokasi'];
                            ?>
                                <option value="<?= $lokasi ?>"><?= $lokasi ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit" name="addBarangKeluar">submit</button>
                </form>
            </div>
        </div>
    </div>
</div>