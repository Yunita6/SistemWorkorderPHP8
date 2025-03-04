<?php 
include '../koneksi.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Workorder</title>
	<link rel="shortcut icon" href="../work-order.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="shortcut icon" href="work-order.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../work-order.png" type="image/x-icon">
    <style>
        .navbar-brand {
            font-weight: bold;
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
<div class="container mt-4">
    <h2 class="text-center text-primary fw-bold">Sistem WorkOrder Manager</h2>

    <!-- Form Pencarian -->
    <form action="./halaman_manager.php" method="get" class="row g-3 align-items-center">
        <div class="col-md-3">
            <label for="cari" class="form-label fw-semibold">Pilih Status:</label>
            <select name="cari" id="cari" class="form-select">
                <option value="">-- Semua Status --</option>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
                <option value="Canceled">Canceled</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Cari</button>
        </div>
    </form>

    <hr>
    <?php 
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        echo "<h5 class='text-success'>Hasil Pencarian: <strong>" . $cari . "</strong></h5>";
    }
    ?>

    <!-- Tombol Aksi -->
    <div class="mb-3">
        <a href="./tambah.php" class="btn btn-success">+ TAMBAH Data</a>
        <a href="../laporan/rekapitulasi.php" class="btn btn-info">Download Lap Rekapitulasi</a>
        <a href="../laporan/lap_operator.php" class="btn btn-warning">Download Lap Operator</a>
    </div>

    <!-- Tabel WorkOrder -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID Workorder</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $query = "SELECT * FROM workorder WHERE status LIKE '%".$cari."%'";
                } else {
                    $query = "SELECT * FROM workorder where tanggal order by tanggal desc";
                }

                $data = mysqli_query($koneksi, $query);
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $d['id_workorder']; ?></td>
                    <td><?php echo $d['nproduk']; ?></td>
                    <td><?php echo $d['jumlah']; ?></td>
                    <td><?php echo $d['tanggal']; ?></td>
                    <td>
                        <span class="badge bg-<?php 
                            echo ($d['status'] == 'Completed') ? 'success' : 
                                 (($d['status'] == 'In Progress') ? 'primary' : 
                                 (($d['status'] == 'Pending') ? 'warning' : 'danger'));
                        ?>">
                            <?php echo $d['status']; ?>
                        </span>
                    </td>
                    <td>
                        <a href="edit_manager.php?id_workorder=<?php echo $d['id_workorder']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="view_manager.php?id_workorder=<?php echo $d['id_workorder']; ?>" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>