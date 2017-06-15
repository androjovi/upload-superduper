<?php
include 'lib/lib.php';
include 'koneksi/koneksi.php';
cekSesi("login.php");
$getTable=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='{$_SESSION['username']}'");
$viewTable=mysqli_fetch_assoc($getTable);
$getTableProject=mysqli_query($koneksi,"SELECT * FROM tb_project WHERE nama='{$_SESSION['username']}' ORDER BY datetgl DESC");
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
    <title>Home <?php echo $_SESSION['username'];?></title>
    <?php css("css/bootstrap.min.css");?>
  </head>
  <body>
    <nav class='navbar navbar-default'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <a class='navbar-brand' href=''>
            <img alt='Brand' src='img/header-ico.png' class='header-ico' style='
                width: 50px;
                height: 50px;
              '>
          </a>
           <?php echo $header2;?>
        </div>
      </div>
    </nav>
  <div class="container">
    <p class="text-right"><?php getDateTime()?></p>
     <h3>Welcome <?php echo $viewTable['nama']; ?></h3>
  </div>
  <br>
  <div class="container-fluid">
  <a class="btn btn-primary" href="<?php echo "upload/upload.php?nm={$_SESSION['username']}"; ?>" role="button">Upload a link</a>&nbsp;
  <a class="btn btn-info" style="background-color:#d457d6; border:none;" href="<?php echo "prof-update/profile.php?nm={$_SESSION['username']}";?>" role="button">Profile</a>&nbsp;
  <a class="btn btn-info" href="prof-update/update-profile.php?nm=<?php echo $_SESSION['username']; ?>" role="button">Update your profile</a>&nbsp;
  <a class="btn btn-danger" href="logout.php" role="button">Logout</a>&nbsp;
  <a class="btn btn-warning" href="index.php" role="button">Homepage</a>&nbsp;
  <?php if ($_SESSION['username']=="jovi404"){
    echo '<a class="btn btn-default" href="info.php" role="button" disabled="true">Info</a>&nbsp';
  }
  ?>
  <p class="bg-success" style="display:inline;padding:9px;border-radius:6px;">Jumlah kontribusi kamu <b><?php echo $viewTable['jumlah'];?></b></p>
</div><br>
<div class="container-fluid">
<h3>Apa saja yang sudah kamu lakukan di web ini</h3>
<br><br>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <td>No index</td>
        <td>Project name</td>
        <td>Tanggal submit</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      <tr>
<?php while($getListTableProject=mysqli_fetch_assoc($getTableProject)){?>
  <td><?php echo $getListTableProject['noindex'];?></td>
  <td><?php echo $getListTableProject['projectname'];?></td>
  <td><?php echo $getListTableProject['datetgl'];?></td>
  <td><a class="btn btn-danger btn-xs" href="action/delete.php?delid=<?php echo $getListTableProject['noindex'];?>" role="button">Delete</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-primary btn-xs" href="action/edit.php?delid=<?php echo $getListTableProject['noindex'];?>" role="button">Edit</a></td>
</tr>
  <?php } ?>
</table>
</div>
</div>
  </body>
</html>
