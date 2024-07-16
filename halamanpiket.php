<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Index</title>
    <link rel="stylesheet" href="adminp.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                
                <li><a href="halamanpiket.php?page=absen">Absen</a></li>
                <li><a href="halamanpiket.php?page=dataabsen">Data Absen</a></li>
                <li><a href="Logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
              
        <?php 
       
            $page = @$_GET['page'];
 
            switch ($page) {
                case 'home':
                    include "home.php";
                    break;
                case 'dataabsen':
                    include "dataabsenp.php";
                    break;
                case 'absen':
                    include "tambahabsenp.php";
                    break;
                case 'editabsen':
                        include "editabsenp.php";
                        break;    
                }
                ?>
       
    </main>
    <footer>
        <p>&copy; 2024 Magang Industri</p>
    </footer>
</body>
</html>
