<?php
include '../lib/lib.php';
if (!isset($_SESSION['username'])){
  header("location:login.php");
}
delProject("{$_GET['delid']}");
 ?>
