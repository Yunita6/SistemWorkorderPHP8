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

    <!-- Bootstrap 5 -->
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
            max-width: 600px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background: #ffffff;
        }
        .btn-custom {
            width: 100%;
            font-size: 16px;
            padding: 10px;
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
    <h2 class="text-center text-dark fw-bold">✏️ Edit Workorder</h2>
    <hr>
	<div class="d-flex justify-content-between mb-3">
        <a href="./halaman_operator.php" class="btn btn-secondary">⬅ Kembali</a>
        
    </div>
    <div class="card p-4">
        <?php
        $id = $_GET['id_workorder'];
        $data = mysqli_query($koneksi, "SELECT * FROM workorder WHERE id_workorder='$id'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        
        <form method="post" action="./update_operator.php">
            <div class="mb-3">
                <label class="form-label"><strong>ID Workorder</strong></label>
                <input type="text" class="form-control" name="id_workorder" value="<?php echo $d['id_workorder']; ?>" readonly required>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Nama Produk</strong></label>
                <input type="text" class="form-control" name="nproduk" value="<?php echo $d['nproduk']; ?>" readonly required>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Jumlah</strong></label>
                <input type="number" class="form-control" name="jumlah" value="<?php echo $d['jumlah']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Tanggal</strong></label>
                <input type="date" class="form-control" name="tanggal" value="<?php echo $d['tanggal']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Status</strong></label>
                <select name="status" class="form-select">
                    <option value="">-- Pilih Status --</option>
                    <option value="Pending" <?php echo ($d['status'] == "Pending") ? "selected" : ""; ?>>Pending</option>
                    <option value="In Progress" <?php echo ($d['status'] == "In Progress") ? "selected" : ""; ?>>In Progress</option>
                    <option value="Completed" <?php echo ($d['status'] == "Completed") ? "selected" : ""; ?>>Completed</option>
                    <option value="Canceled" <?php echo ($d['status'] == "Canceled") ? "selected" : ""; ?>>Canceled</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Jangka Waktu</strong></label>
                <input type="text" class="form-control" name="jwaktu" value="<?php echo $d['jwaktu']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Keterangan</strong></label>
                <textarea class="form-control" name="keterangan" required><?php echo $d['keterangan']; ?></textarea>
            </div>

            <button type="submit" class="btn btn-success btn-custom">
                <i class="fas fa-save"></i> Simpan 
            </button>
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>
