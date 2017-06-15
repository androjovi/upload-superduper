<?php
include '../koneksi/koneksi.php';
include '../lib/lib.php';
cekSesi("../login.php");
if (!isset($_SESSION['username'])){
  $header2= "<a class='btn btn-primary' href='login.php' role='button'>Sign in</a>";
}else{
  $header2= "<p class='navbar-text'>Signed in as {$_SESSION['username']}</p>
             <p class='navbar-text'><a href='../logout.php?nm={$_SESSION['username']}'>Logout ?</a></p>
             <p class='navbar-text navbar-right'><a href='../home.php?nm={$_SESSION['username']}'>Your profile</a></p>
             <p class='navbar-text navbar-right'><a href='../index.php?nm={$_SESSION['username']}'>To Homepage</a></p>";

}
$getTableProject=mysqli_query($koneksi,"SELECT * FROM tb_project WHERE noindex='{$_GET['delid']}' AND nama='{$_SESSION['username']}'");
$getListTableProject=mysqli_fetch_assoc($getTableProject);
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Edit <?php echo $getListTableProject['projectname'];?></title>
     <?php css("../css/bootstrap.min.css"); ?>
   </head>
   <body>
     <nav class='navbar navbar-default'>
       <div class='container-fluid'>
         <div class='navbar-header'>
           <a class='navbar-brand' href='../home.php'>
             <img alt='Brand' src='../img/header-ico.png' class='header-ico' style='
                 width: 50px;
                 height: 50px;
               '>
           </a>
            <?php echo $header2;?>
         </div>
       </div>
     </nav>
     <form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label for="projectname" class="col-sm-2 control-label">Project name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="projectname" id="projectname" placeholder="<?php echo $getListTableProject['projectname']; ?>" maxlength="20" style="width:450px;" required="true">
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <input type="description" class="form-control" name="description" id="description" placeholder="<?php echo $getListTableProject['description']; ?>" maxlength="30" style="width:450px;" required="true">
    </div>
  </div>
  <div class="form-group">
    <label for="link" class="col-sm-2 control-label">Link of project</label>
    <div class="col-sm-10">
      <input type="description" class="form-control" name="link" id="link" placeholder="<?php echo $getListTableProject['linkproject']; ?>" maxlength="80" style="width:450px;" required="true">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      <?php if (isset($_POST['submit'])){
        editProject();
      }else{
        echo "<script>alert('Maaf anda harus mengisi semua data terlebih dahulu')";
      } ?>
    </div>
  </div>
</form>
   </body>
 </html>
