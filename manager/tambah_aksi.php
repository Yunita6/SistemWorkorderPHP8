<?php 

// menghubungkan koneksi database
include '../koneksi.php';
 
// menangkap data dari form
$newID = $_POST['id_workorder'];
$nproduk = $_POST['nproduk'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$status = $_POST['status'];
 
// menginput data ke table barang
 
mysqli_query($koneksi,"INSERT INTO workorder (id_workorder,nproduk,jumlah,tanggal,status) VALUES ('$newID', '$nproduk', '$jumlah','$tanggal', '$status')")or die(mysqli_error($koneksi));
 
// mengalihkan halaman kembali ke index.php
header("location:./halaman_manager.php");
?>