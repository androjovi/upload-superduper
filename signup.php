<?php
include 'lib/lib.php';
include 'koneksi/koneksi.php';
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
<form action="proses-signup.php"  method="post">
  <h2>Login Now</h2>
  <div class="input">
    <input type="text" placeholder="Username" name="user" maxlength="12" required="true">
    <input type="text" placeholder="Nama lengkap" name="full-name" required="true">
    <input type="password" placeholder="Password anda" name="pass" required="true">
    <br>
  <input type="radio" name="jk" value="perempuan" required="true"> Perempuan
  <input type="radio" name="jk" value="laki-laki"> Laki- Laki
  <br><br>
    <textarea name="addr" placeholder="Alamat anda" required="true">
    </textarea>
    <input type="submit" value="submit" name="submit">
    <br><br>
    <a href="login.php"><small>have a account ?</small></a>
  </div>
</body>
</html>
