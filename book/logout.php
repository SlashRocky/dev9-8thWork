<?php
  session_start();
  $_SESSION['loginId'] = "";
  $_SESSION['id'] = "";
  session_destroy();
  header("Location: logoin.php");
  exit();
?>