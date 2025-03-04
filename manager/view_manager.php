<?php 
include '../koneksi.php'; 

$id = $_GET['id_workorder'];
$data = mysqli_query($koneksi, "SELECT * FROM workorder WHERE id_workorder='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Workorder</title>
    <link rel="shortcut icon" href="../work-order.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 700px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background: #ffffff;
            color: #333;
        }
        .btn-custom {
            background-color: #ffc107;
            color: #000;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #ff9800;
            color: white;
        }
        .table th {
            width: 40%;
            background-color: #f8f9fa;
        }
        .table td {
            font-weight: 500;
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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Sistem WorkOrder</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white px-3" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h2 class="text-center text-dark fw-bold">Detail Workorder</h2>
    <hr>

    <div class="d-flex justify-content-between mb-3">
        <a href="./halaman_manager.php" class="btn btn-secondary">⬅ Kembali</a>
    </div>

    <div class="card p-4">
        <h4 class="text-center">Informasi Workorder</h4>
        <table class="table table-striped">
            <tr>
                <th>ID Workorder</th>
                <td><?php echo $d['id_workorder']; ?></td>
            </tr>
            <tr>
                <th>Nama Produk</th>
                <td><?php echo $d['nproduk']; ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td><?php echo $d['jumlah']; ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?php echo date("d-m-Y", strtotime($d['tanggal'])); ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <?php
                        $statusColor = "";
                        switch ($d['status']) {
                            case "Pending": $statusColor = "warning"; break;
                            case "In Progress": $statusColor = "primary"; break;
                            case "Completed": $statusColor = "success"; break;
                            case "Canceled": $statusColor = "danger"; break;
                        }
                    ?>
                    <span class="badge bg-<?php echo $statusColor; ?>">
                        <?php echo $d['status']; ?>
                    </span>
                </td>
            </tr>
        </table>

        
    </div>
</div>

</body>
</html>
