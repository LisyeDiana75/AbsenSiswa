<?php
include 'koneksi.php';

// Ambil data kelas untuk ditampilkan di form
$kelasQuery = "SELECT DISTINCT KELAS FROM siswa";
$kelasResult = $koneksi->query($kelasQuery);
// Ambil data user untuk ditampilkan di form
$userQuery = "SELECT ID, NAMAUSER FROM user";
$userResult = $koneksi->query($userQuery);
?>

<!DOCTYPE html>
<html>
<head>
   <style>

input[type=text],select{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=submit] {
  background-color: blue;
  color: white;
  padding: 15px 20px;
  border: none;
  border-radius:6px;
  cursor: pointer;
  
}

input[type=submit]:hover {
  background-color: #45a049;
}


/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
  }
  body{
    background-color: gray;
  }
 
/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit],select {
    width: 80%;
    margin-top: 0;
  }
}
table,body{
    color: aliceblue;
}
</style>


	<title>absen</title>
	<script>
    function fetchSiswaByKelas() {
        var KELAS = document.getElementById("KELAS").value;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_siswa.php?KELAS=" + KELAS, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("NAMA").innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
    
    </script>
   </head>
<body><center>

	<h3>INPUT ABSEN</h3>
    
	<form method="post" action="submit_absen.php" class="edit-button1">
		<table>
		<tr>
				<td>HARI</td>
				
				<td><input type="text" name="HARI" value="<?php $english_day = date('l');

// Mengubah nama hari ke bahasa Indonesia menggunakan switch case
switch ($english_day) {
    case 'Sunday':
        $indonesian_day = 'Minggu';
        break;
    case 'Monday':
        $indonesian_day = 'Senin';
        break;
    case 'Tuesday':
        $indonesian_day = 'Selasa';
        break;
    case 'Wednesday':
        $indonesian_day = 'Rabu';
        break;
    case 'Thursday':
        $indonesian_day = 'Kamis';
        break;
    case 'Friday':
        $indonesian_day = 'Jumat';
        break;
    case 'Saturday':
        $indonesian_day = 'Sabtu';
        break;
    default:
        $indonesian_day = 'Tidak diketahui';
} echo $indonesian_day;
?>">
</td>
			</tr>
            <tr>
				<td>TANGGAL</td>
				<td><input type="text" name="TANGGAL" 
				value="<?php $tgl = date('Y-m-d'); echo $tgl; ?>"></td>
			</tr>
       		<tr>			
				<td>NAMA PIKET</td>
				<td>
			<select name="ID" id="ID">
        	<?php
        	if ($userResult->num_rows > 0) {
            while($row = $userResult->fetch_assoc()) {
                echo "<option value='" . $row['ID'] . "'>" . $row['NAMAUSER'] . "</option>";
            	}
        	}
        	?>
   			</select></td>
			</tr>

			<tr>
			<td>KELAS</td>
			<td><select name="KELAS" id="KELAS" onchange="fetchSiswaByKelas()">
        <option value="">Pilih Kelas</option>
        <?php
        if ($kelasResult->num_rows > 0) {
            while($row = $kelasResult->fetch_assoc()) {
                echo "<option value='" . $row['KELAS'] . "'>" . $row['KELAS'] . "</option>";
            }
        }
        ?>
    </select>
			</td>
			</tr>
            
			<tr>
				<td>NAMA</td>
				<td><select name="IDSISWA" id="NAMA">
        <option value="">Pilih Nama Siswa</option>
        <!-- Nama siswa akan diisi oleh AJAX -->
    </select>
                </td>
			</tr>
           		
            
            <tr>
				<td>KETERANGAN</td>
				<td><select name="KETERANGAN">
                    <option value="Hadir">Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Ijin">Ijin</option>
                    <option value="Alpa">Alpa</option>
                  
                </select></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
    
	</center>
</body>
</html>