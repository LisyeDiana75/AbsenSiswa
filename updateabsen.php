<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['IDABSEN'];
$ket = $_POST['KETERANGAN'];
 
// update data ke database
mysqli_query($koneksi,"update absen set KETERANGAN='$ket' where IDABSEN='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:halamanadmin.php?page=absen");
 
?>