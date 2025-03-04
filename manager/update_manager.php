<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$newID = $_POST['id_workorder'];
$nproduk = $_POST['nproduk'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$status = $_POST['status'];
 
// update data ke database
mysqli_query($koneksi,"update workorder set nproduk='$nproduk', jumlah='$jumlah', tanggal='$tanggal' , status='$status' where id_workorder='$newID'");
 
// mengalihkan halaman kembali ke index.php
header("location:./halaman_manager.php");
 
?>