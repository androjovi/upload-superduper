<?php
include 'lib/lib.php';
if (isset($_SESSION['username'])){
  header("location:home.php?nm={$_SESSION['username']}");
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
  <?php
css("css/login.css");
  ?>
  </head>
    <body>
<?php
ico();
?>
<form action=""  method="post">
  <h2>Login Now</h2>
  <div class="input">
    <input type="text" name="user" placeholder="Username" maxlength="12">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" name="submit" value="submit">
    <?php
    if (isset($_POST['submit'])){
      loginCek("".(htmlentities(strip_tags(trim($_POST['user']))))."","".(md5(htmlentities(strip_tags(trim($_POST['pass'])))))."");
    }
    ?>
    <br><br>
    <a href="signup.php"><small>Don't have a account ?</small></a>
  </div>
</form>
</body>
</html>
