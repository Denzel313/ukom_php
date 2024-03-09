<?php
require 'function.php';
session_start();
if (empty($_SESSION['iduser'])) {
  echo "<script>
    alert('Maaf Anda Belum Login');
    window.location.assign('../login.php');
    </script>";
}
if ($_SESSION['level'] != 'manajemen') {
  echo "<script>
    alert('Maaf Anda Bukan manajemen');
    window.location.assign('../login.php');
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/mirorim.png">
  <link rel="icon" type="image/png" href="../assets/img/mirorim.png">
  <title>
    Rental Laptop
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href=".././assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href=".././assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href=".././assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.css">
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <link id="pagestyle" href=".././assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link href="path_to_bootstrap.css" rel="stylesheet">
  <style>
    .zoomable {
      width: 100px;
    }

    .zoomable:hover {
      transform: scale(2.8);
      transition: 0.3s ease;
    }
  </style>
  <style>
        /* Ganti warna background kelas bg-info */
        .bg-submit {
            background-color: #000000; /* Ganti dengan kode warna yang diinginkan */
        }
    </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../assets/img/mirorim.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Mirorim Inventory</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Inventory</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($_GET['url'] === 'product') ? 'active' : ''; ?>" href="index.php?url=product">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-box text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Product</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Dropship</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($_GET['url'] === 'approveds') ? 'active' : ''; ?>" href="index.php?url=approveds">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-check-square text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Task DS</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Request</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($_GET['url'] === 'refill') ? 'active' : ''; ?>" href="index.php?url=refill">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-clipboard-list text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Request Refill</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($_GET['url'] === 'order') ? 'active' : ''; ?>" href="index.php?url=order">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-dolly-flatbed text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Request Order</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Cek Status Approval</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($_GET['url'] === 'approve') ? 'active' : ''; ?>" href="index.php?url=approve">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-check-square text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Approve Item</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($_GET['url'] === '../kurir') ? 'active' : ''; ?>" href="../kurir/index.php?url=kurir ">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">kurir</span>
          </a>
        </li>

      </ul>
    </div>
    </li>
    </ul>
    </div>
    <div class="sidenav-footer mx-3">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="../assets/img/mirorim.png" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Role : <?= $_SESSION['level']; ?></h6>
            <p class="text-xs font-weight-bold mb-0">Name : <?= $_SESSION['nama']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
        <form id="myForm" method="post" action="">
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group">
                <span class="input-group-text text-body"><button style="border: 0px solid;" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button></span>
                <input type="text" class="form-control" name="sku" id="skuInput" placeholder="Type SKU or Name here...">
              </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-flex align-items-center">
                <a href="#" class="nav-link text-white font-weight-bold px-0" onclick="confirmLogout()">
                  <i class="fa fa-door-open me-sm-1"></i>
                  <span class="d-sm-inline d-none">Log Out</span>
                </a>
              </li>
              <script>
                function confirmLogout() {
                  var logoutConfirmed = confirm("Yakin Mau Logout?");
                  if (logoutConfirmed) {
                    window.location.href = "../logout.php";
                  }
                }
              </script>
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </li>
              <li class="nav-item dropdown px-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-bell cursor-pointer"></i>
                </a>
              </li>
            </ul>
          </div>
        </form>
      </div>
    </nav>
    <div class="container-fluid py-4">
      <!-- End Navbar -->
      <?php
      $file = @$_GET['url'];
      if (empty($file)) {
        echo '
';
      } else {
        include $file . '.php';
      }
      ?>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://instagram.com/sstrmdn" class="font-weight-bold" target="_blank">IT Support Mirorim</a>
                for a better web.
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src=".././assets/js/core/popper.min.js"></script>
  <script src=".././assets/js/core/bootstrap.min.js"></script>
  <script src=".././assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src=".././assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src=".././assets/js/plugins/chartjs.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../assets/DataTables/datatables.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({
        "paging": true, // Enable pagination
        "pageLength": 10, // Number of rows per page
        "lengthMenu": [10, 25, 50, 100], // Options for number of rows per page
      });
    });
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src=".././assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script>
    // JavaScript code
    // Function to initialize the DataTable
    function initializeDataTable() {
      if (!$.fn.DataTable.isDataTable('#myTable')) {
        const dataTable = $('#myTable').DataTable({
          // Add your DataTable initialization options here
        });
        // Handle pagination events
        dataTable.on('page.dt', function() {
          showMobileCards();
        });
      }
    }
    // Function to handle card clicks
    function handleCardClick(event) {
      event.preventDefault();
      // Add your logic here for card click event
    }
    // Function to show mobile cards based on pagination
    function showMobileCards() {
      const startIndex = (mobileCurrentPage - 1) * mobileItemsPerPage;
      const endIndex = startIndex + mobileItemsPerPage;
      $('#mobileCardContainer .card').hide();
      $('#mobileCardContainer .card').slice(startIndex, endIndex).show();
    }
    // Variables to track pagination state
    let mobileCurrentPage = 1;
    const mobileItemsPerPage = 10; // Number of items to show per page
    // Check the viewport width and show/hide elements based on screen size
    function updateLayout() {
      const desktopTableContainer = document.getElementById('desktopTableContainer');
      const mobileCardContainer = document.getElementById('mobileCardContainer');
      if (window.innerWidth < 1080 && window.innerHeight < 900) {
        desktopTableContainer.style.display = 'none';
        mobileCardContainer.classList.remove('d-none');
        // Initialize DataTable
        initializeDataTable();
        showMobileCards();
      } else {
        desktopTableContainer.style.display = 'block';
        mobileCardContainer.classList.add('d-none');
        // Destroy DataTable
        if ($.fn.DataTable.isDataTable('#myTable')) {
          $('#myTable').DataTable().destroy();
        }
      }
    }
    // Initial layout update on page load
    updateLayout();
    // Listen for window resize events and update layout accordingly
    window.addEventListener('resize', updateLayout);
    // Handle mobile pagination events
    $('#mobilePreviousPage').click(function(event) {
      event.preventDefault();
      if (!$(this).hasClass('disabled')) {
        mobileCurrentPage--;
        showMobileCards();
      }
    });
    $('#mobileNextPage').click(function(event) {
      event.preventDefault();
      if (!$(this).hasClass('disabled')) {
        mobileCurrentPage++;
        showMobileCards();
      }
    });
    // Attach click event listeners to each card
    const cards = document.querySelectorAll('#mobileCardContainer .card');
    cards.forEach(function(card) {
      card.addEventListener('click', handleCardClick);
    });
  </script>
  <script>
    // Function to handle box link click
    function handleBoxLinkClick(event) {
      event.preventDefault();
      // Add your logic here for the box link click event
      // For example:
      window.location.href = 'index.php?url=box';
    }
    // Function to handle add item link click
    function handleAddItemLinkClick(event) {
      event.preventDefault();
      // Add your logic here for the add item link click event
      // For example:
      alert("Add item link clicked");
    }
    // Function to handle mutasi link click
    function handleMutasiLinkClick(event) {
      event.preventDefault();
      // Add your logic here for the mutasi link click event
      // For example:
      alert("Mutasi link clicked");
    }
    // Attach click event listener to the edit links
    var editLinks = document.getElementsByClassName('edit-link');
    for (var i = 0; i < editLinks.length; i++) {
      editLinks[i].addEventListener('click', handleEditLinkClick);
    }
    // Function to handle edit link click
    function handleEditLinkClick(event) {
      event.preventDefault();
      // Get the id_product from the data-id attribute
      var idProduct = this.getAttribute('data-id');
      // Add your logic here for the edit link click event
      // For example:
      window.location.href = 'index.php?url=edit&idp=' + idProduct;
    }
    var boxDetail = document.getElementsByClassName('box-detail');
    for (var i = 0; i < boxDetail.length; i++) {
      boxDetail[i].addEventListener('click', handleBoxDetailClick);
    }
    // Function to handle edit link click
    function handleBoxDetailClick(event) {
      event.preventDefault();
      // Get the id_product from the data-id attribute
      var idBox = this.getAttribute('data-id');
      // Add your logic here for the edit link click event
      // For example:
      window.location.href = 'index.php?url=boxdetail&idb=' + idBox;
    }
    // Attach click event listeners to the links
    document.getElementById('boxLink').addEventListener('click', handleBoxLinkClick);
    document.getElementById('addItemLink').addEventListener('click', handleAddItemLinkClick);
    document.getElementById('mutasiLink').addEventListener('click', handleMutasiLinkClick);
    document.getElementById('detailBoxLink').addEventListener('click', handledetailBoxLinkClick);
  </script>
  <script>
    function toggleNama(index) {
      var nama = document.getElementById('nama' + index);
      var toggler = document.getElementById('toggler' + index);
      if (nama.textContent === nama.dataset.short) {
        nama.textContent = nama.dataset.full;
        toggler.textContent = '<';
      } else {
        nama.textContent = nama.dataset.short;
        toggler.textContent = '>';
      }
    }
    // Attach click event listener to the edit links
    var editLinks = document.getElementsByClassName('edit-link');
    for (var i = 0; i < editLinks.length; i++) {
      editLinks[i].addEventListener('click', handleEditLinkClick);
    }

    function handleEditLinkClick(event) {
      event.preventDefault();
      // Get the id_product from the data-id attribute
      var idProduct = this.getAttribute('data-id');
      var idProductDua = this.getAttribute('data-it');
      // Add your logic here for the edit link click event
      // For example:
      window.location.href = 'index.php?url=edit&idt=' + idProduct + '&idp=' + idProductDua;
    }
  </script>
  <script>
    // Ambil referensi ke elemen formulir dan input SKU
    const form = document.getElementById('myForm');
    const skuInput = document.getElementById('skuInput');
    // Fungsi untuk mendapatkan nilai dari parameter "url"
    function getUrlParameter(name) {
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)");
      var results = regex.exec(window.location.href);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
    // Fungsi untuk mengubah nilai action formulir berdasarkan input SKU dan "product" dari parameter "url"
    function updateFormAction(event) {
      event.preventDefault(); // Mencegah formulir submit secara default
      const skuValue = skuInput.value; // Mendapatkan nilai dari input SKU
      const productValue = getUrlParameter('url'); // Mendapatkan "product" dari parameter "url"
      // Buat URL sesuai dengan "product" dari parameter "url" dan SKU yang dimasukkan
      const newAction = `?url=${productValue}&sku=${skuValue}`;
      form.action = newAction;
      form.submit(); // Melakukan submit formulir dengan action baru
    }
    // Tambahkan event listener untuk submit pada formulir
    form.addEventListener('submit', updateFormAction);
  </script>
</body>

</html>