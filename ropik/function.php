<?php
require '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
//  select product
$alatBahan = array();

function alatBahan()
{
    global $conn;
    $query = "SELECT * FROM alatbahan";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $alatBahan[] = array(
            'nama_barang' => $row['nama_barang'],
            'id_barang' => $row['id_barang'],
            'spesifikasi' => $row['spesifikasi'],
            'lokasi' => $row['lokasi'],
            'kondisi' => $row['kondisi'],
            'jumlah_barang' => $row['jumlah_barang'],
            'sumber_dana' => $row['sumber_dana']
        );
    }
    return $alatBahan;
}
// select barang_masuk
$barangMasuk = array();
// nama function
function barangMasuk()
{
    global $conn;
    // query select table, jika ingin mengubah hasil select cukup masukan nama column yg diinginkan
    $query = "SELECT nama_penyedia,nama_barang,tgl_masuk,jml_masuk,id_barang,barang_masuk.id_penyedia FROM barang_masuk
    INNER JOIN penyedia ON penyedia.id_penyedia = barang_masuk.id_penyedia ORDER BY tgl_masuk DESC";
    $result = mysqli_query($conn, $query);

    while ($data = mysqli_fetch_assoc($result)) {
        $barangMasuk[] = array(
            //  nama column yang harus kalian panggil di front-end adalah yang depan
            'id_barang' => $data['id_barang'],
            'nama_barang' => $data['nama_barang'],
            'nama_penyedia' => $data['nama_penyedia'],
            'tgl_masuk' => $data['tgl_masuk'],
            'jml_masuk' => $data['jml_masuk'],
            'id_penyedia' => $data['id_penyedia']
        );
    }
    // variable yg harus di panggil
    return $barangMasuk;
}

// select barnag_keluar
$barangKeluar = array();
// nama function
function barangKeluar()
{
    global $conn;
    // query select table, jika ingin mengubah hasil select cukup masukan nama column yg diinginkan
    $query = "SELECT * FROM barang_keluar ORDER BY tgl_keluar DESC";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $barangKeluar[] = array(
            //  nama column yang harus kalian panggil di front-end adalah yang depan
            'id_barang' => $row['id_barang'],
            'nama_barang' => $row['nama_barang'],
            'tgl_keluar' => $row['tgl_keluar'],
            'jml_keluar' => $row['jml_keluar'],
            'lokasi' => $row['lokasi'],
            'penerima' => $row['penerima']
        );
    }
    // variable yg harus di panggil
    return $barangKeluar;
}

// select penyedia
$penyedia = array();
// nama function
function penyedia()
{
    global $conn;
    // query select table, jika ingin mengubah hasil select cukup masukan nama column yg diinginkan
    $query = "SELECT * FROM penyedia";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $penyedia[] = array(
            //  nama column yang harus kalian panggil di front-end adalah yang depan
            'id_penyedia' => $row['id_penyedia'],
            'nama_penyedia' => $row['nama_penyedia'],
            'alamat_penyedia' => $row['alamat_penyedia'],
            'telepon_penyedia' => $row['telepon_penyedia']
        );
    }
    // variable yg harus di panggil
    return $penyedia;
}

