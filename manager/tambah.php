<?php 
include '../koneksi.php'; 

function generateWOID($koneksi) {
    $datePart = date("Ymd");
    $query = "SELECT id_workorder FROM workorder WHERE id_workorder LIKE 'WO-$datePart-%' ORDER BY id_workorder DESC LIMIT 1";
    $result = $koneksi->query($query);

    if (!$result) {
        die("Error pada query: " . $koneksi->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastID = isset($row['id_workorder']) ? $row['id_workorder'] : "WO-$datePart-0000";
        $lastNumber = (int)substr($lastID, -4);
        $newNumber = str_pad($lastNumber + 1, 4, "0", STR_PAD_LEFT);
    } else {
        $newNumber = "0001";
    }

    return "WO-" . $datePart . "-" . $newNumber;
}
$newID = generateWOID($koneksi);
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
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 700px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
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
    <h2 class="text-center text-primary fw-bold">Manajemen Workorder</h2>
    <hr>

    <div class="d-flex justify-content-between mb-3">
        <a href="./halaman_manager.php" class="btn btn-secondary">⬅ Kembali</a>
    </div>

    <div class="card p-4">
        <h4 class="text-center text-dark">Tambah Workorder</h4>
        <form method="post" action="./tambah_aksi.php" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="mb-3">
                <label class="form-label fw-bold">ID Workorder</label>
                <input type="text" name="id_workorder" class="form-control" value="<?php echo $newID; ?>" readonly required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Nama Produk</label>
                <input type="text" name="nproduk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-select">
                    <option value="">-- Pilih Status --</option>
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                    <option value="Canceled">Canceled</option>
                </select>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-custom px-4">✅ Simpan</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
