<?php

include 'koneksi.php';

$id = $_POST['ID'];
$kelas = $_POST['KELAS'];
$idsiswa = $_POST['IDSISWA'];
$hari = $_POST['HARI'];
$tgl = $_POST['TANGGAL'];
$ket = $_POST['KETERANGAN'];

if (!empty($idsiswa) && !empty($tgl) && !empty($hari) && !empty($ket)) {
    $sql = "SELECT MAX(IDABSEN) AS max_id FROM absen";
    $result = $koneksi->query($sql);
    $row = $result->fetch_assoc();
    $new_idabsen = $row['max_id'] + 1;

    $sql = "INSERT INTO absen (IDABSEN,ID,IDSISWA,KELAS, HARI, TANGGAL, KETERANGAN) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("iiissss", $new_idabsen,$id,$idsiswa,$kelas,$hari, $tgl, $ket);

    if ($stmt->execute() === TRUE) {
        header("Location:halamanpiket.php?page=dataabsen");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Lengkapi semua data!";
}

$koneksi->close();
?>
