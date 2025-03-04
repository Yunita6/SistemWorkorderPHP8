<?php 
include '../koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workorder</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="../work-order.png" type="image/x-icon">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background: #ffffff;
        }
        .badge {
            font-size: 14px;
            padding: 8px 12px;
            border-radius: 12px;
        }
    </style>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="fas fa-tasks"></i> Sistem WorkOrder</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-light text-primary px-3 me-2" href="./halaman_operator.php">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white px-3" href="../logout.php">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mt-5">
    <h2 class="text-center text-dark fw-bold">📋 Detail Workorder</h2>
    <hr>

    <div class="card p-4">
        <?php
        $id = $_GET['id_workorder'];
        $data = mysqli_query($koneksi, "SELECT * FROM workorder WHERE id_workorder='$id'");
        while ($d = mysqli_fetch_array($data)) {
            // Badge warna berdasarkan status
            $statusColor = "";
            switch ($d['status']) {
                case "Pending": $statusColor = "warning"; break;
                case "In Progress": $statusColor = "primary"; break;
                case "Completed": $statusColor = "success"; break;
                case "Canceled": $statusColor = "danger"; break;
            }
        ?>
        
        <form method="post" action="./update_manager.php">
            <table class="table table-borderless">
                <tr>
                    <td><strong>ID Workorder</strong></td>
                    <td>: <?php echo $d['id_workorder']; ?></td>
                </tr>
                <tr>			
                    <td><strong>Nama Produk</strong></td>
                    <td>: <?php echo $d['nproduk']; ?></td>
                </tr>
                <tr>
                    <td><strong>Jumlah</strong></td>
                    <td>: <?php echo $d['jumlah']; ?></td>
                </tr>
                <tr>
                    <td><strong>Tanggal</strong></td>
                    <td>: <?php echo date("d-m-Y", strtotime($d['tanggal'])); ?></td>
                </tr>
                <tr>
                    <td><strong>Status</strong></td>
                    <td>: <span class="badge bg-<?php echo $statusColor; ?>"><?php echo $d['status']; ?></span></td>
                </tr>
                <tr>
                    <td><strong>Jangka Waktu</strong></td>
                    <td>: <?php echo $d['jwaktu']; ?></td>
                </tr>
                <tr>
                    <td><strong>Keterangan</strong></td>
                    <td>: <?php echo $d['keterangan']; ?></td>
                </tr>
            </table>
            <div class="d-flex justify-content-between">
                <a href="halaman_operator.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>
