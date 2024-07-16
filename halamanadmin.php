<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="cssadmin.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="halamanadmin.php">Home</a></li>
                <li><a href="halamanadmin.php?page=siswa">Data Siswa</a></li>
                <li><a href="halamanadmin.php?page=absen">Data Absen</a></li>
                <li><a href="halamanadmin.php?page=laporan">Laporan</a></li>
                <li><a href="Logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
           <?php 
       
            $page = @$_GET['page'];
 
            switch ($page) {
                case '':
                    include "home.php";
                    break;
                case 'siswa':
                    include "datasiswa.php";
                    break;
                case "tambahsiswa":
                    include "tambahsiswa.php";     
                break; 
                case 'editsiswa':
                    include "editsiswa.php";
                    break;
                case 'absen':
                    include "dataabsen.php";
                    break;
                case "tambahabsen":
                    include "tambahabsen.php";     
                    break; 
                case 'editabsen':
                    include "editabsen.php";
                    break;
                case 'laporan':
                    include "laporan.php";
                    break;
                case 'prolaporan':
                    include "proseslaporan.php";
                    break;
            }
     
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Magang Industri</p>
    </footer>
</body>
</html>
