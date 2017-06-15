<?php
include '../lib/lib.php';
if (!isset($_SESSION['username'])){
  $header2= "<a class='btn btn-primary' href='../login.php' role='button'>Sign in</a>";
}else{
  $header2= "<p class='navbar-text'>Signed in as {$_SESSION['username']}</p>
             <p class='navbar-text'><a href='../logout.php?nm={$_SESSION['username']}'>Logout ?</a></p>
             <p class='navbar-text navbar-right'><a href='../home.php?nm={$_SESSION['username']}'>Your profile</a></p>
             <p class='navbar-text navbar-right'><a href='../index.php?nm={$_SESSION['username']}'>To Homepage</a></p>";

}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $_GET['nm']; ?></title>
    <?php css("../css/bootstrap.min.css");?>
  </head>
  <body>
    <nav class='navbar navbar-default'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <a class='navbar-brand' href='#'>
            <img alt='Brand' src='../img/header-ico.png' class='header-ico' style='
                width: 50px;
                height: 50px;
              '>
          </a>
           <?php echo $header2;?>
        </div>
      </div>
    </nav><br>
    <div class="container-fluid">
<?php $cek=(isset($_SESSION['username']))?"".profileLoginTrue()."" : "".profileLoginFalse()."" ?>
  </body>
</html>
