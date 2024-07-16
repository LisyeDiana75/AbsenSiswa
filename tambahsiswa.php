<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

input[type=text],select{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  color: aliceblue;
}

input[type=submit] {
  background-color: #5657578e;
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
  
  padding: 40px;
  width:40%;
 
}

.col-25 {
  float: left;
  width: 30%;
  margin-top: 6px;
  text-align: left;
}

.col-75 {
  float: left;
  width: 40%;
  margin-top: 6px;
  text-align: left;
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
</style>
</head>
<body>
<center>
<h2 style="color:white">INPUT DATA SISWA</h2>

<div class="container">
  <form action="tambah_aksi.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="NIS">NIS</label>
      </div>
      <div class="col-75">
        <input type="text" id="NIS" name="NIS" placeholder="NIS...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="NAMA">Nama Siswa</label>
      </div>
      <div class="col-75">
        <input type="text" id="NAMA" name="NAMA" placeholder="Nama Siswa..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="KELAS">KELAS</label>
      </div>
      <div class="col-75">
        <select name="KELAS" id="KELAS">
        <option value="">---Pilih Kelas---</option>
          <option value="X PPLG 1">X PPLG 1</option>
          <option value="X PPLG 2">X PPLG 2</option>
          <option value="X PPLG 3">X PPLG 3</option>
          <option value="X PPLG 4">X PPLG 4</option>
        </select>
      </div>
    </div>
  <br>
    <div class="row">
      <input type="submit" value="SIMPAN">
    </div>
  </form>
</div>
</center>
</body>
</html>
