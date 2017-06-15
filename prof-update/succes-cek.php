<?php
include '../lib/lib.php';
cekSesi("../login.php");
cekPass("".(md5($_POST['pass']))."");
 ?>
