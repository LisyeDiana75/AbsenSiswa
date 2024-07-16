<!DOCTYPE html>
<html>
<head>
	<title>datasiswa</title>
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  background-color:grey;
  color: aliceblue;
}

th {
  border: 1px solid black;
  text-align: center;
  padding: 8px;
  background-color: darkolivegreen;
}
td {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}

.link{
        font-size: 15pt;
}
.link:hover{
	color: red;
}
.link:link{
	color: blue;
}
.link:active{
	color: green;
}
.edit-button {
    background-color: #007BFF; /* Warna biru */
    color: white; /* Warna teks putih */
    border: none; /* Tanpa border */
    padding: 10px 20px; /* Padding tombol */
    font-size: 16px; /* Ukuran font */
    cursor: pointer; /* Kursor pointer saat hover */
    border-radius: 5px; /* Sudut tombol yang melengkung */
    transition: background-color 0.3s; /* Animasi transisi untuk background-color */
}

.edit-button:hover {
    background-color: #0056b3; /* Warna biru lebih gelap saat hover */
}
.edit-button1 {
    background-color: #FF6347; /* Warna biru */
    color: white; /* Warna teks putih */
    border: none; /* Tanpa border */
    padding: 10px 20px; /* Padding tombol */
    font-size: 16px; /* Ukuran font */
    cursor: pointer; /* Kursor pointer saat hover */
    border-radius: 5px; /* Sudut tombol yang melengkung */
    transition: background-color 0.3s; /* Animasi transisi untuk background-color */
}

.edit-button1:hover {
    background-color: red; /* Warna biru lebih gelap saat hover */
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

.button-link:hover {
    background-color: #0056b3; /* Warna biru lebih gelap saat hover */
}
.container {
    display: flex;
    justify-content: flex-end; /* Menyimpan elemen di kanan */
    padding: 10px;
}
</style>
</head>
<body>
	<h2>DATA SISWA</h2>
<div class="container">
	<a href="halamanadmin.php?page=tambahsiswa" class="button-link">+ Tambah Siswa</a>
	</div>
	<table>
		<tr>
			<th>No</th>
			<th>NIS</th>
			<th>NAMA</th>
			<th>KELAS</th>
			<th>OPSI</th>
		</tr>
		<?php 
		
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from siswa");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td class="tengah"><?php echo $no++; ?></td>
				<td><?php echo $d['NIS']; ?></td>
				<td><?php echo $d['NAMA']; ?></td>
				<td><?php echo $d['KELAS']; ?></td>
				<td>
					<a class="edit-button" href="halamanadmin.php?page=editsiswa&id=<?php echo $d['IDSISWA']; ?>">EDIT |</a>
					<a class="edit-button1" href="hapussiswa.php?id=<?php echo $d['IDSISWA']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	
 
</body>
</html>