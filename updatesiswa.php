<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['IDSISWA'];
$nis = $_POST['NIS'];
$nama = $_POST['NAMA'];
$kelas = $_POST['KELAS'];
 
// update data ke database
mysqli_query($koneksi,"update siswa set NAMA='$nama', NIS='$nis',KELAS='$kelas' where IDSISWA='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:halamanadmin.php?page=siswa");
 
?>