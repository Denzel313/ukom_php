<?php
session_start();
// Sertakan file koneksi ke database di sini
include 'koneksi.php'; // Gantilah 'koneksi.php' dengan file koneksi yang sesuai

// Fungsi untuk melakukan login
function loginUser($username, $password) {
    global $conn; // Variabel koneksi ke database (didefinisikan di file koneksi.php)

    // Lindungi dari serangan SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query untuk memeriksa keberadaan pengguna dengan username dan password yang sesuai
    $query = "SELECT * FROM user WHERE usernama='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        // Periksa jumlah baris yang dikembalikan dari query
        if (mysqli_num_rows($result) == 1) {
            // Pengguna ditemukan, login berhasil
            $data = mysqli_fetch_assoc($result);
            $nama = $data['nama'];
            $level = $data['level'];
            $iduser = $data['id_user'];
            $_SESSION['nama'] = $nama;
            $_SESSION['level'] = $level;
            $_SESSION['iduser'] = $iduser;
            return true;
        } else {
            // Username atau password tidak sesuai
            return false;
        }
    } else {
        // Terjadi kesalahan dalam menjalankan query
        echo "Error: " . mysqli_error($conn);
        return false;
    }
}

// Gunakan fungsi loginUser untuk memproses formulir login
if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Panggil fungsi loginUser
    if (loginUser($username, $password)) {
        // Redirect ke halaman sukses atau lakukan tindakan setelah login berhasil
        if ($_SESSION['level'] == "3") {
            echo "3";
            header('location:peminjam/index.php?url=stok');
        } elseif ($_SESSION['level'] == "2") {
            // header('location:./managemen/index.php?url=product');
            echo "2";
            header('location:manajemen/index.php?url=stok');
        } elseif ($_SESSION['level'] == "1") {
            header('location:admin/index.php?url=stok');
        }
    } else {
        // Tampilkan pesan error atau lakukan tindakan jika login gagal
        echo "<script>
    alert('Login failed. Please check your username and password.');
    window.location.assign('login.php');
    </script>";
        echo "";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lend Your Book | Log in </title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index2.html" class="h1"><b>L</b>Book</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Log In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