// select pinjam_alat
$pinjamAlat = array();
// nama function
function pinjamAlat()
{
    global $conn;
    // query select table, jika ingin mengubah hasil select cukup masukan nama column yg diinginkan
    $query = "SELECT * FROM pinjam_alat";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $pinjamAlat[] = array(
            //  nama column yang harus kalian panggil di front-end adalah yang depan
            'id_pinjam' => $row['id_pinjam'],
            'peminjam' => $row['peminjam'],
            'tgl_pinjam' => $row['tgl_pinjam'],
            'id_barang' => $row['id_barang'],
            'nama_barang' => $row['nama_barang'],
            'jml_barang' => $row['jml_barang'],
            'tgl_kembali' => $row['tgl_kembali'],
            'kondisi' => $row['kondisi']
        );
    }
    // variable yg harus di panggil
    return $pinjamAlat;
}
// menambahkan barang, alatbahan, menambahkan stok
// nama yang ada didalam $_post[''] dapat diubah sesuai nama inputan yang kalian buat
if (isset($_POST['addProduct'])) {

    $namaBarang = $_POST['nama_barang'];
    $spesifikasi = $_POST['spesifikasi'];
    $lokasi = $_POST['lokasi'];
    $kondisi = $_POST['kondisi'];
    $sumberDana = $_POST['sumberdana'];

    $querystok = "INSERT INTO stok (nama_barang) VALUES (?)";
    $stmtstok = mysqli_prepare($conn, $querystok);
    mysqli_stmt_bind_param($stmtstok, 's', $namaBarang);
    $insertstok = mysqli_stmt_execute($stmtstok);
    if ($insertstok) {
        $select = mysqli_query($conn, "SELECT id_barang FROM stok WHERE nama_barang = '$namaBarang'");
        if ($data = mysqli_fetch_assoc($select)) {
            $id_barang = $data['id_barang'];
            echo $id_barang;
            // Use prepared statements to prevent SQL injection
            $query = "INSERT INTO alatbahan (id_barang, nama_barang, spesifikasi, lokasi, kondisi, sumber_dana) 
              VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, 'isssss', $id_barang, $namaBarang, $spesifikasi, $lokasi, $kondisi, $sumberDana);
            // Execute the prepared statement
            $insert = mysqli_stmt_execute($stmt);
            // Check if the query was successful
            if ($insert) {
                // text yg berada pada `alert("")` dapat diubah sesuai keinginan, berfungsi sebagai penanda jika srcipt berhasil / gagal
                //  window.location.href="" dapat diubah sesuai lokasi file yg ingin di akses ketika berhasil / gagal menjalankan script
                echo '
                <script>
                alert("berhasil");
                window.location.href="?url=product";
                </script>';
            } else {
                echo mysqli_error($conn);
                echo '
                <script>
                alert("gagal Insert");
                window.location.href="?url=product";
                </script>';
            }
        }
    }
}

// tambah penyedia
// nama yang ada didalam $_post[''] dapat diubah sesuai nama inputan yang kalian buat
if (isset($_POST['addPenyedia'])) {
    $nama_penyedia = $_POST['nama_penyedia'];
    $alamat_penyedia = $_POST['alamat_penyedia'];
    $telepon_penyedia = $_POST['telepon_penyedia'];
    // query insert penyedia
    $insert = "INSERT INTO penyedia (nama_penyedia,alamat_penyedia,telepon_penyedia) VALUES (?,?,?)";
    $stmtPenyedia = mysqli_prepare($conn, $insert);
    mysqli_stmt_bind_param($stmtPenyedia, "sss", $nama_penyedia, $alamat_penyedia, $telepon_penyedia);

    $execute = mysqli_stmt_execute($stmtPenyedia);
    if ($execute) {
        // text yg berada pada `alert("")` dapat diubah sesuai keinginan, berfungsi sebagai penanda jika srcipt berhasil / gagal
        //  window.location.href="" dapat diubah sesuai lokasi file yg ingin di akses ketika berhasil / gagal menjalankan script
        echo '
        <script>
        alert("berhasil menambahkan penyedia");
        window.location.href="?url=product";
        </script>';
    } else {
        echo mysqli_error($conn);
        echo '
        <script>
        alert("gagal menambahkan penyedia");
        window.location.href="?url=product";
        </script>';
    }
}

