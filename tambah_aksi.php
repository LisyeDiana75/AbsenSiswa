<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form

$nis = $_POST['NIS'];
$nama = $_POST['NAMA'];
$kelas = $_POST['KELAS'];
 
// menginput data ke database
$sql = "SELECT MAX(IDSISWA) AS max_id FROM siswa";
    $result = $koneksi->query($sql);
    $row = $result->fetch_assoc();
    $new_idsiswa = $row['max_id'] + 1;

mysqli_query($koneksi,"insert into siswa (IDSISWA,NIS,NAMA,KELAS) values ('$new_idsiswa','$nis','$nama','$kelas')");
 
// mengalihkan halaman kembali ke index.php
header("Location:halamanadmin.php?page=siswa");
 
?>