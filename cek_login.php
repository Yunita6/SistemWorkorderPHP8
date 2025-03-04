<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="manager"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "manager";
		// alihkan ke halaman dashboard manager
		header("location:manager/halaman_manager.php");

	}else if($data['level']=="operator"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level']= "operator";
		// alihkan ke halaman dashboard manager
		header("location:operator/halaman_operator.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

	
}else{
	header("location:index.php?pesan=gagal");
}



?>