// insert barang_masuk
// nama yang ada didalam $_post[''] dapat diubah sesuai nama inputan yang kalian buat
if (isset($_POST['addBarangMasuk'])) {
    $id_barang = $_POST['id_barang'];
    $tgl_masuk = date('Y-m-d H:i:s');
    $jml_masuk = $_POST['jml_masuk'];
    $id_penyedia = $_POST['id_penyedia'];

    $select = mysqli_query($conn, "SELECT nama_barang FROM stok WHERE id_barang = '$id_barang'");
    $fetch = mysqli_fetch_assoc($select);
    $nama_barang = $fetch['nama_barang'];

    $query = "INSERT INTO barang_masuk (id_barang,nama_barang,tgl_masuk,jml_masuk,id_penyedia) VALUES (?,?,?,?,?)";
    $stmtBarangMasuk = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmtBarangMasuk, "issii", $id_barang, $nama_barang, $tgl_masuk, $jml_masuk, $id_penyedia);
    $insert = mysqli_stmt_execute($stmtBarangMasuk);
    if ($insert) {
        // select qty di table stok
        $selectStok = mysqli_query($conn, "SELECT jml_masuk,total_barang FROM stok WHERE id_barang = '$id_barang'");
        $row = mysqli_fetch_assoc($selectStok);
        $jmlMasukStok = $row['jml_masuk'];
        $totalBarang = $row['total_barang'];
        // jumlahkan data qty
        $hasilMasuk = $jmlMasukStok + $jml_masuk;
        $hasiltotal = $totalBarang + $jml_masuk;
        // update table stok
        if ($row) {
            $updateStok = mysqli_query($conn, "UPDATE stok SET jml_masuk = '$hasilMasuk', total_barang = '$hasiltotal' WHERE id_barang = '$id_barang'");
            if ($updateStok) {
                $updateAlatBahan = mysqli_query($conn, "UPDATE alatbahan SET jumlah_barang = '$hasiltotal' WHERE id_barang = '$id_barang' AND kondisi = 'baru'");
                if ($updateAlatBahan) {
                    // text yg berada pada `alert("")` dapat diubah sesuai keinginan, berfungsi sebagai penanda jika srcipt berhasil / gagal
                    //  window.location.href="" dapat diubah sesuai lokasi file yg ingin di akses ketika berhasil / gagal menjalankan script
                    echo '
                    <script>
                    alert("berhasil menambahkan barang");
                    window.location.href="?url=product";
                    </script>';
                } else {
                    echo mysqli_error($conn);
                    echo '
                    <script>
                    alert("gagal menambahkan barang");
                    window.location.href="?url=product";
                    </script>';
                }
            }
        }
    }
}

// insert barang_keluar
// nama yang ada didalam $_post[''] dapat diubah sesuai nama inputan yang kalian buat
if (isset($_POST['addBarangKeluar'])) {
    $id_barang = $_POST['id_barang'];
    $tgl_keluar = date('Y-m-d H:i:S');
    $jml_keluar = $_POST['jml_keluar'];
    $lokasi = $_POST['lokasi'];
    $penerima = $_POST['penerima'];

    $select = mysqli_query($conn, "SELECT nama_barang FROM stok WHERE id_barang = '$id_barang'");
    $fetch = mysqli_fetch_assoc($select);
    $nama_barang = $fetch['nama_barang'];
    $query = "INSERT INTO barang_keluar (id_barang,nama_barang,tgl_keluar,jml_keluar,lokasi,penerima) VALUES (?,?,?,?,?,?)";
    $stmtBarangKeluar = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmtBarangKeluar, "ississ", $id_barang, $nama_barang, $tgl_keluar, $jml_keluar, $lokasi, $penerima);
    $insert = mysqli_stmt_execute($stmtBarangKeluar);
    if ($insert) {
        // select qty di table stok
        $selectStok = mysqli_query($conn, "SELECT jml_keluar,total_barang FROM stok WHERE id_barang = '$id_barang'");
        $row = mysqli_fetch_assoc($selectStok);
        $jmlKeluarStok = $row['jml_keluar'];
        $totalBarang = $row['total_barang'];
        // jumlahkan data qty
        $hasilKeluar = $jmlKeluarStok + $jml_keluar;
        $hasiltotal = $totalBarang - $jml_keluar;
        // update table stok
        if ($row) {
            $updateStok = mysqli_query($conn, "UPDATE stok SET jml_keluar = '$hasilKeluar', total_barang = '$hasiltotal' WHERE id_barang = '$id_barang'");
            if ($updateStok) {
                $select = mysqli_query($conn, "SELECT jumlah_barang FROM alatbahan WHERE id_barang = '$id_barang' AND lokasi = '$lokasi'");
                $datas = mysqli_fetch_assoc($select);
                $jum = $datas['jumlah_barang'];
                $hasiljum = $jum - $jml_keluar;

                if ($hasiljum >= 0) {
                    $updateAlatBahan = mysqli_query($conn, "UPDATE alatbahan SET jumlah_barang = '$hasiljum' WHERE id_barang = '$id_barang' AND lokasi = '$lokasi'");
                    if ($updateAlatBahan) {
                        // text yg berada pada `alert("")` dapat diubah sesuai keinginan, berfungsi sebagai penanda jika srcipt berhasil / gagal
                        //  window.location.href="" dapat diubah sesuai lokasi file yg ingin di akses ketika berhasil / gagal menjalankan script
                        echo '
                    <script>
                    alert("berhasil mengurangi barang");
                    window.location.href="?url=product";
                    </script>';
                    } else {
                        echo mysqli_error($conn);
                        echo '
                    <script>
                    alert("gagal mengurangi barang");
                    window.location.href="?url=product";
                    </script>';
                    }
                } else {
                    echo '
                    <script>
                    alert("Quantity Tidak mencukupi");
                    window.location.href="?url=product";
                    </script>';
                }
            }
        }
    } else {
        echo "gagal insert barang keluar";
    }
}

