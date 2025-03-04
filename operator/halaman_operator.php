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

    <!-- Bootstrap CSS -->
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
            max-width: 1100px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background: #ffffff;
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
            background-color: #007bff;
            color: white;
            text-align: center;
        }
        .table td {
            vertical-align: middle;
            text-align: center;
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
    <h2 class="text-center text-dark fw-bold">📋 Workorder Operator</h2>
    <hr>

    <div class="d-flex justify-content-between mb-3">
        <a href="../laporan/lap_operator.php" class="btn btn-success"><i class="fas fa-download"></i> Download Lap Operator</a>
    </div>

    <div class="card p-4">
        <h4 class="text-center">📌 Daftar Workorder</h4>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID Workorder</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Jangka Waktu</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $data = mysqli_query($koneksi, "SELECT * FROM workorder");
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
                    <tr>
                        <td><?php echo $d['id_workorder']; ?></td>
                        <td><?php echo $d['nproduk']; ?></td>
                        <td><?php echo $d['jumlah']; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($d['tanggal'])); ?></td>
                        <td><span class="badge bg-<?php echo $statusColor; ?>"><?php echo $d['status']; ?></span></td>
                        <td><?php echo $d['jwaktu']; ?></td>
                        <td><?php echo $d['keterangan']; ?></td>
                        <td>
                            <a href="edit_operator.php?id_workorder=<?php echo $d['id_workorder']; ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="view_operator.php?id_workorder=<?php echo $d['id_workorder']; ?>" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>
