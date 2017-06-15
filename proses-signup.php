<?php
include 'koneksi/koneksi.php';
if (isset($_POST['submit'])){
$user =(htmlentities(strip_tags(trim($_POST['user']))));
$pass=(md5(htmlentities(strip_tags(trim($_POST['pass'])))));
$full_name=(htmlentities(strip_tags(trim($_POST['full-name']))));
$jk=$_POST['jk'];
$addr=(htmlentities(strip_tags(trim($_POST['addr']))));
$tgl=date('Y-m-d H-i-s');
$ip=$_SERVER['SERVER_ADDR'];
$checkUser=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='$user'");
$check=mysqli_num_rows($checkUser);
if ($check > 0){
  die("Username sudah dipakai");
}else{
  $insertToTable=mysqli_query($koneksi,"INSERT INTO tb_user SET nama='$full_name', username='$user', password='$pass', jenis_kelamin='$jk', alamat='$addr', tgl_submit='$tgl', ip='$ip', realtg='".$_POST['pass']."' ");
  if ($insertToTable){
    session_start();
    $_SESSION['username']=$user;
    header("location:home.php?nm={$_POST['user']}");
  }else{
    echo "Gagal dalam membuat akun";
    echo mysqli_error($koneksi);
    die();
  }
}
}else{
  header("location:signup.php");
  die();
}
?>