// insert pinjam_alat
// nama yang ada didalam $_post[''] dapat diubah sesuai nama inputan yang kalian buat
if (isset($_POST['pinjamAlat'])) {
    $id_barang = $_POST['id_barang'];
    $peminjam = $_POST['nama'];
    $tgl_peminjam = date('Y-m-d H:i:s');
    $nama_barang = $_POST['nama_barang'];
    $jml_barang = $_POST['jml_barang'];

    $query = "INSERT INTO pinjam_alat (id_barang,peminjam,tgl_pinjam,nama_barang,jml_barang) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "isssi", $id_barang, $peminjam, $tgl_peminjam, $nama_barang, $jml_barang);
    $insert = mysqli_stmt_execute($stmt);

    if ($insert) {
        // text yg berada pada `alert("")` dapat diubah sesuai keinginan, berfungsi sebagai penanda jika srcipt berhasil / gagal
        //  window.location.href="" dapat diubah sesuai lokasi file yg ingin di akses ketika berhasil / gagal menjalankan script
        echo '
        <script>
        alert("berhasil meminjam barang");
        window.location.href="?url=product";
        </script>';
    } else {
        echo mysqli_error($conn);
        echo '
        <script>
        alert("gagal meminjam barang");
        window.location.href="?url=product";
        </script>';
    }
}

// balikin barang
// nama yang ada didalam $_post[''] dapat diubah sesuai nama inputan yang kalian buat
if (isset($_POST['balikin'])) {
    $id_pinjam = $_POST['id_pinjam'];
    $tgl_kembali = date('Y-m-d H:i:s');
    $kondisi = $_POST['kondisi'];

    $query = mysqli_prepare($conn, "UPDATE pinjam_alat SET tgl_kembali = '?', kondisi = '?' WHERE id_pinjam = '?'");
    mysqli_stmt_bind_param($query, "sss", $tgl_kembali, $kondisi, $id_pinjam);
    $update = mysqli_stmt_execute($query);

    if ($update) {
        // text yg berada pada `alert("")` dapat diubah sesuai keinginan, berfungsi sebagai penanda jika srcipt berhasil / gagal
        //  window.location.href="" dapat diubah sesuai lokasi file yg ingin di akses ketika berhasil / gagal menjalankan script
        echo '
        <script>
        alert("berhasil mengembailkan barang");
        window.location.href="?url=product";
        </script>';
    } else {
        echo mysqli_error($conn);
        echo '
        <script>
        alert("gagal mengembalikan barang");
        window.location.href="?url=product";
        </script>';
    }
}
