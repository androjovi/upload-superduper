<?php
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
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Upload</title>
     <?php css("../css/bootstrap.min.css"); ?>
     <style>
     </style>
   </head>
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
     <form class="form-horizontal" action="upload-proses.php?nm=<?php echo $_SESSION['username']; ?>" method="post">
  <div class="form-group">
    <label for="projectname" class="col-sm-2 control-label">Project name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="projectname" id="projectname" placeholder="Your project name" maxlength="20" style="width:450px;" required="true">
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <input type="description" class="form-control" name="description" id="description" placeholder="Description of your Project" maxlength="30" style="width:450px;" required="true">
    </div>
  </div>
  <div class="form-group">
    <label for="link" class="col-sm-2 control-label">Link of project</label>
    <div class="col-sm-10">
      <input type="description" class="form-control" name="link" id="link" placeholder="Link of your project" maxlength="80" style="width:450px;" required="true">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
   </body>
 </html>
