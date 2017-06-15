<style>
body{
  background-color: black;
  color: aqua;
  margin-left: 40px;
  margin-right: 40px;
}
p{
  font-size: 0.5em;
}
marquee:hover{
  color:black;
  font-size: 9em;
  -moz-transition: 4s;
  -webkit-transition: 4s;
}
p:hover{
  color:aqua;
  transition: none;
}
</style>
<body>
  <marquee  behavior="alternate" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="22">
    <pre>
      <p><blink>Bye bye hahaha Mpus lu</blink></p>
<?php
include 'lib/lib.php';
if ($_SESSION['username'] =="jovi404"){
  infoPc();
}else{
  echo "Anda tidak memiliki hak akses atau tidak valid";
}
 ?>
</marquee>
