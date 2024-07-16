<?php
include "koneksi.php";
$kary = mysqli_fetch_array(mysqli_query($koneksi, "select IDUSER from user where NAMAUSER='$_GET[NAMAUSER]'"));
$data = array('IDUSER'   	=>  $kary['IDUSER']);
              		
 echo json_encode($data);
 ?>