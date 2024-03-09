!! SEMUA MESIN ADA DI DALAM FOLDER "managemen" DENGAN NAMA FILE "function.php" !!

cara menggunakan :
1. jika ingin mengambil data dari table tertentu, cek nama function pada file function.php
 - jika nama function adalah `product()` dengan nama variabel `$products` , maka eksekusi / mengambil hasilnya di front-end adalah sebagai berikut

 $products = product();
foreach ($products as $product) {
    $product['nama_barang']
    $product['jml_masuk']
    $product['jml_keluar']
    $product['spesifikasi']
    $product['lokasi']
    $product['kondisi']
    $product['jumlah_barang']
    $product['sumber_dana']
}