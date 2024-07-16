<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laporan</title>
    <style>
        @media print {
            .print-button {
                display: none;
                         
            }
        }

        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  color: black;
}

th {
  border: 1px solid black;
  text-align: center;
  padding: 8px;
  
}
td {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}

.dasar {
    background-image: url('Logo_smk.png');
    background-position: center; /* Pusatkan gambar */ 
  background-repeat: no-repeat; /* Jangan ulangi gambar */ 
  background-size:500px 500px;
  background-attachment: fixed;
  
  }
h2{
    text-align: center;
}
.button-link {
    display: inline-block; /* Untuk membuat elemen inline seperti tombol */
    background-color: #007BFF; /* Warna biru */
    color: white; /* Warna teks putih */
    text-decoration: none; /* Menghilangkan garis bawah pada link */
    padding: 10px 20px; /* Padding tombol */
    font-size: 16px; /* Ukuran font */
    cursor: pointer; /* Kursor pointer saat hover */
    border-radius: 5px; /* Sudut tombol yang melengkung */
    transition: background-color 0.3s; /* Animasi transisi untuk background-color */
}
</style>
</head>
<body class="dasar">


<?php
include 'koneksi.php';

$bulan = $_GET['bulan'] ?? '';
$tahun = $_GET['tahun'] ?? '';
$kelas = $_GET['KELAS'] ?? '';

if (!empty($bulan) && !empty($tahun) && !empty($kelas)) {
    $bulan = $koneksi->real_escape_string($bulan);
    $tahun = $koneksi->real_escape_string($tahun);
    $kelas = $koneksi->real_escape_string($kelas);
    $no = 1; 
    // Query untuk mendapatkan laporan absen berdasarkan bulan dan kelas tertentu
    $sql = "SELECT siswa.IDSISWA, siswa.NIS, siswa.NAMA, siswa.KELAS,
                   SUM(CASE WHEN absen.KETERANGAN = 'Hadir' THEN 1 ELSE 0 END) AS jumlah_hadir,
                   SUM(CASE WHEN absen.KETERANGAN = 'Sakit' THEN 1 ELSE 0 END) AS jumlah_sakit,
                   SUM(CASE WHEN absen.KETERANGAN = 'Ijin' THEN 1 ELSE 0 END) AS jumlah_ijin,
                   SUM(CASE WHEN absen.KETERANGAN = 'Alpa' THEN 1 ELSE 0 END) AS jumlah_alpa
            FROM absen
            INNER JOIN siswa ON absen.IDSISWA = siswa.IDSISWA
            WHERE MONTH(absen.TANGGAL) = '$bulan' AND YEAR(absen.TANGGAL) = '$tahun' AND siswa.KELAS = '$kelas'
            GROUP BY siswa.IDSISWA, siswa.NIS, siswa.NAMA, siswa.KELAS
            ORDER BY siswa.NAMA";

    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
    
        echo "<h2>Laporan Absen Kelas $kelas Bulan $bulan Tahun $tahun</h2>";
        echo "<table border='1'>
                <tr>
                    <th>NO</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jumlah Hadir</th>
                    <th>Jumlah Sakit</th>
                    <th>Jumlah Ijin</th>
                    <th>Jumlah Alpa</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $row["NIS"] . "</td>
                    <td>" . $row["NAMA"] . "</td>
                    <td>" . $row["KELAS"] . "</td>
                    <td><center>" . $row["jumlah_hadir"] . "</center></td>
                    <td><center>" . $row["jumlah_sakit"] . "</center></td>
                    <td><center>" . $row["jumlah_ijin"] . "</center></td>
                    <td><center>" . $row["jumlah_alpa"] . "</center></td>
                  </tr>";
        }
        echo "</table><br>";
    ?>
        <button class="print-button" onclick="window.print()">Print Laporan</button>
   <?php
    } else {
        echo "No results found for the selected month, year, and class.";
    }
} else {
    echo "Please select month, year, and class.";
}


$koneksi->close();
?>
<br><br><a class="print-button" href="halamanadmin.php">back</a>
 
</body>
</html>