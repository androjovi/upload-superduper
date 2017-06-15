<?php
include '../koneksi/koneksi.php';
include '../lib/lib.php';
cekSesi("../login.php");
$getTableUser=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='{$_GET['nm']}'");
$getValueTableUser=mysqli_fetch_assoc($getTableUser);
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit <?php echo $_SESSION['username']; ?></title>
    <?php css("../css/bootstrap.min.css"); ?>
    <style>
    .container2{
      text-align: center;
      margin:100px auto;
    }
    </style>
  </head>
  <body>
    <div class="container2">
    <form class="form-inline" action="succes-cek.php" method="POST">
      <div class="form-group">
        <label class="sr-only">Email</label>
        <p class="form-control-static"><?php echo $getValueTableUser['username'] ?> &nbsp;</p>
      </div>
      <div class="form-group">
        <label for="inputPassword2" class="sr-only">Password</label>
        <input type="password" name="pass" class="form-control" id="inputPassword2" placeholder="Password">
      </div>
      <input type="submit" class="btn btn-default" value="Confirm identity">
    </form>
  </div>
  </body>
</html>
