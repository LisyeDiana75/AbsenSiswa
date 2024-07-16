<!DOCTYPE html>
<html>
<head>
	<title>absen</title>
	<style>input[type=text]{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #45a049;
  padding: 40px;
  width:100%;
 
 
}

.col-25 {
  float: left;
  width: 50%;
  margin-top: 6px;
  text-align: left;
}

.col-75 {
  float: left;
  width: 80%;
  margin-top: 6px;
  text-align: left;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
  }
 
/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 80%;
    margin-top: 0;
  }
}</style>
</head>
<body><center>
 	
	<h3>EDIT DATA SISWA</h3>
 
	<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from siswa where IDSISWA='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="updatesiswa.php">
			<table>
				<tr>			
					<td>NIS</td>
					<td>
						<input type="hidden" name="IDSISWA" value="<?php echo $d['IDSISWA']; ?>">
						<input type="text" name="NIS" value="<?php echo $d['NIS']; ?>">		
                        
					</td>
				</tr>
				<tr>
					<td>NAMA</td>
					<td><input type="text" name="NAMA" value="<?php echo $d['NAMA']; ?>"></td>
                	</tr>
				
				<tr>
					<td>KELAS</td>
					<td><input type="text" name="KELAS" value="<?php echo $d['KELAS']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN"></td>
				</tr>		
			</table>
		</form>
		<?php 
	}
	?>
 </center>
</body>
</html>