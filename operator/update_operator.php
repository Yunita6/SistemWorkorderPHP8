<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$newID = $_POST['id_workorder'];
$nproduk = $_POST['nproduk'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$status = $_POST['status'];
$jwaktu = $_POST['jwaktu'];
$keterangan = $_POST['keterangan'];
 
// update data ke database
mysqli_query($koneksi,"update workorder set nproduk='$nproduk', jumlah='$jumlah', tanggal='$tanggal' , status='$status', jwaktu='$jwaktu', keterangan='$keterangan' where id_workorder='$newID'");
 
// mengalihkan halaman kembali ke index.php
header("location:./halaman_operator.php");
 
?>