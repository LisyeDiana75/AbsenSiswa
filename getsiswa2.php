<?php
include 'koneksi.php';

if (isset($_GET['KELAS'])) {
    $kelas = $_GET['KELAS'];
    $siswaQuery = "SELECT IDSISWA, NAMA FROM siswa WHERE KELAS = ?";
    $stmt = $koneksi->prepare($siswaQuery);
    $stmt->bind_param("s", $kelas);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['IDSISWA'] . "'>" . $row['NAMA'] . "</option>";
    }

    $stmt->close();
}

$koneksi->close();
?>
