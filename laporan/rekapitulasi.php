<?php
// panggil file "database.php" untuk koneksi ke database
include "../koneksi.php";

// fungsi header untuk mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
// mendefinisikan nama file hasil ekspor "Data-Member.xls"
header("Content-Disposition: attachment; filename=Laporan Rekapitulasi Workorder.xls");
?>
<!-- halaman HTML yang akan diexport ke excel -->
<!-- judul tabel -->
<center>
  <h2>Laporan Rekapitulasi Workorder</h2>
</center>
<!-- tabel untuk menampilkan data dari database -->
<table border="1">
  <thead>
    <tr style="background-color:#31316a;color:#fff">
      <th height="30" align="center" vertical="center">No.</th>
      <th height="30" align="center" vertical="center">ID Workorder</th>
      <th height="30" align="center" vertical="center">Nama Produk</th>
      <th height="30" align="center" vertical="center">Jumlah</th>
      <th height="30" align="center" vertical="center">Tanggal</th>
      <th height="30" align="center" vertical="center">Status</th>
      <th height="30" align="center" vertical="center">Jangka Waktu</th>
      <th height="30" align="center" vertical="center">Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // variabel untuk nomor urut tabel 
    $no = 1;
    // sql statement untuk menampilkan data dari tabel 
    $query = mysqli_query($koneksi, "SELECT * FROM workorder;
")
    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    while ($data = mysqli_fetch_assoc($query)) { ?>
      <!-- tampilkan data -->
      <tr>
        <td width="50" align="center"><?= $no++; ?></td>
        <td width="130" align="center"><?= $data['id_workorder']; ?></td>
        <td width="120" align="center"><?= $data['nproduk']; ?></td>
        <td width="130" align="center"><?= $data['jumlah']; ?></td>        
        <td width="120" align="center"><?= $data['tanggal']; ?></td>
        <td width="240"><?= $data['status']; ?></td>
        <td width="120" align="center"><?= $data['jwaktu']; ?></td>
        <td width="250"><?= $data['keterangan']; ?></td>
      </tr>
    <?php } ?>

    <?php
$totalQuery = mysqli_query($koneksi, "SELECT SUM(jumlah) AS total_jumlah FROM workorder");
$totalData = mysqli_fetch_assoc($totalQuery);

echo "<tr>
    <td colspan='3'><strong>Total Jumlah</strong></td>
    <td><strong>{$totalData['total_jumlah']}</strong></td>
    
</tr>";
?>


  </tbody>
</table>

<br><br>



<?php
include '../koneksi.php'; // Pastikan koneksi ke database

// Query untuk menghitung jumlah workorder berdasarkan status dan menampilkan nama produk
$query = "SELECT nproduk AS `Nama Produk`, status AS `Status`, COUNT(*) AS `Total` 
          FROM workorder 
          GROUP BY nproduk, status";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<table border='1'>
        <tr style="background-color:#31316a;color:#fff">
            <th>Nama Produk</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
        <?php while ($data = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $data['Nama Produk']; ?></td>
                <td><?php echo $data['Status']; ?></td>
                <td><?php echo $data['Total']; ?></td>
            </tr>
        <?php } ?>
    </table>

           

<br><br>
<div style="text-align: right">Semarang, <?php setlocale(LC_TIME, 'id_ID.utf8'); // Untuk server Linux
echo strftime("%d %B %Y"); ?></div>