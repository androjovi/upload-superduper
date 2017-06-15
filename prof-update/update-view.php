<?php
include '../lib/lib.php';
include '../koneksi/koneksi.php';
cekSesi("../login.php");
if (!isset($_SESSION['username'])){
  $header2= "<a class='btn btn-primary' href='login.php' role='button'>Sign in</a>";
}else{
  $header2= "<p class='navbar-text'>Signed in as {$_SESSION['username']}</p>
             <p class='navbar-text'><a href='../logout.php?nm={$_SESSION['username']}'>Logout ?</a></p>
             <p class='navbar-text navbar-right'><a href='../home.php?nm={$_SESSION['username']}'>Your profile</a></p>
             <p class='navbar-text navbar-right'><a href='../index.php?nm={$_SESSION['username']}'>To Homepage</a></p>";

}
$getTableUser=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='{$_SESSION['username']}'");
$getValueTableUser=mysqli_fetch_assoc($getTableUser);
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Edit profile</title>
     <?php css("../css/bootstrap.min.css"); ?>
   </head>
   <body>
     <nav class='navbar navbar-default'>
       <div class='container-fluid'>
         <div class='navbar-header'>
           <a class='navbar-brand' href=''>
             <img alt='Brand' src='../img/header-ico.png' class='header-ico' style='
                 width: 50px;
                 height: 50px;
               '>
           </a>
            <?php echo $header2;?>
         </div>
       </div>
     </nav>
     <form class="form-horizontal" action="" method="POST">
  <div class="form-group">
    <label class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo $getValueTableUser['username']; ?></p>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama" placeholder="<?php echo $getValueTableUser['nama']; ?>" style="width:500px;">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pass" placeholder="Password" style="width:500px;">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="alamat" placeholder="<?php echo $getValueTableUser['alamat']; ?>" style="width:500px;">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Note *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="motivasi" placeholder="<?php echo $getValueTableUser['motivasi']; ?>" style="width:500px;">
    </div>
  </div>
  <div class="container-fluid">
  <input class="btn btn-primary" type="submit" value="Update" name="submit">
</div>
</form>
   </body>
 </html>
 <?php
if (isset($_POST['submit'])){
  updateProfile();
}
 ?>
