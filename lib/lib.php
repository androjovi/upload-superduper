<?php
date_default_timezone_set("Asia/Jakarta");
session_start();
function cekSesi($query_string){
  if (!isset($_SESSION['username'])){
    header("location:$query_string");
  }
}
function ico(){
  echo '<img alt="Brand" src="img/header-ico.png" class="header-ico" style="
      width: 50px;
      height: 50px;
    ">';
}
function mobileFirst(){
  //Tambahkan versi mobile jika ingin, dan tanggung akibatnya
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
  //Versi tidak bisa di zoom samskel
  echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">';
}
function getDateTime(){
  $hariindo=array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
  $hari=date('w');
  $bulan=date('m');
  $tahun=date('Y');
  $lengkap=date('r');
  $time=time();
  echo "$hariindo[$hari],$tahun-$hari-$bulan | $lengkap | $time";
}
function css($href){
  echo "<link rel='stylesheet' type='text/css' href='$href'>";
}
function loginCek($username,$password){
  include 'koneksi/koneksi.php';
  $getTableUser=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
  if (mysqli_num_rows($getTableUser) > 0){
    session_start();
    $_SESSION['username']=$username;
    header("location:home.php?nm={$username}");
  }else{
    echo "username atau password salah";
  }
}
function delSession(){
  if (isset($_SESSION['username'])){
    unset($_SESSION);
    session_destroy();
    header("location:index.php");
  }else{
    echo "gagal logout";
  }
}
function delProject($id){
  include '../koneksi/koneksi.php';
  $deleteProject=mysqli_query($koneksi,"DELETE FROM tb_project WHERE noindex='$id'");
  if ($deleteProject){
    $getTable=mysqli_query($koneksi,"SELECT jumlah FROM tb_user WHERE username='{$_SESSION['username']}'");
    $getValue=mysqli_fetch_assoc($getTable);
    $get=$getValue['jumlah'];
    $kurangi=--$get;
    $updateTable=mysqli_query($koneksi,"UPDATE tb_user SET jumlah='$kurangi' WHERE username='{$_SESSION['username']}'");
    if ($updateTable){
      header("location:../home.php?nm={$_SESSION['username']}");
    }
  }else{
    echo "Penghapusan project gagal";
    echo mysqli_error($koneksi);
  }
}
function dateDiff($tgl1,$tgl2){
  $hitungtgl1=date_create($tgl1);
  $hitungtgl2=date_create($tgl2);

  $selisih=date_diff($hitungtgl2,$hitungtgl1);
  $jmlSelisih["tahun"]= $selisih->y;
  $jmlSelisih["bulan"]= $selisih->m;
  $jmlSelisih["hari"]= $selisih->d;
  return $jmlSelisih;
}
function profileLoginTrue(){
  include '../koneksi/koneksi.php';
  $getTableUser=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='{$_GET['nm']}'");
  $getInfoUser=mysqli_fetch_assoc($getTableUser);
  echo "<div class='panel panel-default'>
  <blockquote style='margin:7px;'>
  <p>{$getInfoUser['motivasi']}</p>
  <footer>By : {$getInfoUser['nama']}</footer>
</blockquote>
  <div class='panel-body'>
  <div class='page-header'>
<h2> {$getInfoUser['nama']} <small>{$getInfoUser['username']}</small></h2>
<p>Nama lengkap</p>
<b><p>{$getInfoUser['nama']}</p></b>
<p>Username</p>
<b><p>{$getInfoUser['username']}</p></b>
<p>Jenis kelamin</p>
<b><p>{$getInfoUser['jenis_kelamin']}</p></b>
<p>Alamat</p>
<b><p>{$getInfoUser['alamat']}</p></b>
<p>Jumlah kontribusi</p>
<b><p>{$getInfoUser['jumlah']}</p></b>
</div>
  </div>
  </div>
  <table class='table table-condensed'>
  <thead>
  <tr>
  <td>Nama project</td>
  <td>Link project</td>
  <td>Deskripsi project</td>
  </tr>
  </thead>
  <tbody>";
$getTableProject=mysqli_query($koneksi,"SELECT * FROM tb_project WHERE nama='{$_GET['nm']}'");
while($getInfoProjectUser=mysqli_fetch_assoc($getTableProject)){
  echo "
    <tr>
    <td>{$getInfoProjectUser['projectname']}</td>
    <td><a href='https://{$getInfoProjectUser['linkproject']}'>Go to {$getInfoProjectUser['projectname']}</a></td>
    <td>{$getInfoProjectUser['description']}</td>
    </tr>";
  }
  echo "</tbody>
</table>";
}
function profileLoginFalse(){
  include '../koneksi/koneksi.php';
  $getTableUser=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='{$_GET['nm']}'");
  $getInfoUser=mysqli_fetch_assoc($getTableUser);
  echo "<div class='panel panel-default'>
  <blockquote style='margin:7px;'>
  <p>{$getInfoUser['motivasi']}</p>
  <footer>By : {$getInfoUser['nama']}</footer>
</blockquote>
  <div class='panel-body'>
  <div class='page-header'>
<h2> {$getInfoUser['nama']} <small>{$getInfoUser['username']}</small></h2>
<p>Nama lengkap</p>
<b><p>{$getInfoUser['nama']}</p></b>
<p>Username</p>
<b><p>{$getInfoUser['username']}</p></b>
<p>Jenis kelamin</p>
<b><p>{$getInfoUser['jenis_kelamin']}</p></b>
<p>Alamat</p>
<b><p>{$getInfoUser['alamat']}</p></b>
<p>Jumlah kontribusi</p>
<b><p>{$getInfoUser['jumlah']}</p></b>
</div>
  </div>
  </div>
  <table class='table table-condensed'>
  <thead>
  <tr>
  <td>Nama project</td>
  <td>Link project</td>
  <td>Deskripsi project</td>
  </tr>
  </thead>
  <table>
  <h2>Login untuk melihat apa saja yang sudah dibuatnya</h2><a class='btn btn-primary' href='../login.php' role='button'>Sign in</a>";
}
function editProject(){
  include '../koneksi/koneksi.php';
  $projectName=$_POST['projectname'];
  $description=$_POST['description'];
  $link=$_POST['link'];
    if (isset($projectName) || isset($description) || isset($link)){
      $updateTableProject=mysqli_query($koneksi,"UPDATE tb_project SET projectname='$projectName', description='$description', linkproject='$link' WHERE noindex='{$_GET['delid']}' AND nama='{$_SESSION['username']}'");
      if ($updateTableProject){
        header("location:../home.php?nm={$_SESSION['username']}");
      }else{
        echo "Tidak dapat mengubah field";
        echo "<br>".mysqli_error($koneksi);
      }
    }else{
      echo "Maaf anda harus mengisi semua nya terlebih dahulu";
    }
}
function cekPass($pass){
  include '../koneksi/koneksi.php';
  $getTableUser=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='{$_SESSION['username']}'");
  $cekPassword=mysqli_fetch_assoc($getTableUser);
  if ($cekPassword['password'] === "$pass"){
    header("location:update-view.php?nm={$_SESSION['username']}");
  }else{
    echo "<script>alert('Maaf Password anda salah silahkan ulangi')</script>";
  }
}
function updateProfile(){
  include '../koneksi/koneksi.php';
  $nama=(htmlentities(strip_tags(trim($_POST['nama']))));
  $pass=(htmlentities(strip_tags(trim($_POST['pass']))));
  $pass2=(htmlentities(strip_tags(trim($_POST['pass']))));
  $addr=(htmlentities(strip_tags(trim($_POST['alamat']))));
  $note=(htmlentities(strip_tags(trim($_POST['motivasi']))));
  if (!empty($nama)){
    mysqli_query($koneksi,"UPDATE tb_user SET nama='$nama' WHERE username='{$_SESSION['username']}'");
    echo "Anda berhasil mengganti nama anda<br>";
  }
  if (!empty($pass)){
    mysqli_query($koneksi,"UPDATE tb_user SET password='".md5($pass)."' WHERE username='{$_SESSION['username']}'");
    mysqli_query($koneksi,"UPDATE tb_user SET realtg='$pass2' WHERE username='{$_SESSION['username']}'");
    echo "Anda berhasil mengganti password anda<br>";
  }
  if (!empty($addr)){
    mysqli_query($koneksi,"UPDATE tb_user SET alamat='$addr' WHERE username='{$_SESSION['username']}'");
    echo "Anda berhasil mengganti alamat anda<br>";
  }
  if (!empty($note)){
    mysqli_query($koneksi,"UPDATE tb_user SET motivasi='$note' WHERE username='{$_SESSION['username']}'");
    echo "Anda berhasil mengganti note anda<br>";
  }
}
function infoPc(){
  include 'koneksi/koneksi.php';
  echo date('r')."<br>";
  print_r ($_SERVER);
  print_r ($koneksi);
  echo __LINE__."<br>";
  echo __DIR__."<br>";
  echo __FUNCTION__."<br>";
  echo __TRAIT__."<br>";
  echo __METHOD__."<br>";
  echo __NAMESPACE__."<br>";
}
 ?>
