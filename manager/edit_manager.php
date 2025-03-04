<?php 
include '../koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Workorder</title>
    <link rel="shortcut icon" href="../work-order.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
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
<div class="container mt-4">
    <h2 class="text-center text-primary fw-bold">Manajemen Workorder</h2>
    <hr>
    <!-- Tombol Navigasi -->
    <div class="d-flex justify-content-between mb-3">
        <a href="./halaman_manager.php" class="btn btn-secondary">⬅ Kembali</a>
        
    </div>

    <?php
    $id = $_GET['id_workorder'];
    $data = mysqli_query($koneksi, "SELECT * FROM workorder WHERE id_workorder='$id'");
    while ($d = mysqli_fetch_array($data)) {
    ?>

    <div class="card shadow p-4">
        <form method="post" action="./update_manager.php">
            <div class="mb-3">
                <label class="form-label fw-bold">ID Workorder</label>
                <input type="text" name="id_workorder" class="form-control" value="<?php echo $d['id_workorder']; ?>" readonly required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Nama Produk</label>
                <input type="text" name="nproduk" class="form-control" value="<?php echo $d['nproduk']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" value="<?php echo $d['jumlah']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="<?php echo $d['tanggal']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-select">
                    <option value="">-- Pilih Status --</option>
                    <option value="Pending" <?php echo ($d['status'] == "Pending") ? "selected" : ""; ?>>Pending</option>
                    <option value="In Progress" <?php echo ($d['status'] == "In Progress") ? "selected" : ""; ?>>In Progress</option>
                    <option value="Completed" <?php echo ($d['status'] == "Completed") ? "selected" : ""; ?>>Completed</option>
                    <option value="Canceled" <?php echo ($d['status'] == "Canceled") ? "selected" : ""; ?>>Canceled</option>
                </select>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success px-4">✅ Simpan</button>
            </div>
        </form>
    </div>

    <?php 
    }
    ?>
</div>
</body>
</html>
