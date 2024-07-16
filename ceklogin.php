<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['USERNAME'];
$password = $_POST['PASSWORD'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where USERNAME='$username' and PASSWORD='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
		// cek jika user login sebagai admin
	if($data['LEVEL']=="admin"){
 
		// buat session login dan username
		$_SESSION['USERNAME'] = $username;
		$_SESSION['LEVEL'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:halamanadmin.php");
 
	// cek jika user login sebagai siswa
	}else if($data['LEVEL']=="piket"){
		// buat session login dan username
		$_SESSION['USERNAME'] = $username;
		$_SESSION['LEVEL'] = "piket";
		// alihkan ke halaman dashboard pegawai
		header("location:halamanpiket.php");
 
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>