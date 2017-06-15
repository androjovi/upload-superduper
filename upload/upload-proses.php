<?php
include '../koneksi/koneksi.php';
include '../lib/lib.php';
session_start();
cekSesi("login.php");
$getTableUser=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='".$_SESSION['username']."'");
$getIdUser=mysqli_fetch_assoc($getTableUser);
if (isset($_POST['submit'])){
  $projectname=(htmlentities(strip_tags(trim($_POST['projectname']))));
  $description=(htmlentities(strip_tags(trim($_POST['description']))));
  $link=(htmlentities(strip_tags(trim($_POST['link']))));
  $datetgl=date('Y-m-d H-i-s');
  $name=$_GET['nm'];
  $indexno=str_shuffle(date('YmdHis'));
  if (isset($projectname) AND isset($description)){
    $tambah=$getIdUser['jumlah'];
    $tambahJumlah=++$tambah;
    $UpdateJumlah=mysqli_query($koneksi,"UPDATE tb_user SET jumlah='$tambahJumlah' WHERE username='".$_SESSION['username']."'");
    if ($UpdateJumlah){
      $insertProject=mysqli_query($koneksi,"INSERT INTO tb_project (noindex,projectname,description,linkproject,nama,datetgl)VALUES('$indexno','$projectname','$description','$link','$name','$datetgl')");
      if ($insertProject){
        header("location:../home.php?nm={$name}");
      }else{
        echo "Tidak berhasil menambahkan";
        echo mysqli_error($koneksi);
      }
    }else{
      echo "Keselahan tidak diketahui";
    }
  }
}else{
  header("location:login.php");
}
 ?>
