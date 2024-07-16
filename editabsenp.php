<!DOCTYPE html>
<html>
<head>
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
  background-color: blue;
}

.container {
  border-radius: 5px;
  background-color: #45a049;
  padding: 40px;
  width:50%;
 
 
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
  
label {
    margin-top: 10px;
}

input[type="text"],
input[type="email"],
select,
textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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
	$data = mysqli_query($koneksi,"select * from absen where IDABSEN='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
<div class="container">	
<form action="updateabsenp.php" method="post">

<label for="ID">ID USER:</label>
    <input type="text" name="ID" id="ID" value="<?php echo $d['ID'];?>">
    <input type="hidden" name="IDABSEN" id="IDABSEN" value="<?php echo $d['IDABSEN'];?>">

    
    <label for="KETERANGAN">Keterangan:</label>
    <select name="KETERANGAN">
                    <option value="Hadir">Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Ijin">Ijin</option>
                    <option value="Alpa">Alpa</option>
                  
                </select><br><br>
    
    <input type="submit" value="Submit">
</form>
</div>	
<?php
 } ?>
 </center>
</body>
</html>

