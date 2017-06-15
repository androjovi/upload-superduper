<?php
date_default_timezone_set("Asia/Jakarta");
$koneksi=mysqli_connect("localhost","joviandro","andro","90001");
if (!$koneksi){
  echo "Gagal tersambung ke database <br>";
  echo "Detail error :". mysqli_error($koneksi)."<br>";
  echo "Nomor error : ".mysqli_errno($koneksi)."<br>";
  die();
}
 ?>
