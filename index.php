<?php
include 'koneksi/koneksi.php';
include 'lib/lib.php';
if (!isset($_SESSION['username'])){
  $header2= "<a class='btn btn-primary' href='login.php' role='button'>Sign in</a>";
}else{
  $header2= "<p class='navbar-text'>Signed in as {$_SESSION['username']}</p>
             <p class='navbar-text'><a href='logout.php?nm={$_SESSION['username']}'>Logout ?</a></p>
             <p class='navbar-text navbar-right'><a href='home.php?nm={$_SESSION['username']}'>Your profile</a></p>
             <p class='navbar-text navbar-right'><a href='index.php?nm={$_SESSION['username']}'>To Homepage</a></p>";

}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php mobileFirst(); ?>
    <title>Upload 123</title>
    <?php css("css/bootstrap.min.css");?>
  </head>
  <style>
  .header-ico{
    width: 50px;
    height: 50px;
  }
  </style>
  <body>
    <nav class='navbar navbar-default'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <a class='navbar-brand' href='#'>
            <img alt='Brand' src='img/header-ico.png' class='header-ico' style='
                width: 50px;
                height: 50px;
              '>
          </a>
           <?php echo $header2;?>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
    <table class="table table-hover">
  <thead>
    <tr>
      <td>No-Index</td>
      <td>Project name</td>
      <td>Description</td>
      <td>Link project</td>
      <td>Author</td>
      <td>Date</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
$getProject=mysqli_query($koneksi,"SELECT * FROM tb_project");
while($viewProject=mysqli_fetch_assoc($getProject)){
$convertDateProject=substr($viewProject['datetgl'],0,10);
       ?>
      <td><?php echo $viewProject['noindex']; ?></td>
      <td><?php echo $viewProject['projectname']; ?></td>
      <td><?php echo $viewProject['description'];?></td>
      <td><a href="https://<?php echo $viewProject['linkproject']; ?>">Go to&nbsp;<?php echo $viewProject['projectname'];?></td>
      <td><a href="prof-update/profile.php?nm=<?php echo $viewProject['nama']; ?>"><p class="text-success"><?php echo $viewProject['nama']; ?></p></a></td>
      <td><?php $hasil = dateDiff("$convertDateProject","now"); $cek2= ($hasil['hari']=="0")? "Hari ini":"{$hasil['hari']} yang lalu"; echo $cek2; ?></td>
    </tr>
    <?php } ?>
  </tbody>

</table>
</div>
  </body>
</html>
